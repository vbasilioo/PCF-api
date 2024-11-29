<?php

namespace App\Http\Controllers\Authentication;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Authentication\AuthenticationService;

class AuthenticationController extends Controller
{
    public function __construct(protected AuthenticationService $authService){}

    public function login(LoginRequest $request){
        try{
            $data = $this->authService->login($request->validated());
            return ReturnApi::success($data, 'Usuário logado com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao realizar login.', $ex->getCode() ?? 500);
        }
    }
}
