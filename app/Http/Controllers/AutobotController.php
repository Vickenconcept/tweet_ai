<?php

namespace App\Http\Controllers;

use App\Models\Autobot;
use App\Models\Comment;
use App\Models\Post;
use App\Services\AutobotService;
use Illuminate\Http\Request;

class AutobotController extends Controller
{
    protected $autobotService;

    public function __construct(AutobotService $autobotService)
    {
        $this->autobotService = $autobotService;
    }

    public function createAutobotsManually()
    {
        $this->autobotService->createAutobots(500);

        return response()->json(['message' => '500 Autobots created successfully!']);
    }

    public function index()
    {
        return Autobot::paginate(10);
    }

    public function showPosts($id)
    {
        return Post::where('autobot_id', $id)->paginate(10);
    }

    public function showComments($postId)
    {
        return Comment::where('post_id', $postId)->paginate(10);
    }
}
