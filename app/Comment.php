<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
class Comment extends Model
{
    protected $fillable = ['task_id', 'user_id', 'comment'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


