<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='task';
    protected $fillable=['title','description','status_id'];
    protected $dates=['created_at','updated_at'];
    public function status()
    {
        return $this->hasMany(Status::class,'status_id');
    }
}
