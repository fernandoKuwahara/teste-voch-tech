<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EconomicGroupController;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\UnityController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestsController;

// Grupo de rotas para grupo economico
Route::prefix('economic_group')->group(function () {
    Route::get('show', [EconomicGroupController::class, 'show']);

    Route::post('register', [EconomicGroupController::class, 'register']);

    Route::delete('delete/{id}', [EconomicGroupController::class, 'delete']);

    Route::put('update', [EconomicGroupController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para bandeira
Route::prefix('flag')->group(function () {
    Route::get('show', [FlagController::class, 'show']);

    Route::post('register', [FlagController::class, 'register']);

    Route::delete('delete/{id}', [FlagController::class, 'delete']);

    Route::put('update/{id?}', [FlagController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para unidade
Route::prefix('unity')->group(function () {
    Route::get('show', [UnityController::class, 'show']);

    Route::post('register', [UnityController::class, 'register']);

    Route::delete('delete/{id}', [UnityController::class, 'delete']);

    Route::put('update/{id?}', [UnityController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para colaborador
Route::prefix('collaborator')->group(function () {
    Route::get('show', [CollaboratorController::class, 'show']);

    Route::post('register', [CollaboratorController::class, 'register']);

    Route::delete('delete/{id}', [CollaboratorController::class, 'delete']);

    Route::put('update/{id?}', [CollaboratorController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para produto
Route::prefix('product')->group(function () {
    Route::get('show', [ProductController::class, 'show']);

    Route::post('register', [ProductController::class, 'register']);

    Route::delete('delete/{id}', [ProductController::class, 'delete']);

    Route::put('update', [ProductController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para requisição
Route::prefix('request')->group(function () {
    Route::get('show', [RequestsController::class, 'show']);

    Route::post('register', [RequestsController::class, 'register']);

    Route::post('report', [RequestsController::class, 'reports']);

    Route::get('audit', [RequestsController::class, 'audit']);
})->middleware('auth:sanctum');
