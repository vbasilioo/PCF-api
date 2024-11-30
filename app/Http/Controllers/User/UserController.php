<?php

namespace App\Http\Controllers\User;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\IdUserRequest;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\TotalUserDepartmentRequest;
use App\Http\Requests\User\TotalUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\User\UserService;

class UserController extends Controller
{
    public function __construct(protected UserService $userService){}

    public function store(StoreUserRequest $request){
        try{
            $data = $this->userService->store($request->validated());
            return ReturnApi::success($data, 'Usuário cadastrado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar um novo usuário.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexUserRequest $request){
        try{
            $data = $this->userService->index($request->validated());
            return ReturnApi::success($data, 'Usuários listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao buscar os usuários.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdUserRequest $request){
        try{
            $data = $this->userService->show($request->validated());
            return ReturnApi::success($data, 'Usuário buscado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao buscar o usuário.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateUserRequest $request){
        try{
            $data = $this->userService->update($request->validated());
            return ReturnApi::success($data, 'Usuário atualizado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar o usuário.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdUserRequest $request){
        try{
            $data = $this->userService->destroy($request->validated());
            return ReturnApi::success($data, 'Usuário excluído com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir o usuário.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdUserRequest $request){
        try{
            $data = $this->userService->restore($request->validated());
            return ReturnApi::success($data, 'Usuário restaurado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar o usuário.', $ex->getCode() ?? 500);
        }
    }

    public function totalUsers(){
        try{
            $data = $this->userService->totalUsers();
            return ReturnApi::success($data, 'Todos voluntários listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao contabilizar voluntários.', $ex->getCode() ?? 500);
        }
    }

    public function totalUsersDepartment(){
        try{
            $data = $this->userService->totalUsersDepartment();
            return ReturnApi::success($data, 'Todos os departamentos dos voluntários foram listados com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao contabilizar departamentos dos voluntários.', $ex->getCode() ?? 500);
        }
    }
}
