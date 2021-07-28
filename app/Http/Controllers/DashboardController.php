<?php

namespace App\Http\Controllers;

use App\Task;
use App\Stat;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::all();
        // $tasks = Task::where('target_completion','>',date('Y-m-d'))
                        // ->get();
        $stats = Stat::all();
        $types = Type::all();

        $ctr = DB::table('tasks as t')
            ->select(DB::raw('COUNT(t.task_name) as c'))
            ->leftJoin('stats as s', 't.status_id', '=', 's.id')
            ->groupBy('s.status_name')
            ->orderBy('s.id')
            ->get();

        // $cctr = Stat::with('tasks_stat')->count();

        // dd($ctr);
        $overdues = getOverdues();
        $ctr_overdue = countOverdues();
        // dd($overdues);
        return view('itdev-task.dashboard',compact('tasks','stats','types', 'ctr','overdues','ctr_overdue'));
    }
}
