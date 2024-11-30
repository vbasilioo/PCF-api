<?php

namespace App\Http\Controllers\Served;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Served\IdServedRequest;
use App\Http\Requests\Served\IndexServedRequest;
use App\Http\Requests\Served\StoreServedRequest;
use App\Http\Requests\Served\UpdateServedRequest;
use App\Services\Served\ServedService;

class ServedController extends Controller
{
    public function __construct(protected ServedService $servedService){}

    public function store(StoreServedRequest $request){
        try{
            $data = $this->servedService->store($request->validated());
            return ReturnApi::success($data, 'Atendido cadastrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar um novo atendido.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexServedRequest $request){
        try{
            $data = $this->servedService->index($request->validated());
            return ReturnApi::success($data, 'Atendidos listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar os atendidos.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdServedRequest $request){
        try{
            $data = $this->servedService->show($request->validated());
            return ReturnApi::success($data, 'Atendido encontrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar o atendido.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateServedRequest $request){
        try{
            $data = $this->servedService->update($request->validated());
            return ReturnApi::success($data, 'Atendido atualizado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar o atendido.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdServedRequest $request){
        try{
            $data = $this->servedService->destroy($request->validated());
            return ReturnApi::success($data, 'Atendido excluído com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir o atendido.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdServedRequest $request){
        try{
            $data = $this->servedService->restore($request->validated());
            return ReturnApi::success($data, 'Atendido restaurado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar o atendido.', $ex->getCode() ?? 500);
        }
    }

    public function totalServeds(){
        try{
            $data = $this->servedService->totalServeds();
            return ReturnApi::success($data, 'Contagem de atendidos ativos realizada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao fazer contagem de atendidos.', $ex->getCode() ?? 500);
        }
    }

    public function totalServedsDepartments(){
        try{
            $data = $this->servedService->totalServedsDepartments();
            return ReturnApi::success($data, 'Contagem de salas dos atendidos realizada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao fazer contagem de salas dos atendidos.', $ex->getCode() ?? 500);
        }
    }
}
