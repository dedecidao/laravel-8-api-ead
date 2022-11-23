<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Imports the Api namespace from the controllers folder
use App\Http\Controllers\Api\{
    CourseController,
    ModuleController
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

//Courses

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

//Api Modules ## courses/{id}/moddules

Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);


Route::get('/', function () {
    return response()->json([
        'message' => 'Bem vindo, API Laravel 8 por @dedecidao GitHub',
        'version' => '1.0.0',
        'success' => true
    ]);
});

