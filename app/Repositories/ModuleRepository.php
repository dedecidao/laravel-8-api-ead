<?php 

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository

{
    protected $entity;

    public function __construct(Module $model)
    {
        $this->entity = $model;
    }

    public function getModulesByCursoId(string $courseId) // Varias maneiras de retornar o curso
    //Posso recuperar o curso e dps o modulo
    // ou aplicar direto o filtro como exemplo abaixo
    //get() para que seja retornado uma collection
    {
        return $this->entity
                    ->where('course_id', $courseId)
                    ->get();
    }

    

    // public function getAllModules()
    // {
    //     return $this->entity->get();
    // }

    // public function getModule(string $identify)
    // {
    //     return $this->entity->findorFail($identify);
    // }
    

}