<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks()
    {
        $tasks = $this->getAllTasks();

        return view('tasks.all_tasks', compact('tasks'));
    }

    protected function getAllTasks()
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
