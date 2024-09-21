<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetivosController extends Controller
{
    public function showObjetivos()
    {
        return view('pages.objetivos');
    }
}