<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
class Task extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'status', 'due_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

