<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function retrieve(){

        $todo_list = DB::table('todo_list')->get();
        return view('todoList', ['todo_list' => $todo_list]);
    }
}
