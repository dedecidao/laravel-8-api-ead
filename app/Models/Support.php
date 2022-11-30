<?php
// criacao de ultima interacao poderemos utilizar uma feature do laravel que permitira que a tabela
// relacionada a esta q se chamará dt_respostas do Suporte a medida q for alterada possa dar um touch na tabela parente dela
// assim atualizando o campo automatico do laravel updated_at

// Estrategias com enum abaixo pode ser criado uma model pra armazenar ou outra estrategia abordada abaixo
// ou um metodo aqui q retornatia a descriacao ou ate mesmo um atributo

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;

    protected $keyType = 'uuid'; // This is the key type

    public $incrementing = false; // Desabilita o auto incremento do ID
    public $statusOptions = [
        'P' => 'Pendente, aguardando interação do Professor',
        'A' => 'Aguardando Aluno',
        'C' => 'Ticket Finalizado'
    ];
    
    // Campos Preenchiveis
    protected $fillable = [
        'status',
        'description',
        'lesson_id'
    ];  

    // ##################################################################### //
    // ########## Relacionamento Do Support com User e Com Lesson ########## //
    // ##################################################################### //
    
    public function user() //Quem e o usuario que criou o Suporte // BelongsTo // Many To One
    {
        return $this->belongsTo(User::class);
    }

    public function lesson() //Qual Lição este Suporte está associado // BelongsTo // Many To One
    {
        return $this->belongsTo(Lesson::class);
    }

}
