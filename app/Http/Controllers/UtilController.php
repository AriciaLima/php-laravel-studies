<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilController extends Controller
{
    public function home(){
        //consulta à base de dados pelo nome do login
        $myName = 'Arícia';
        $age = 31;
        $students = ['Rafael', 'Luísa', 'Luís'];

        $userData = [
            'name' => 'Arícia',
            'age' => 31
        ];

        $cesaeInfo = $this->getCesaelnfo();
        return view('homepage', compact(
            'myName',
            'age',
            'students',
            'userData',
            'cesaeInfo'
        ));
    }

    private function getCesaelnfo(){
        return [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
        ];
    }
}
