<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $fillable = [
    //     'type_id', 'task_name', 'product_owner', 'start_date', 'target_completion', 'status_id', 'remarks'
    // ];

    protected $table = 'tasks';
    protected $guarded = [];

    public function thetype()
    {
        return $this->belongsTo(Type::class,'type_id'); //or 'App\Type'
    }

    public function thestat()
    {
        return $this->belongsTo('App\Stat','status_id');
    }
}
