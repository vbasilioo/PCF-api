<?php

namespace App\Http\Controllers\ViaCEP;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ViaCEP\ShowCEPRequest;
use App\Services\ViaCEP\ViaCEPService;

class ViaCEPController extends Controller
{
    public function __construct(protected ViaCEPService $viaCEPService){}

    public function show(ShowCEPRequest $request){
        try{
            $data = $this->viaCEPService->show($request->validated());
            return ReturnApi::success($data, 'CEP encontrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao buscar CEP pelo Via CEP.', $ex->getCode() ?? 500);
        }
    }
}
