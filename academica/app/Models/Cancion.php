<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table = 'canciones'; 

    protected $fillable = ['titulo', 'artista_id', 'genero', 'archivo_audio', 'portada'];

    public function artista() {
        return $this->belongsTo(Artista::class);
    }
}
