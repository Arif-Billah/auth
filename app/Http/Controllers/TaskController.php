<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        //$tasks = Task::where("user_id",$user->id)->get();
        $tasks = $user->tasks;
      return view("tasks.tasks",['tasks'=>$tasks]);
    }

    public function store(Request $request){

        $current_user = $request->user()->id;

        $request->validate([
            "name"=>'required',
            "status"=>"required",
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->status= $request->status;
        $task->user_id=$current_user;
        $task->save();
        return redirect()->route("tasks.index");
    }

    public function destroy(Request $request,Task $task){
        $user = $request->user();
        if($task->user_id == $user->id){
            $task->delete();
            return redirect()->route('tasks.index');

        }else{
            abort(403,'You are not allowed to delete this task');
        }

    }
}
