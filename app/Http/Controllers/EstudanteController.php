<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    public function index()
    {
        // Lista de estudantes simulada
        $estudantes = [
            ['nome' => 'João', 'idade' => 20],
            ['nome' => 'Maria', 'idade' => 22],
            ['nome' => 'Pedro', 'idade' => 21],
        ];

        // Retorna a view com os estudantes
        return view('estudantes.index', compact('estudantes'));
    }
}
