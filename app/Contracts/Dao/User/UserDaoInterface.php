<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
 
   public function getUser();

   public function getDetail($id);

   public function store_user($auth_id, $request);

   public function searchUser($search_name, $search_email, $search_from, $search_to, $user_type);
   
   public function update_user($new_user);

   public function savePassword($password);
}