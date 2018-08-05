<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    protected $fillable=['commentariy','task_id'];
    protected $dates=['created_at','updated_at'];
    public function task()
    {
        return $this->hasMany(Task::class,'task_id');
    }
}
