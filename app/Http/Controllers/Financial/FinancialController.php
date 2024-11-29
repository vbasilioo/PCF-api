<?php

namespace App\Http\Controllers\Financial;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Financial\IdFinancialRequest;
use App\Http\Requests\Financial\IndexFinancialRequest;
use App\Http\Requests\Financial\StoreFinancialRequest;
use App\Http\Requests\Financial\UpdateFinancialRequest;
use App\Services\Financial\FinancialService;

class FinancialController extends Controller
{
    public function __construct(protected FinancialService $financialService){}

    public function store(StoreFinancialRequest $request){
        try{
            $data = $this->financialService->store($request->validated());
            return ReturnApi::success($data, 'Conta cadastrada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar uma nova conta.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexFinancialRequest $request){
        try{
            $data = $this->financialService->index($request->validated());
            return ReturnApi::success($data, 'Contas listadas com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar as contas.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdFinancialRequest $request){
        try{
            $data = $this->financialService->show($request->validated());
            return ReturnApi::success($data, 'Conta encontrada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar a conta.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateFinancialRequest $request){
        try{
            $data = $this->financialService->update($request->validated());
            return ReturnApi::success($data, 'Conta atualizada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar conta.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdFinancialRequest $request){
        try{
            $data = $this->financialService->destroy($request->validated());
            return ReturnApi::success($data, 'Conta excluída com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir a conta.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdFinancialRequest $request){
        try{
            $data = $this->financialService->restore($request->validated());
            return ReturnApi::success($data, 'Conta restaurada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar a conta.', $ex->getCode() ?? 500);
        }
    }
}
