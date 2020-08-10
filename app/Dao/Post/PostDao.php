<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use App\Models\User;

class PostDao implements PostDaoInterface
{
    // getting Post list

    public function getPost($auth_id, $user_type)
    {
        if ($user_type == 1) {
            $posts = Post::where('created_user_id', $auth_id )->get();

        } elseif ($user_type == 0) {
            $posts = Post::paginate(10);
        }
        return $posts;
    }
    
    public function store($auth_id, $new_post)
    {
        $post = Post::create([
            'title' => $new_post['title'],
            'description' => $new_post['description'],
            'created_user_id' => $auth_id,
            'updated_user_id' => $auth_id,
            'created_at' => now(),
        ]);
        $post->save();
        return $post;
    }
    
    public function edit($id)
    {
       $post = Post::find($id);
       return $post;
    }

    public function update($new_post)
    {
        $post = Post::find($new_post['id']);
        $post->title = $new_post['title'];
        $post->description = $new_post['description'];
        $post->post_status = $new_post['post_status'];
        $post->updated_user_id = auth()->user()->id;
        $post->updated_at = now();
        $post->save();
        return $post;
    }
}
     
    