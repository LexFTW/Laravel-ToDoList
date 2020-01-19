<?php

namespace App\Http\Controllers\Task;

use App\Task\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller{

  public function index(){
    $tasks = Task::get();
    return view('tasks.index', compact('tasks'));
  }

  public function store(Request $request){
    $validator = Validator::make($request->all(), [
        'task' => 'required|max:255',
    ]);

    if($validator->fails()){
      return redirect('/')->withErrors($validator)->withInput();
    }

    $task = new Task;
    $task->name = $request->task;
    $task->save();

    return redirect()->back();
  }

  public function delete($id){
    Task::destroy($id);
    return redirect()->back();
  }

}
