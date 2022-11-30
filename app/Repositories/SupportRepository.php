<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Models\Support;
use App\Models\User;

class SupportRepository

{
    protected $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = []) // Receber um array de filtros
    {

        // Pegar um usuario Autenticado
        return $this->getUserAuth()
            ->supports()
            ->where(function ($query) use ($filters) { // tratando o Array de Filtros
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
            ->get();
    }


    private function getUserAuth(): User
    {
        //return auth()->user();
        return User::first();
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
