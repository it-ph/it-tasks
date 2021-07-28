<?php

namespace App\Http\Controllers;

use App\Stat;
use App\Task;
use Illuminate\Http\Request;

class StatController extends Controller
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
        $stats = Stat::all();
        $ctr_overdue = countOverdues();

        return view('itdev-task.status.show',compact('stats','ctr_overdue'));
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
            'status' => 'required'
        ]);

        // dd($request['status']);
        $stats = Stat::where('status_name', $request['status'])->count();

        if($stats > 0)
        {
            return redirect()->back()->with('with_warning',"Status not saved! Status already exist!" );
        }

        $stat = Stat::create(
            [
                'status_name'=>$request['status']
            ]
        );

        return redirect()->back()->with('with_success',"Status Added Successfully!" );;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function show(Stat $stat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function edit(Stat $stat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'status' => 'required'
        ]);

        $stat = Stat::findorfail($id);
        $old_stat = $stat->status_name;
        $new_stat = $request['status'];


        // dd($old_stat);

        $status = Stat::where('status_name', $request['status'])->count();

        if($status > 0)
        {
            // dd('found');
            if($old_stat != $new_stat)
            {
                return redirect()->back()->with('with_warning',"Type not saved! Type already exist!" );
            }
        }
        // dd('notfound');
        $stat->update(
            [
                'status_name'=>$request['status']
            ]
        );

        return redirect()->back()->with('with_success',"Status Updated Successfully!" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $stat = Stat::findorfail($id);
        $stat = Stat::withCount('tasks_stat')->findorfail($id);
        if($stat->tasks_stat_count > 0)
        {
            return redirect()->back()->with('with_warning',"Status cannot be deleted! There are task(s) associated with it!" );
            // return redirect('/unauthorized');
        }
        $stat->delete();

        return redirect()->back()->with('with_success',"Status Deleted Successfully!" );
    }
}
