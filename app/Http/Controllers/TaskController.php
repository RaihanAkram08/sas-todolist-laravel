<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        if ($request->has('status')) {
            if ($request->status === 'done') {
                $query->where('is_completed', true);
            } elseif ($request->status === 'notdone') {
                $query->where('is_completed', false);
            }
        }

        $tasks = $query->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskPostRequest $request)
    {
        $new_task = new Task();
        $new_task->task = $request->task;
        $new_task->is_completed = $request->is_completed;
        $new_task->user_id = Auth::user()->id;
        $new_task->save();
        return redirect("/tasks")->with('success', 'Tugas baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        // Cek apakah task ini milik user yang login
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Hanya dapat mengedit tugas milik anda');
        }
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->task = $request->task;
        $task->is_completed = $request->is_completed;
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect("/tasks")->with('success', 'Tugas berhasil diperbarui!');
    }

    public function delete(string $id) 
    {
        $task = Task::findOrFail($id);

        if ($task->user_id !== Auth::id()) {
            abort(403, 'Hanya dapat menghapus tugas milik anda');
        }

        return view('tasks.delete', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/tasks')->with('success', 'Tugas baru berhasil dihapus!');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'is_completed' => 'required|boolean',
        ]);

        $task->is_completed = $request->is_completed;
        $task->save();

        return response()->json([
            'task' => $task->task,
            'status_text' => $task->status_text,
        ]);
    }
}
