<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacante extends Model
{
    use HasFactory;

    protected $casts  = ['ultimo_dia' => 'date'];

    /**
     * List of fillable attributes for the model.
     *
     * @var array
     */
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

    /**
     * Get the category associated with the model.
     *
     * @return BelongsTo
     */
    public function categoria(): belongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Get the associated salario.
     *
     * @return BelongsTo
     */
    public function salario(): belongsTo
    {
        return $this->belongsTo(Salario::class);
    }

    /**
     * Get the candidatos related to this model.
     *
     * @return HasMany
     */
    public function candidatos(): hasMany
    {
        return $this->hasMany(Candidato::class);
    }

    /**
     * Get the reclutador for this instance.
     *
     * @return BelongsTo
     */
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
