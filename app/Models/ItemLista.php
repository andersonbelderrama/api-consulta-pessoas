<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'documento',
        'motivo',
    ];

    public function lista()
    {
        return $this->belongsTo(Lista::class, 'lista_id', 'id');
    }

    public function getNomeAttribute($value)
    {
        return ucfirst($value);
    }

}
