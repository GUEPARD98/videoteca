<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {


        $tags = Tag::all();
        $fecha_actual = now();
        $fecha_formateada = $fecha_actual->format(' g:i a');


        return view('livewire.navigation', compact('tags', 'fecha_formateada', 'fecha_actual'));
    }
}
