<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks()
    {
        $data = Task::all();
        return json_encode($data);
    }

    public function setTask($title, $desc)
    {
        $task = new Task();
        $task->title = $title;
        $task->desc = $desc;
        $task->save();
        return json_encode(array("state" => "ok"));
    }

    public function delTask($id)
    {
        Task::destroy($id);
        return json_encode(array("state" => "ok"));
    }

    public function showTask($id)
    {
        $task = Task::where('id', $id)->get();
        return json_encode($task);
    }
}