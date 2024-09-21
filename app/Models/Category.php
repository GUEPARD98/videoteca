<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define los atributos que se pueden asignar masivamente
    protected $fillable = ['name', 'slug'];

    /**
     * Relación uno a muchos con el modelo Post.
     * Asume que tienes un modelo Post relacionado.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Modifica la clave utilizada en las rutas.
     * En este caso, utiliza el campo 'slug' en lugar de 'id'.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relación uno a muchos con el modelo Pelicula.
     * Asume que tienes un modelo Pelicula relacionado.
     */
    public function peliculas()
    {
        return $this->hasMany(Pelicula::class);
    }
}
