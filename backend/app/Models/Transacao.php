<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'valor',
        'tipo_id',
    ];

    /**
     * Relacionamento com TipoTransacao (um para um).
     */
    public function tipo()
    {
        return $this->belongsTo(TipoTransacao::class, 'tipo_id');
    }
}
