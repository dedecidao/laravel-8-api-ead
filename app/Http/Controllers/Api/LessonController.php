<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LessonRepository;
use App\Http\Resources\LessonResource;

class LessonController extends Controller
{
    protected $repository;

    public function __construct(LessonRepository $lessonRepository) // Injecting the repository
    {
        $this->repository = $lessonRepository;
    }

    public function index($moduleId) // todas as aulas de um modulo
    {
        $lessons = $this->repository->getLessonsByModuleId($moduleId); // Obtem os modulos pelo Curso ID

        return LessonResource::collection($lessons);

    }

    public function show($lessonId) // mostra uma aula de um modulo
    {
        return new LessonResource($this->repository->getLesson($lessonId)); // Como isso é um unico item Retorna um Novo Instancia de LessonResource
        
    }

}
