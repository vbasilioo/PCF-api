<?php

namespace App\Services\Round;

use App\Exceptions\ApiException;
use App\Models\Round;
use App\Models\RoundUser;
use App\Models\User;
use Illuminate\Support\Str;

class RoundService {
    public function store(array $data): array{
        $lastRound = Round::where('round_number', $data['round_number'] - 1)->first();

        if($lastRound){
            $allUsersCompletedLastRound = RoundUser::where('round_id', $lastRound->id)
                ->where('completed', false)
                ->count() == 0;

            if(!$allUsersCompletedLastRound)
                throw new ApiException('Todos os usuários precisam concluir esta etapa de rondas antes de iniciar a próxima.');
        }

        $round = Round::create([
            'round_number' => $data['round_number'],
            'user_id' => $data['user_id']
        ]);

        foreach(User::all() as $user)
            $round->users()->attach($user->id, [
                'completed' => false,
                'id' => (string) Str::uuid()
            ]);
        
        return $round->toArray();
    }

    public function index(array $data): array{
        return Round::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Round::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        Round::where('id', $data['id'])->update($data);
        return Round::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        Round::find($data['id'])->delete();
        return Round::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        Round::withTrashed()->where('id', $data['id'])->restore();
        return Round::find($data['id'])->toArray();
    }

    private function checkIfRoundCompleted(array $data): array{
        $round = Round::where('round_number', $data['round_number'])->first();

        if(!$round) return [];

        $incompleteUsers = $round->user()->wherePivot('completed', false)->get();

        return $incompleteUsers->toArray();
    }

    public function drawRound(): array {
        $lastRound = Round::latest('created_at')->first(); 
    
        $nextRoundNumber = $lastRound ? $lastRound->round_number + 1 : 1;
    
        $incompleteUsers = $this->checkIfRoundCompleted(['round_number' => $nextRoundNumber - 1]);
    
        if(empty($incompleteUsers)){
            $round = Round::create(['round_number' => $nextRoundNumber]);
    
            foreach (User::all() as $user)
                $round->users()->attach($user->id, ['completed' => false]);
    
            $randomUser = User::inRandomOrder()->first();
    
            $round->users()->updateExistingPivot($randomUser->id, ['completed' => true]);
    
            return $randomUser->toArray();
        }
    
        $randomUser = $incompleteUsers[array_rand($incompleteUsers)];
    
        $round = Round::where('round_number', $nextRoundNumber - 1)->first();

        $round->users()->updateExistingPivot($randomUser['id'], ['completed' => true]);
    
        return $randomUser;
    }    
}