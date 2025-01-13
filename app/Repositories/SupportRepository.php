<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;

class SupportRepository
{
    protected $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = []) // recuperar o suporte do usuario
    {
        return $this->getUserAuth()
                    ->supports()
                    ->where(function($query) use ($filters){
                        if(isset($filters['lesson'])){ //Este array pode conter critérios como 'lesson' (id da lição) e 'status' (id do status do suporte).
                            $query->where('lesson_id', $filters['lesson']);
                        }

                        if(isset($filters['status'])){
                            $query->where('status', $filters['status']);
                        }

                        if (isset($filters['description'])) {
                            $query->where('description', 'like', '%' . $filters['description'] . '%');  // Filtro usando LIKE
                        }
                    })
                    ->get();
    }

    private function getUserAuth(): User
    {
        //return auth()->user();
        return User::first();
    }

}
