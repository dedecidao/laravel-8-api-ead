<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Repositories\ModuleRepository;

class ModuleController extends Controller
{
    
    protected $repository;

    public function __construct(ModuleRepository $moduleRepository) // Injecting the repository
    {
        $this->repository = $moduleRepository;
    }

    public function index($courseId)
    {
        $modules = $this->repository->getModulesByCursoId($courseId); // Obtem os modulos pelo Curso ID

        return ModuleResource::collection($modules);

    }

}
