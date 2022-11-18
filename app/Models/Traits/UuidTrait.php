<?php

namespace App\Models\Traits;
use Illuminate\Support\Str;

trait UuidTrait
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}