<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
   //get post list
   public function getPost($auth_id, $user_type);

   public function store($auth_id, $new_post);
   
   public function edit($id);

   public function update($new_post);

}