<?php

namespace App\Http\Controllers\Department;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\IdDepartmentRequest;
use App\Http\Requests\Department\IndexDepartmentRequest;
use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Services\Department\DepartmentService;

class DepartmentController extends Controller
{
    public function __construct(protected DepartmentService $departmentService){}

    public function store(StoreDepartmentRequest $request){
        try{
            $data = $this->departmentService->store($request->validated());
            return ReturnApi::success($data, 'Departamento cadastrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar um novo departamento.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexDepartmentRequest $request){
        try{
            $data = $this->departmentService->index($request->validated());
            return ReturnApi::success($data, 'Departamentos listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar os departamentos.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdDepartmentRequest $request){
        try{
            $data = $this->departmentService->show($request->validated());
            return ReturnApi::success($data, 'Departamento encontrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar o departamento.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateDepartmentRequest $request){
        try{
            $data = $this->departmentService->update($request->validated());
            return ReturnApi::success($data, 'Departamento atualizado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar departamento.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdDepartmentRequest $request){
        try{
            $data = $this->departmentService->destroy($request->validated());
            return ReturnApi::success($data, 'Departamento excluído com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir departamento.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdDepartmentRequest $request){
        try{
            $data = $this->departmentService->restore($request->validated());
            return ReturnApi::success($data, 'Departamento restaurado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar departamento.', $ex->getCode() ?? 500);
        }
    }
}
