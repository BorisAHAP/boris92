<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Status;
use App\Task;
use foo\bar;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function createTask(){
       $status=Status::all();
       return view('tasks\create',['status'=>$status]);
   }
   public function createRequestTask(Request $request){
        $newTask=new Task();
        $newTask->create([
           'title'=>$request->name,
            'description'=>$request->description,
            'status_id'=>$request->stat_id,
        ]);
        return redirect()->route('index');
   }
   public function editTask($id){
        $task=Task::find($id);
        $status=Status::all();
        $comments=Comment::where('task_id',$id)->get();
        return view('tasks.edit',[
            'task'=>$task,
            'status'=>$status,
            'comments'=>$comments,
        ]);
   }
   public function editRequestTask(Request $request,$id){
            $task=Task::find($id);
            $task->title=$request->name;
            $task->description=$request->description;
            $task->status_id=$request->stat_id;
            $task->save();
            if($request->commentariy){
                $newComm=new Comment();
                $newComm->create([
                   'commentariy'=>$request->commentariy,
                    'task_id'=>$id,
                ]);
            }

       return redirect()->route('index');

   }
   public function deleteTask(Request $request){
        if($request->ajax()){
            $id=$request->id;
            Task::where('id',$id)->delete();
            Comment::where('task_id',$id)->delete();
        }
   }
}
