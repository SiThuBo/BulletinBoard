<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
    public function getUser()
    {      
        $users = User::where('users.deleted_user_id', NULL)
            -> select('users.name',
            'users.email',
            'users.phone',
            'users.dob', 
            'users.address',
            'users.created_at',
            'users.updated_at',
            'users.id',
            'joined_user.name as created_user_name')
            ->leftjoin('users as joined_user', 'joined_user.id', 'users.created_user_id')
            ->orderBy('users.updated_at')
            ->paginate(10);
        return $users;
    }

    public function getDetail($id)
    {
        $user = User::where('id', $id)->get();
        return $user;
    }

    public function store_user($auth_id, $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request->get('password')),
            'type' => $request['type'],
            'phone' => $request['phone'],
            'dob' => $request['dob'],
            'address' => $request['address'],
            'profile' => $request['profile'],
            'created_user_id' => $auth_id,
            'updated_user_id' => $auth_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user->save();
        return $user;
    }

    public function searchUser($search_name, $search_email, $search_from, $search_to, $user_type)
    {
        $users = User::when($search_name, function ($query) use ($search_name) {
                $query->where('name', 'like', '%' . $search_name . '%');
                })
                    ->when($search_email, function ($query) use ($search_email) {
                        $query->orWhere('email', 'like', '%' . $search_email . '%');
                    })
                        ->when($search_from, function ($query) use ($search_from) {
                            $query->orWhere('created_at', '>=', $search_from);
                        })
                            ->when($search_to, function ($query) use ($search_to) {
                                $query->where('created_at', '<=', $search_to);
                            })->paginate(10);
    return $users;
    }

    public function update_user($new_user)
    {
        $user = User::find($new_user['id']);
        $user->name = $new_user['name'];
        $user->email = $new_user['email'];
        $user->type = $new_user['type'];
        $user->phone = $new_user['phone'];
        $user->dob = $new_user['dob'];
        $user->address = $new_user['address'];
        $user->profile = $new_user['profile'];
        $user->updated_user_id = auth()->user()->id;
        $user->updated_at = now();
        $user->save();
        return $user;
    }

    public function savePassword($password)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->password = Hash::make($password);
        $user->updated_user_id = $id;
        $user->updated_at = now();
        $user->save();
    }
   
}