<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupport extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false; // Desabilita o auto incremento do ID
    protected $keyType = 'uuid'; // This is the key type
    
    // ====================================================== //
    // ======================== TABLE ======================= //
    // ====================================================== //
    
    protected $table = 'reply_support';


    protected $fillable = [
        'description',
        'support_id',
        'user_id'
    ];   

    // ====================================================== //
    // ================= Tocar tabela Parent ================ //
    // ====================================================== //

    protected $touches = ['support'];

    // ====================================================== //
    // ======== Relacionamento Com Suporte e Usuario ======== //
    // ====================================================== //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function support()
    {
        return $this->belongsTo(Support::class);
    }

}
