<?php

namespace App\Services\ViaCEP;

use Illuminate\Support\Facades\Http;

class ViaCEPService {
    public function show(array $data): array{
        return Http::viaCEP()->get($data['zipcode'] . '/json/')->json();
    }
}