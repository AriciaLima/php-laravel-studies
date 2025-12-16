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

    public function allTasks()
    {
        $tasks = $this->getAlITasks();

        return view('all_tasks', compact('tasks'));
    }

    protected function getAlITasks()
    {
        $tasks = DB::table('tasks')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.id',
                'tasks.name',
                'tasks.status',
                'tasks.due_at',
                'users.name as user_name'
            )
            ->get();

        if ($tasks->isEmpty()) {
            $tasks = collect([
                (object) [
                    'id' => 1,
                    'name' => 'Preparar relatório mensal',
                    'status' => true,
                    'due_at' => '2025-12-31',
                    'user_name' => 'Utilizador demo',
                ],
                (object) [
                    'id' => 2,
                    'name' => 'Rever documentação',
                    'status' => false,
                    'due_at' => '2025-12-28',
                    'user_name' => 'Responsável a designar',
                ],
            ]);
        }

        return $tasks;
    }
}
