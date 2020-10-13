<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
   //get post list
   public function getPost($auth_id, $user_type);

   public function  getPostdetail($id);

   public function store($auth_id, $new_post);
   
   public function edit($id);

   public function update($new_post);

   public function delete($id, $auth_id);

   public function searchPost($data, $auth_id, $user_type);

}