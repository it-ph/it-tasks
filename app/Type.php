<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = [
        'type_name'
    ];

    public function tasks_type()
    {
        return $this->hasMany(Task::class,'type_id');
    }
}
