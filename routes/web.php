<?php

use Illuminate\Support\Facades\Route;
use App\DataTables\AuditDataTable;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestsController;

// Rota padrão.
Route::get('/', function() {
    return csrf_token();
});

Route::get('login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth:sanctum');
