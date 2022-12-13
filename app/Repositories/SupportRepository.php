<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Models\Support;
use App\Models\User;
use App\Repositories\Traits\RepositoryTrait;

class SupportRepository

{
    use RepositoryTrait;


    protected $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getMySupports(array $filters = [])
    {
        $filters['user'] = true;

        return $this->getSupports($filters);
    }

    public function getSupports(array $filters = []) // Receber um array de filtros
    {
        // Pegar us duvidas das aulas
        return $this->entity
            ->where(function ($query) use ($filters) { // tratando o Array de Filtros
              
                if (isset($filters['user'])) {
                    $user = $this->getUserAuth();

                    $query->where('user_id', $user->id);
                }
                if (isset($filters['lesson'])) {
                    $query->where('lesson_id', $filters['lesson']);
                }

                if (isset($filters['status'])) {
                    $query->where('status', $filters['status']);
                }

                if (isset($filters['filter'])) {
                    $filterLike = $filters['filter'];
                    $query->where('description', 'LIKE', "%{$filterLike}%");
                }
            })
            ->orderBy('updated_at')
            ->get();
    }




    public function createNewSupport(array $data): Support
    {
        $support = $this->getUserAuth()
            ->supports()
            ->create([
                'lesson_id'     => $data['lesson'],
                'description'   => $data['description'],
                'status'        => $data['status']
            ]);

        return $support;
    }

    public function createReplyToSupportId(string $idSupport, array $data)
    {
        $user = $this->getUserAuth();
            //dd($user);
            return $this->getSupport($idSupport)
                ->replies() // relacionamento a ser creiado la no Objeto Suport
                ->create([
                    'description' => $data['description'],
                    'user_id'     => $user->id             
                ]);
    }

    public function getSupport(string $idSupport): Support
    {
        return $this->entity->findOrFail($idSupport);
    }
}
