<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; // Importar para manejar fechas

class Pelicula extends Model
{
    use HasFactory;
    //use SoftDeletes; // Habilitar SoftDeletes si quieres eliminar registros en lugar de eliminarlos permanentemente

    // Los campos que se pueden llenar en masa
    protected $fillable = [
        'titulo',
        'descripcion',
        'video_url',
        'poster_imagen',
        'autor',
        'fecha_creacion',
        'duracion',
        'category_id',
        'lugar_grabacion',
    ];

    // Definir la relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Definir la relación con los comentarios si la película tiene comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Para asegurarse de que los campos de fecha se manejen como instancias de Carbon
    protected $dates = [
        'fecha_creacion',
        'deleted_at', // Habilitar SoftDeletes
    ];

    // Obtener la URL completa del póster
    public function getPosterImageUrlAttribute()
    {
        return $this->poster_image ? asset('storage/' . $this->poster_image) : asset('images/default-poster.jpg');
    }

    // Formatear la fecha de lanzamiento para mostrarla en un formato amigable
    public function getFormattedReleaseDateAttribute()
    {
        return $this->fecha_creacion ? Carbon::parse($this->fecha_creacion)->format('d/m/Y') : 'N/A';
    }
}