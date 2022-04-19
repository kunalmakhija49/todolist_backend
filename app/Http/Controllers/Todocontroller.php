<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class Todocontroller extends Controller
{
    public function show()
    {
        return Todo::all();
    }
    public function create(Request $request)
    {
        $request->validate([
           'task'=>'required'
        ]);
        $todo = new Todo();
        $todo->task = $request->task;
        $todo->save();
        return $todo;
    }
    public function update(Request $request,$id)
    {
        $existingtodo = Todo::find($id);
        if($existingtodo){
        $existingtodo->task = $request['task'];
        $existingtodo->save();
        }
        return "Task not found";

    }

    public function destroy(Request  $request)
    {

        Todo::find($request->id)->delete();
        return "Item deleted successfully";

    }






}
