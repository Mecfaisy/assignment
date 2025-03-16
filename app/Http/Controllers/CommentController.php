<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Task;
use App\User;
use App\Http\Controllers\TaskController;
use App\Notifications\SendTaskCommentNotification;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request, Task $task)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = $task->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $validated['comment'],
        ]);

       // $user = User::findOrFail($request->user_id); // Fetch user to notify
        //$user->notify(new SendTaskCommentNotification($request->comment));

        return response()->json($comment, 201);
    }
    public function getTaskComments($task_id)
    {
        $task = Task::with('comments')->find($task_id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json([
            'task' => $task->title,
            'comments' => $task->comments
        ]);
    }
    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}

