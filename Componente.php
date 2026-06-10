<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Componente
 * 
 * Representa um componente de informática no banco de dados.
 * Cada componente possui informações como nome, preço, estoque, etc.
 */
class Componente extends Model
{
    // Define os campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'estoque',
        'categoria',
        'marca',
        'modelo',
        'imagem',
    ];

    // Define os tipos de dados para os atributos
    protected $casts = [
        'preco' => 'decimal:2',
        'estoque' => 'integer',
    ];
}
