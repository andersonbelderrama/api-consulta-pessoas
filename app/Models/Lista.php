<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function itens_lista()
    {
        return $this->hasMany(ItemLista::class);
    }

    public function getNomeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDescricaoAttribute($value)
    {
        return ucfirst($value);
    }
}
