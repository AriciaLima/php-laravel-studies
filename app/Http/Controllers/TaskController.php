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

    public function viewTask($id)
    {
        $task = DB::table('tasks')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.*',
                'users.name as user_name'
            )
            ->where('tasks.id', $id)
            ->first();

        if (!$task) {
            abort(404, 'Task não encontrada');
        }

        return view('tasks.view_task', compact('task'));
    }

    public function deleteTask($id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->delete();

        return redirect()->route('tasks.all')
            ->with('success', 'Tarefa removida com sucesso');
    }

    protected function getAllTasks()
    {
        return DB::table('tasks')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.id',
                'tasks.name',
                'tasks.status',
                'tasks.due_at',
                'users.name as user_name'
            )
            ->get();
    }

    //  MOSTRAR FORMULÁRIO
    public function addTask()
    {
        $users = DB::table('users')->get();
        return view('tasks.add_task', compact('users'));
    }

    // GUARDAR TASK
    public function storeTask(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        DB::table('tasks')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tasks.all');
    }
}

