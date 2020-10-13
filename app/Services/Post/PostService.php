<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;

    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }
 
    public function getPost($auth_id, $user_type)
    {
        $post = $this->postDao->getPost($auth_id, $user_type);
        return $post;
    }

    public function  getPostdetail($id)
    {
        $post = $this->postDao-> getPostdetail($id);
        return $post;
    }
   
    public function store($auth_id, $new_post)
    {
        return $this->postDao->store($auth_id, $new_post);
    }

    public function edit($id)
    {
        return $this->postDao->edit($id);
    }

    public function update($new_post)
    {
        return $this->postDao->update($new_post);
    }

    public function delete($id, $auth_id)
    {
        return $this->postDao->delete($id, $auth_id);
    }

    public function searchPost($data, $auth_id, $user_type)
    {
        return $this->postDao->searchPost($data, $auth_id, $user_type);
    }

}