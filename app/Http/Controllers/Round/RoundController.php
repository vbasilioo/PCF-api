<?php

namespace App\Http\Controllers\Round;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Round\IdRoundRequest;
use App\Http\Requests\Round\IndexRoundRequest;
use App\Http\Requests\Round\StoreRoundRequest;
use App\Http\Requests\Round\UpdateRoundRequest;
use App\Services\Round\RoundService;

class RoundController extends Controller
{
    public function __construct(protected RoundService $roundService){}

    public function store(StoreRoundRequest $request){
        try{
            $data = $this->roundService->store($request->validated());
            return ReturnApi::success($data, 'Ronda cadastrada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar uma nova ronda.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexRoundRequest $request){
        try{
            $data = $this->roundService->index($request->validated());
            return ReturnApi::success($data, 'Rondas listadas com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar rondas.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdRoundRequest $request){
        try{
            $data = $this->roundService->show($request->validated());
            return ReturnApi::success($data, 'Ronda encontrada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar a ronda.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateRoundRequest $request){
        try{
            $data = $this->roundService->update($request->validated());
            return ReturnApi::success($data, 'Ronda atualizada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar a ronda.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdRoundRequest $request){
        try{
            $data = $this->roundService->destroy($request->validated());
            return ReturnApi::success($data, 'Ronda excluída com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir a ronda.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdRoundRequest $request){
        try{
            $data = $this->roundService->restore($request->validated());
            return ReturnApi::success($data, 'Ronda restaurada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar a ronda.', $ex->getCode() ?? 500);
        }
    }

    public function roundsValidate(){
        try{
            $data = $this->roundService->drawRound();
            return ReturnApi::success($data, 'Rondas validadas com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao realizar validação de rondas.', $ex->getCode() ?? 500);
        }
    }
}
