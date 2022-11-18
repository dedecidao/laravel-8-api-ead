<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return response()->json([
        'message' => 'Bem vindo a esta API',
        'version' => '1.0.0',
        'success' => true
    ]);
});

