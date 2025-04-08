<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //todoリストの一覧表示
    public function index()
    {
        $tasks = Task::all();
        return view('task.index',compact('tasks'));
    }

    // 新しいTodoリストアイテム作成フォーム表示
    public function create()
    {
        return view('Task.create');
    }

    // 新しいTodoアイテムの保存
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create($request->all());
        return redirect()->route('Tasks.index');
    }

    // Todoアイテムの完了状態を更新
    public function update(Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();
        return redirect()->route('tasks.index');
    }

    // Todoアイテムの削除
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
