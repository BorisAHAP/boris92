<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Status;
use App\Task;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $tasks=Task::all()->sortByDesc('created_at');
        $status=Status::all();
        return view('app',['tasks'=>$tasks,'status'=>$status]);
        }
}
