<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory, UuidTrait; //Implement a Trait of Uuid

    public $incrementing = false; // Desabilita o auto incremento do ID
    protected $keyType = 'uuid'; // This is the key type

    protected $fillable = [
        'name',
        'description',
        'video'
    ];   
}
