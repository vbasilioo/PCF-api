<?php

namespace App\Http\Controllers\Request;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request\IdRequestRequest;
use App\Http\Requests\Request\IndexRequestRequest;
use App\Http\Requests\Request\StoreRequestRequest;
use App\Http\Requests\Request\UpdateRequestRequest;
use App\Services\Request\RequestService;

class RequestController extends Controller
{
    public function __construct(protected RequestService $requestService){}

    public function store(StoreRequestRequest $request){
        try{
            $data = $this->requestService->store($request->validated());
            return ReturnApi::success($data, 'Pedido cadastrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar um novo pedido.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexRequestRequest $request){
        try{
            $data = $this->requestService->index($request->validated());
            return ReturnApi::success($data, 'Pedidos listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar os pedidos.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdRequestRequest $request){
        try{
            $data = $this->requestService->show($request->validated());
            return ReturnApi::success($data, 'Pedido encontrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar o pedido.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateRequestRequest $request){
        try{
            $data = $this->requestService->update($request->validated());
            return ReturnApi::success($data, 'Pedido atualizado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar o pedido.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdRequestRequest $request){
        try{
            $data = $this->requestService->destroy($request->validated());
            return ReturnApi::success($data, 'Pedido excluído com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir o pedido.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdRequestRequest $request){
        try{
            $data = $this->requestService->restore($request->validated());
            return ReturnApi::success($data, 'Pedido restaurado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar o pedido.', $ex->getCode() ?? 500);
        }
    }
}
