<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false; // Desabilita o auto incremento do ID
    protected $keyType = 'uuid'; // This is the key type

    protected $fillable = [
        'name',
    ];   

 
// ====================================================== //
// =================== Relacionamentos ================== //
// ====================================================== //

// ~~~~~~ Many Modules has ONE Course - belongsTo ~~~~~ //

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
