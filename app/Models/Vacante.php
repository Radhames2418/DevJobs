<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacante extends Model
{
    use HasFactory;

    protected $casts  = ['ultimo_dia' => 'date'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function categoria(): belongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function salario(): belongsTo
    {
        return $this->belongsTo(Salario::class);
    }

}
