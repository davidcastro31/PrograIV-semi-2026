<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
protected $fillable = ['nombre', 'genero', 'biografia', 'foto'];

public function canciones() {
    return $this->hasMany(Cancion::class, 'artista_id');
}
}
