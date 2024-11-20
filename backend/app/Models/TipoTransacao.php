<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTransacao extends Model
{
    use HasFactory;

    // Campos permitidos para preenchimento
    protected $fillable = [
        'descricao',
    ];

     /**
     * Relacionamento com Transacao (um para muitos).
     */
    public function transacoes()
    {
        return $this->hasMany(Transacao::class, 'tipo_id');
    }
}
