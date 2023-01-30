<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    use HasFactory;
    protected $table = 'discos';
    protected $fillable = [
        'nombre',
        'artista',
        'formato',
        'pais',
        'fecha',
        'genero',
        'precio',
        'imagen'
    ];
    protected $hidden = [];
}
