<?php

namespace App\Services;

use App\Models\Autobot;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;

class AutobotService
{
    public function createAutobots(int $count = 500)
    {
        for ($i = 0; $i < $count; $i++) {
            $userData = $this->generateUserData();

            $autobot = Autobot::create([
                'name' => $userData['name'],
                'username' => $userData['username'],
                'email' => $userData['email'],
            ]);

            $this->createPostsForAutobot($autobot, 10);
        }
    }

    private function generateUserData()
    {
        $userResponse = Http::get('https://jsonplaceholder.typicode.com/users/' . rand(1, 10));
        return $userResponse->json();
    }

    private function createPostsForAutobot(Autobot $autobot, int $count = 10)
    {
        for ($j = 0; $j < $count; $j++) {
            $postData = $this->generatePostData();

            $post = $autobot->posts()->create([
                'title' => $postData['title'] . " " . uniqid(),
                'body' => $postData['body'],
            ]);

            $this->createCommentsForPost($post, 10);
        }
    }

    private function generatePostData()
    {
        $postResponse = Http::get('https://jsonplaceholder.typicode.com/posts/' . rand(1, 100));
        return $postResponse->json();
    }

    private function createCommentsForPost(Post $post, int $count = 10)
    {
        for ($k = 0; $k < $count; $k++) {
            $commentData = $this->generateCommentData();

            $post->comments()->create([
                'name' => $commentData['name'],
                'email' => $commentData['email'],
                'body' => $commentData['body'],
            ]);
        }
    }

    private function generateCommentData()
    {
        $commentResponse = Http::get('https://jsonplaceholder.typicode.com/comments/' . rand(1, 500));
        return $commentResponse->json();
    }
}
