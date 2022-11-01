<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog as ModelsActivityLog;
use App\Models\Task;
use App\Models\User;
use App\Utils\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    protected $activityLog;
    public function __construct(
        ActivityLog $activityLog,

    ) {
        $this->activityLog = $activityLog;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
       return view('task.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validatedData();

        try {
            DB::beginTransaction();
            $auth_user = Auth::user();
            $planned_end_date = Carbon::parse($request->planned_end_date)->format('d-m-y H:i:s');
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'planned_end_date' => $request->planned_end_date,
                'user_id' => $request->user_id ,
                'created_by' => $auth_user->id ,
                'status' => 'pending',
                'is_completed' => false
            ]);

            if($request->piority_id == 1)
            {
                $top_tasks = Task::where('piority_id' ,1)->where('created_by' ,$auth_user->id)->get();
                if(!empty($tasks)){
                    foreach ($tasks as $key => $value) {
                        $value->piority_id =2 ;
                        $value->save();
                    }
                }
                $task->piority_id = $request->piority_id;
                $task->save();

            }else{

                $task->piority_id = $request->piority_id;
                $task->save();
            }
            $text = 'Task Created';
            $this->activityLog->activityLog($task->id, $text , $auth_user->id);

            DB::commit();
            $message = [
                'success' => 1,
                'message' => 'Added Successfully..!'
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = [
                'success' => 0,
                'message' => 'Something Went Wrong..!'
            ];
        }
        return redirect()->route('home')->with('message',$message);
    }

    protected function validatedData()
    {
        return request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => [ 'string', 'max:65000'],
            'piority_id' => ['required' , 'integer'],
            'planned_end_date' => ['required' ],
            'user_id' => ['sometimes', 'integer'],

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $task = $task;


        return view('task.edit' , compact('users','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validatedData();

        try {
            DB::beginTransaction();
            $auth_user = Auth::user();
            $planned_end_date = Carbon::parse($request->planned_end_date)->format('d-m-y H:i:s');
            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'planned_end_date' => $request->planned_end_date,
                'user_id' => $request->user_id ,
                'created_by' => $auth_user->id ,
                'status' => 'pending',
                'is_completed' => false

            ]);
            if($request->piority_id == 1)
            {
                $top_tasks = Task::where('piority_id' ,1)->where('created_by' ,$auth_user->id)->get();
                if(!empty($tasks)){
                    foreach ($tasks as $key => $value) {
                        $value->piority_id =2 ;
                        $value->save();
                    }
                }
                $task->piority_id = $request->piority_id;
                $task->save();

            }else{

                $task->piority_id = $request->piority_id;
                $task->save();
            }
            $text = 'Task Edited';
            $this->activityLog->activityLog($task->id, $text , $auth_user->id);


            DB::commit();
            $message = [
                'success' => 1,
                'message' => 'Updated Successfully..!'
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = [
                'success' => 0,
                'message' => 'Something Went Wrong..!'
            ];
        }
        return redirect()->route('home')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       try {
        DB::beginTransaction();
        $task = Task::find($id);
        if(!empty($task)){
            $task->delete();

        }
                $auth = Auth::user();
                $last_task =  Task::where('created_by' , $auth->id)->where('piority_id' ,1)->get();
                if(empty($last_task))
                {
                    $last_task =  Task::where('created_by' , $auth->id)->where('piority_id' ,1)->get()->last();
                    if(!empty($last_task))
                    {
                    $last_task->piority_id = 1;
                    $last_task->save();
                    }
                }


        DB::commit();
        return response()->json(['success' => 1, "msg" => "Your product has been deleted "]);


       } catch (\Throwable $th) {

        DB::rollBack();
        return response()->json(['success' => 0 , "msg" => "Something Went Wrong "]);
       }
    }

    public function showActivity($id)
    {

        $task = Task::find($id);
        $task_activities = ModelsActivityLog::where('task_id' ,$id)->get();

        return view('task.activity-show', compact('task' ,'task_activities'));
    }

    public function changePiority($id)
    {
        $task = Task::find($id);

        return view('task.piority' , compact('task'));

    }

    public function updatePiority(Request $request)
    {
        try {
            DB::beginTransaction();
            $auth_user = Auth::user();
            $id = $request->id;
            $piority_id = $request->piority_id;
            $task = Task::find($id);
            if($piority_id == 1)
            {
                $top_tasks = Task::where('piority_id' ,1)->where('created_by' ,$auth_user->id)->get();
                if(!empty($top_tasks)){
                    foreach ($top_tasks as $key => $value) {
                        if($task->id != $value->id){
                        $value->piority_id =2 ;
                        $value->save();
                        $piority = $this->activityLog->checkPiority(2);
                        $text = 'Task Piority Change To '.$piority.'';
                        $this->activityLog->activityLog($value->id, $text , $auth_user->id);
                    }
                    }
                }
                $task->piority_id = $request->piority_id;
                $task->save();
                $piority = $this->activityLog->checkPiority($piority_id);
                $text = 'Task Piority Change To '.$piority.'';
                $this->activityLog->activityLog($task->id, $text , $auth_user->id);


            }else{

                $task->piority_id = $request->piority_id;
                $task->save();
                $piority = $this->activityLog->checkPiority($piority_id);
                $text = 'Task Piority Change To '.$piority.'';
                $this->activityLog->activityLog($task->id, $text , $auth_user->id);

            }



            DB::commit();
            return response()->json(['success' => 1, "msg" => "Change Piority Success "]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => 0 , "msg" => "Something Went Wrong "]);

        }
    }
}
