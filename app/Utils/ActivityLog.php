<?php

namespace App\Utils;

use App\Models\ActivityLog as ModelsActivityLog;
use Dflydev\DotAccessData\Util;

class ActivityLog extends Util
{
    public function activityLog($task_id , $text, $user_id)
    {
        $activity_log = ModelsActivityLog::create([
            'task_id' => $task_id ,
            'activity' => $text ,
            'user_id' => $user_id
        ]);

    }

    public function checkPiority($id)
    {
        if($id == 1)
        {
            return "Top";
        }elseif($id == 2){
            return "High";

        }elseif($id == 3){
            return "Medium";
        }else{
            return "Low";
        }
    }

}
