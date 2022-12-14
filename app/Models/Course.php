<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;

class Course extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false; // Desabilita o auto incremento do ID
    protected $keyType = 'uuid'; // This is the key type

    protected $fillable = [
        'name',
        'description',
        'image'     
    ];

    
// ====================================================== //
// =================== Relacionamentos ================== //
// ====================================================== //

// ~~~~~~ One Course to Many Modules - hasMany ~~~~~ //

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
