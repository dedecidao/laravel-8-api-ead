<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;  //Importando a classe Str para gerar o UUID
use App\Models\Traits\UuidTrait; //Importando o Trait

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait; //Adicionando o trait UuidTrait


    public $incrementing = false; // Desabilita o auto incremento do ID
    protected $keyType = 'uuid'; // This is the key type
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // ##################################################################### //
    // ##################### Relacionamentos do User #################### //
    // ##################################################################### //

    public function supports()
    {
        return $this->hasMany(Support::class); // Relacao de Um Usuario para Muitos Suportes
    }
     
}
