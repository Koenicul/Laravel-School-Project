<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\task;

class TaskController extends Controller
{
    public function createTask(Request $request){
        $request->validate([
            'task' => 'required',
            'date' => 'required',
        ]);

        $task = new task;

        $task->task = $request->task;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->category = $request->category;
        $task->save();

        return redirect()->back();
    }

    public function showTasks(){
        $tasks = DB::table('tasks')
            ->leftJoin('categories', 'tasks.category', '=', 'categories.category_id')
            ->get();

        return view('todo', compact('tasks'));
    }

    public function viewTask($id){
        $task = DB::table('tasks')
            ->where('tasks.id', $id)
            ->leftJoin('categories', 'tasks.category', '=', 'categories.category_id')
            ->first();

        return view('viewtask', compact('task'));
    }

    public function editTask(Request $request, $id){
        $request->validate([
            'task' => 'required',
        ]);

        $task = task::where('id', $id)->first();
        
        $task->task = $request->task;
        $task->description = $request->description;
        $task->category = $request->category;
        $task->save();
        
        switch ($request->input('action')) {
            case 'home':
                return redirect('/todo');
                break;
    
            case 'back':
                return redirect()->back();
                break;
            }
    }

    public function deleteTask(Request $request, $task){
        $request->validate([
            'task' => 'required'
        ]);

        if ($task == $request->task){ 
            
            $task = DB::table('tasks')
                ->where('task', $task);
            $taskM = $task->first(); 

            $task->delete();

            return redirect(url('/todo')); 
        }

        return redirect()->back()->with('danger','Task Name Is Invalid');
    }

    public function completeTask(Request $request, $id){
        $task = task::where('id', $id)->first();
        $task->completed = $request->input('completed', 0);
        $task->save();

        return redirect()->back();
    }
}