<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $table = 'stats';
    protected $guarded = [];

    public function tasks_stat()
    {
        return $this->hasMany(Task::class,'status_id');
    }
}
