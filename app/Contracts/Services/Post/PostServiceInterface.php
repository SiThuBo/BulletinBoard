<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    public function getPost($auth_id, $user_type);

    public function store($auth_id, $new_post);

    public function edit($id);

    public function update($new_post);

   
}
