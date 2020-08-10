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
        return $this->postDao->getPost($auth_id, $user_type);
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
}