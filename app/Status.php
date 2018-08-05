<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table='status';
    protected $fillable=['name'];
    protected $dates=['created_at','updated_at'];
}
