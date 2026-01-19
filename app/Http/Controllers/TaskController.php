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
<<<<<<< HEAD
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.*',
=======
            ->leftJoin('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.id',
                'tasks.name',
                'tasks.description',
                'tasks.status',
                'tasks.due_at',
                'tasks.user_id',
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
                'users.name as user_name'
            )
            ->where('tasks.id', $id)
            ->first();

<<<<<<< HEAD
        if (!$task) {
            abort(404, 'Task não encontrada');
        }
=======
        abort_if(!$task, 404);
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb

        return view('tasks.view_task', compact('task'));
    }

<<<<<<< HEAD
    public function deleteTask($id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->delete();

        return redirect()->route('tasks.all')
            ->with('success', 'Tarefa removida com sucesso');
=======
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
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
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

