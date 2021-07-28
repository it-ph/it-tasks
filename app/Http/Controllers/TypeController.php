<?php

namespace App\Http\Controllers;

use App\Type;
use App\Task;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        $types = Type::all();
        $ctr_overdue = countOverdues();
        return view('itdev-task.type.show',compact('types','ctr_overdue'));
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
            'type' => 'required'
        ],
        [
            'type.required' => 'The task type field is required'
        ]);

        $types = Type::where('type_name', $request['type'])->count();

        if($types > 0)
        {
            // dd('found');
            return redirect()->back()->with('with_warning',"Type not saved! Type already exist!" );
        }
        // dd('notfound');
        $type = Type::create(
            [
                'type_name'=>$request['type']
            ]
        );

        return redirect()->back()->with('with_success',"Type Added Successfully!" );;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'type' => 'required'
        ],
        [
            'type.required' => 'The task type field is required'
        ]);

        $type = Type::findorfail($id);
        $old_type = $type->type_name;
        $new_type = $request['type'];

        // dd($type->type_name);

        $types = Type::where('type_name', $request['type'])->count();

        if($types > 0)
        {
            // dd('found');
            if($old_type != $new_type)
            {
                return redirect()->back()->with('with_warning',"Type not saved! Type already exist!" );
            }
        }
        // dd('notfound');
        $type->update(
            [
                'type_name'=>$request['type']
            ]
        );

        return redirect()->back()->with('with_success',"Type Updated Successfully!" );;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::withCount('tasks_type')->findorfail($id);
        if($type->tasks_type_count > 0)
        {
            return redirect()->back()->with('with_warning',"Type cannot be deleted! There are task(s) associated with it!" );
        }
        $type->delete();
        return redirect()->back()->with('with_success',"Type Deleted Successfully!" );
    }
}
