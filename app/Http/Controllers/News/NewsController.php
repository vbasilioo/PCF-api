<?php

namespace App\Http\Controllers\News;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\IdNewsRequest;
use App\Http\Requests\News\IndexNewsRequest;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Services\News\NewsService;

class NewsController extends Controller
{
    public function __construct(protected NewsService $newsService){}

    public function store(StoreNewsRequest $request){
        try{
            $data = $this->newsService->store($request->validated());
            return ReturnApi::success($data, 'Notícia cadastrada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao cadastrar uma nova notícia.', $ex->getCode() ?? 500);
        }
    }

    public function index(IndexNewsRequest $request){
        try{
            $data = $this->newsService->index($request->validated());
            return ReturnApi::success($data, 'Notícias listadas com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar as notícias.', $ex->getCode() ?? 500);
        }
    }

    public function show(IdNewsRequest $request){
        try{
            $data = $this->newsService->show($request->validated());
            return ReturnApi::success($data, 'Notícia encontrada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao mostrar a notícia.', $ex->getCode() ?? 500);
        }
    }

    public function update(UpdateNewsRequest $request){
        try{
            $data = $this->newsService->update($request->validated());
            return ReturnApi::success($data, 'Notícia atualizada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao atualizar a notícia.', $ex->getCode() ?? 500);
        }
    }

    public function destroy(IdNewsRequest $request){
        try{
            $data = $this->newsService->destroy($request->validated());
            return ReturnApi::success($data, 'Notícia excluída com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao excluir a notícia.', $ex->getCode() ?? 500);
        }
    }

    public function restore(IdNewsRequest $request){
        try{
            $data = $this->newsService->restore($request->validated());
            return ReturnApi::success($data, 'Notícia restaurada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao restaurar a notícia.', $ex->getCode() ?? 500);
        }
    }
}
