<?php

namespace App\Http\Controllers;

use App\Task;
use App\Stat;
use App\Type;
use Illuminate\Http\Request;

class OverdueController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $stats = Stat::all();
        $types = Type::all();

        $overdues = getOverdues();
        $ctr_overdue = countOverdues();

        return view('itdev-task.overdue',compact('tasks','stats','types','overdues','ctr_overdue'));
    }
}
