<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function home(){
        //consulta à base de dados pelo nome do login
        $myName = 'Sara';
        $age = 39;
        $students = ['Rafael', 'Luísa', 'Luís'];


        return view('homepage',compact(
        'myName',
        'age','students'));
    }
}
