<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private $userDao;

    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }
 
    public function getUser()
    {
        $users = $this->userDao->getUser();
        return $users;
    }
    
    public function getDetail($id)
    {
        $user = $this->userDao->getDetail($id);
        return $user;
    }

    public function searchUser($search_name, $search_email, $search_from, $search_to, $user_type)
    {
        $users = $this->userDao->searchUser($search_name, $search_email, $search_from, $search_to, $user_type);
        return $users;
    }
    
    public function store_user($auth_id, $request)
    {
        $user = $this->userDao->store_user($auth_id, $request);
        return $user;
    }

    public function update_user($new_user)
    {
       $this->userDao->update_user($new_user);
    }

    public function savePassword($password)
    {
        $this->userDao->savePassword($password);
    }

}