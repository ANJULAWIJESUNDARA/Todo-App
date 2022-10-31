<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $auth = Auth::user();
        $tasks =  Task::where('created_by' , $auth->id)->get();
        $top_task = Task::where('created_by' , $auth->id)->where('piority_id' , 1)->first();
        
        return view('home' , compact('tasks','top_task'));
    }
}
