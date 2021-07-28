<?php

use App\Task;
use App\Stat;
use App\Type;

function getOverdues()
{
    // $overdues = Task::where('target_completion','<',date('Y-m-d'))
    //                 ->where('status_id','<>','2')
    //                 ->get();
    $overdues = Task::where([
                                ['target_completion','<',date('Y-m-d')],
                                ['status_id','<>','2']
                            ])
                    ->get();
    return $overdues;
}

function countOverdues()
{
    $ctr_overdues = getOverdues()->count();
    return $ctr_overdues;
}
