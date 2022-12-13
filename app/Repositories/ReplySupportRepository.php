<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

class ReplySupportRepository

{
    use RepositoryTrait;

    protected $entity;

    public function __construct(ReplySupport $model)
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

    public function createReplyToSupport(array $data)
    {

        $user = $this->getUserAuth();

        return $this->entity
                    ->create([
                        'support_id'  => $data['support'],
                        'description' => $data['description'],
                        'user_id'     => $user->id             
                    ]);
    }

}
