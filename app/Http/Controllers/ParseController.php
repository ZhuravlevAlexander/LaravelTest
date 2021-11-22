<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Support\Facades\Http;

class ParseController extends Controller
{
    public function getAllData()
    {
        $data = collect(
            Http::get(
                'https://jsonplaceholder.typicode.com/posts'
            )->json()
        );

        $comments = collect(
            Http::get(
                'https://jsonplaceholder.typicode.com/comments'
            )->json()
        );

        foreach ($data as $post) {
            if (isset($post['title'])) {
                $this->createPosts($post);
            }

        }

        foreach ($comments as $comment) {
            if (isset($comment['id'])) {
                $this->createComments($comment);
            }
        }

        return response()->json("ok");
    }

    public function createPosts($postData)
    {
        Posts::updateOrCreate([
            'title' => $postData['title'],
            'body' => $postData['body'],
            'user_id' => $postData['userId']
        ]);

    }

    public function createComments($commentData)
    {
        Comments::updateOrCreate([
            'post_id' => $commentData['postId'],
            'name' => $commentData['name'],
            'email' => $commentData['email'],
            'body' => $commentData['body'],
        ]);
    }
}
