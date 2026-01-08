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
            ->leftJoin('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.id',
                'tasks.name',
                'tasks.description',
                'tasks.status',
                'tasks.due_at',
                'tasks.user_id',
                'users.name as user_name'
            )
            ->where('tasks.id', $id)
            ->first();

        abort_if(!$task, 404);

        return view('tasks.view_task', compact('task'));
    }

    public function editTask($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        abort_if(!$task, 404);

        return view('tasks.edit_task', compact('task'));
    }

    public function updateTask(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'due_at' => ['nullable', 'date'],
        ]);

        DB::table('tasks')
            ->where('id', $id)
            ->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'status' => $validated['status'] ?? null,
                'due_at' => $validated['due_at'] ?? null,
                'updated_at' => now(),
            ]);

        return redirect()->route('tasks.view', $id)->with('status', 'Tarefa atualizada com sucesso.');
    }
    
 public function addTask()
{
    $users = DB::table('users')->get();

    return view('tasks.add_task', compact('users'));
}

    public function deleteTask($id)
    {
        $deleted = DB::table('tasks')->where('id', $id)->delete();

        return redirect()
            ->route('tasks.all')
            ->with('status', $deleted ? 'Tarefa apagada com sucesso.' : 'Tarefa não encontrada.');
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
