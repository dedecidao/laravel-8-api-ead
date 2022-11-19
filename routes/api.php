<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Imports the Api namespace from the controllers folder
use App\Http\Controllers\Api\{
    CourseController
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/courses', [CourseController::class, 'index']);


Route::get('/', function () {
    return response()->json([
        'message' => 'Bem vindo a esta API',
        'version' => '1.0.0',
        'success' => true
    ]);
});

