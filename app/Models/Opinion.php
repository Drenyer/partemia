<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $table = 'opiniones5';

    protected $fillable = [
        'nombre',
        'correo',
        'opinion',
        'valor',
        'hora',
    ];

    // Definir eventos Eloquent
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Establecer el campo 'hora' con la fecha y hora actuales al crear un nuevo modelo
            $model->hora = now();
        });
    }
}
