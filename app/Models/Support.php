<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = ['status', 'description', 'lesson_id'];

    public $statusOption = [
        'P' => 'Pendente, Aguardando Professor',
        'A' => 'Aguardando aluno',
        'C' => 'Finalizado, Concluido'
    ];

    public function user() //o suporte pentence a um user
    {
        return $this->belongsTo(User::class);
    }

    public function lesson() //o suporte pentence a um user
    {
        return $this->belongsTo(Lesson::class);
    }
}
