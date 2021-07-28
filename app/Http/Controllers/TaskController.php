<?php

namespace App\Http\Controllers;

use App\Task;
use App\Stat;
use App\Type;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $tasks = Task::paginate(2);
        $tasks = Task::all();
        $stats = Stat::all();
        $types = Type::all();

        $ctr_overdue = countOverdues();
        return view('itdev-task.task.show',compact('tasks','stats','types','ctr_overdue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            // 'team' => 'required',
            'type' => 'required',
            'task_name' => 'required',
            'product_owner' => 'required',
            'status' => 'required'
        ],
        [
            'type.required' => 'The task type field is required'
        ]);
        $task = Task::create(
            [
                // 'team'=>$request['team'],
                'type_id'=>$request['type'],
                'task_name'=>$request['task_name'],
                'product_owner'=>$request['product_owner'],
                'start_date'=>$request['start_date'],
                'target_completion'=>$request['target_completion'],
                'status_id'=>$request['status'],
                'remarks'=>$request['remarks']
            ]
        );
        // Task::create($request->all());

        return redirect()->back()->with('with_success',"Task Added Successfully!" );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  return $request;
        $this->validate($request,
        [
            // 'team' => 'required',
            'type_id' => 'required',
            'task_name' => 'required',
            'product_owner' => 'required',
            'status_id' => 'required'
        ],
        [
            'type.required' => 'The task type field is required'
        ]);
        $task = Task::findorfail($id);
        //$task->update($request->all());

        $task->update(
            [
                // 'team'=>$request['team'],
                'type_id'=>$request['type_id'],
                'task_name'=>$request['task_name'],
                'product_owner'=>$request['product_owner'],
                'start_date'=>$request['start_date'],
                'target_completion'=>$request['target_completion'],
                'status_id'=>$request['status_id'],
                'remarks'=>$request['remarks']
            ]
        );

        return redirect()->back()->with('with_success',"Task Updated Successfully!" );;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findorfail($id);
        $task->delete();

        return redirect()->back()->with('with_success',"Task Deleted Successfully!" );;
    }
}
