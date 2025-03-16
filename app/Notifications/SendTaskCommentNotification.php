<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendTaskCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new comment has been added to your task.')
            ->line('Comment: ' . $this->comment)
            ->action('View Task', url('/tasks'))
            ->line('Thank you for using our application!');
    }
}
