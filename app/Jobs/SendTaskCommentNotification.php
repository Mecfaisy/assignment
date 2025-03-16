<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTaskCommentNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user, $task;

    public function __construct($user, $task)
    {
        $this->user = $user;
        $this->task = $task;
    }

    public function handle()
    {
        Mail::to($this->user->email)->send(new TaskCommentMail($this->task));
    }
}
