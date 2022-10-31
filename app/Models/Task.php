<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class , 'created_by');
    }

    public function activities()
    {

        return $this->hasMany(ActivityLog::class ,  'task_id');
    }

}
