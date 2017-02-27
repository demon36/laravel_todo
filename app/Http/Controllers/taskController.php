<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = task::all();
    	return view('viewTasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // var_dump($request->all());
        $this->validate($request, [
            'title' => 'required'
        ]);
        $task = new task();
        $task->title = $request->all()["title"];
        $task->save();

        $tasks = task::all();
        return view('viewTasks', compact('tasks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request)
    {
        var_dump($request->all());
      $task=  task::find($request->all()['id']);
      if($request->all()['isChecked']== "true"){
        $task->done=true;
      }
      else {  $task->done=false;
      }
      $task->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(task $task)
    {
        var_dump($task);
        // $tasks = task::all();
        // return view('viewTasks', compact('tasks'));
    }


    public function remove(task $task){
        $task->delete();
        return redirect()->action('taskController@index');
    }
}