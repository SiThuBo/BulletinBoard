<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    // getting Post list

    public function getPost($auth_id, $user_type)
    {
        if ($user_type == 1) {
            $posts = Post::where([['post_status', '1'], ['posts.created_user_id', $auth_id]])
                    ->leftjoin('users', 'users.id', '=', 'posts.created_user_id')
                    ->select('posts.*', 'users.name')
                    ->orderBy('created_at')
                    ->paginate(10);
        } elseif ($user_type == 0) {
            $posts = Post::where('post_status', '1')
                    ->join('users', 'users.id', '=', 'posts.created_user_id')
                    ->select('posts.*', 'users.name')
                    ->orderBy('created_at')
                    ->paginate(10);
            // ->paginate(10);
        }
        return $posts;
    }

    public function  getPostdetail($id)
    {
        $post = Post::where('posts.id', $id)
                ->join('users', 'users.id', '=', 'posts.created_user_id')
                ->select('posts.*', 'users.name')
                ->get();
        return $post;
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
    
    public function delete($id, $auth_id)
    {
        $post = Post::find($id);
        $post->post_status = '0';
        $post->deleted_user_id = $auth_id;
        $post->deleted_at = now();
        $post->save();
        return $post;
    }

    public function searchPost($data, $auth_id, $user_type)
    {
        if ($user_type == 1) {
            $posts = Post::where([['post_status', '1'], ['posts.created_user_id', $auth_id]])
                        ->join('users', 'users.id', '=', 'posts.created_user_id')
                        ->select('posts.*', 'users.name')
                        ->where('title', 'like', '%' . $data . '%')
                        ->orWhere('description', 'like', '%' . $data . '%')
                        ->orWhere('users.name', 'like', '%' . $data . '%')
                        ->orderBy('created_at')
                        ->paginate(10);
        } elseif ($user_type == 0) {
            $posts = Post::where('post_status', '1')
                        ->join('users', 'users.id', '=', 'posts.created_user_id')
                        ->select('posts.*', 'users.name')
                        ->where('users.name', 'like', '%' . $data . '%')
                        ->orWhere('description', 'like', '%' . $data . '%')
                        ->orWhere('title', 'like', '%' . $data . '%')
                        ->orderBy('created_at')
                        ->paginate(10);
        }
        return $posts;
    }
}