<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Utils\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    protected $activityLog;
    public function __construct(
        ActivityLog $activityLog,

    ) {
        $this->activityLog = $activityLog;

    }
    public function storeTask(Request $request)
    {
        try {
            DB::beginTransaction();
            $auth_user = $request->user_id;

            $planned_end_date = Carbon::parse($request->planned_end_date)->format('d-m-y H:i:s');
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'planned_end_date' => $request->planned_end_date,
                'user_id' => $request->user_id ,
                'created_by' => $auth_user ,
                'status' => 'pending',
                'is_completed' => false
            ]);

            if($request->piority_id == 1)
            {
                $top_tasks = Task::where('piority_id' ,1)->where('created_by' ,$auth_user)->get();
                if(!empty($top_tasks)){

                    foreach ($top_tasks as $key => $value) {
                        $value->piority_id =2 ;
                        $value->save();
                    }
                }
                $task->piority_id = $request->piority_id;


            }else{

                $task->piority_id = $request->piority_id;

            }
            $task->save();
            $text = 'Task Created';
            $this->activityLog->activityLog($task->id, $text , $auth_user);

            DB::commit();
            $message = [
                'status' => true,
                'message' => 'Added Successfully..!'
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = [
                'status' => false,
                'message' => 'Something Went Wrong..!'
            ];
        }
        return $message;

    }

    public function updatePiority(Request $request)
    {
        try {
            DB::beginTransaction();
            $auth_user = $request->user_id;
            $id = $request->id;
            $piority_id = $request->piority_id;
            $task = Task::find($id);
            if(empty($task))
            {
                $message = [
                    'success' => false,
                    'message' => 'Incorrect Task Id..!'
                ];
                return $message;
            }
            if($piority_id == 1)
            {
                $top_tasks = Task::where('piority_id' ,1)->where('created_by' ,$auth_user)->get();
                if(!empty($top_tasks)){
                    foreach ($top_tasks as $key => $value) {
                        if($task->id != $value->id){
                        $value->piority_id =2 ;
                        $value->save();
                        $piority = $this->activityLog->checkPiority(2);
                        $text = 'Task Piority Change To '.$piority.'';
                        $this->activityLog->activityLog($value->id, $text , $auth_user);
                    }
                    }
                }
                $task->piority_id = $request->piority_id;
                $task->save();
                $piority = $this->activityLog->checkPiority($piority_id);
                $text = 'Task Piority Change To '.$piority.'';
                $this->activityLog->activityLog($task->id, $text , $auth_user);


            }else{

                $task->piority_id = $request->piority_id;
                $task->save();
                $piority = $this->activityLog->checkPiority($piority_id);
                $text = 'Task Piority Change To '.$piority.'';
                $this->activityLog->activityLog($task->id, $text , $auth_user);

            }



            DB::commit();
            $message = [
                'status' => true,
                'message' => 'Updated Successfully..!'
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = [
                'status' => false,
                'message' => 'Something Went Wrong..!'
            ];


        }
        return $message;
    }
}
