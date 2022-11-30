<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Imports the Api namespace from the controllers folder
use App\Http\Controllers\Api\{
    CourseController,
    ModuleController,
    LessonController,
    SupportController
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

// ====================================================== //
// ======================= Courses ====================== //
// ====================================================== //

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

// ====================================================== //
// ======== Api Modules ## courses/{id}/moddules ======== //
// ====================================================== //

Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

// ====================================================== //
// =================== Api de Lessons =================== //
// ====================================================== //

Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
Route::get('/lessons/{id}', [LessonController::class, 'show']);

// ====================================================== //
// =================== Api de Support =================== //
// ====================================================== //

//Retornar suportes de uma aula
Route::get('/supports', [SupportController::class, 'index']); // Chumbar um usuario e apos trocar pra usuario autenticado
Route::post('/supports', [SupportController::class, 'store']); // metodo de insercao Na Support Controller



// ====================================================== //
// ================= Saida padrao Abaixo ================ //
// ====================================================== //



Route::get('/', function () {
    return response()->json([
        'message' => 'Bem vindo, API Laravel 8 por @dedecidao GitHub',
        'version' => '1.0.0',
        'success' => true
    ]);
});

