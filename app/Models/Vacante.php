<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = [
        'ultimo_dia' => 'datetime'
    ];

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

    public function categoria(): BelongsTo
    {
        return  $this->belongsTo(Categoria::class);
    }

    public function salario(): BelongsTo
    {
        return $this->belongsTo(Salario::class);
    }

    // Una vacante tiene muchos candidatos (Uno a muchos) 
    //Los candidatos se muestran del creado más reciente al más antiguo
    public function candidatos(): HasMany
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }

    // Una vacante pertenece a un usuario
    public function reclutador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
