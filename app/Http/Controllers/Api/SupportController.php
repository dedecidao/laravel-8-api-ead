<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupport;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;

class SupportController extends Controller
{
    //Atributos da Classe Suporte - One Repository Protegido
    protected $repository;

    //Contrutora para injecao de dependencia de Repository

    public function __construct(SupportRepository $supportRepository)
    {
        $this->repository = $supportRepository;
    }

    //Listar/Buscar os suportes

    public function index(Request $request)
    {
        //$supports = $this->repository->getSupportsByLessonId(?); Recupera usando o repo antes de mandar depois gerar um resource
        $supports = $this->repository->getSupports($request->all());
        return SupportResource::collection($supports);
    }

    public function store(StoreSupport $request) // Injecao da Validacao
    {
        $support = $this->repository->createNewSupport($request->validated());

        return new SupportResource($support);
    }


}
