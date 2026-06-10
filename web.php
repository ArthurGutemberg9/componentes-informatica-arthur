<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponenteController;

/**
 * Rotas da Aplicação - Loja de Componentes de Informática
 * 
 * Este arquivo define todas as rotas web da aplicação.
 * Inclui a rota inicial, as rotas CRUD de componentes e uma rota fallback.
 */

// Rota inicial - página de boas-vindas
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rotas de componentes - implementa todas as ações RESTful
// Estas rotas fornecem as URLs padrão para CRUD operations:
// GET    /componentes              -> index   (listar todos)
// GET    /componentes/create       -> create  (formulário de criação)
// POST   /componentes              -> store   (salvar novo)
// GET    /componentes/{id}         -> show    (exibir detalhes)
// GET    /componentes/{id}/edit    -> edit    (formulário de edição)
// PUT    /componentes/{id}         -> update  (atualizar)
// DELETE /componentes/{id}         -> destroy (deletar)
Route::resource('componentes', ComponenteController::class);

// Rota fallback - trata URLs não encontradas (erro 404)
// Esta rota deve ser a última, pois funciona como um "catch-all"
// para qualquer rota que não foi definida anteriormente
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
