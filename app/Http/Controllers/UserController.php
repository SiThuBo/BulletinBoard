<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contracts\Services\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    private $userService;

    public function __construct(UserServiceInterface $user)
    {

        $this->userService = $user;
    }
    
    public function index()
    {
        $users = $this->userService->getUser();
        return view('users.userList')->with('users', $users);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => 'required',
            'phone' => 'string',
            'dob' => 'date',
            'address' => 'string',
            'profile' => 'required|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $auth_id = auth()->user()->id;
        $new_user = new User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->password = $request->get('password');
        $new_user->type = $request['type'];
        $new_user->phone = $request['phone'];
        $new_user->dob = $request['dob'];
        $new_user->address = $request['address'];
        $profile_name = $auth_id . '_' . $request->file('profile')->getClientOriginalName();
        $request->file('profile')->storeAs('upload', $profile_name);
        $new_user->profile =  $profile_name;
        return view('users.create_confirm')->with("users", $new_user);
    }

    public function store(Request $request)
    {
        if ($request['type'] == 'Admin') {
            $request['type'] = "0";
        } else {
            $request['type'] = "1";
        }
        $auth_id = auth()->user()->id;
        $this->userService->store_user($auth_id, $request);
        return redirect()->route("users.index");
    }

    public function show($id)
    {
        $user = $this->userService->getDetail($id);
        return view('users.userProfile')->with('user', $user);
    }

    public function edit($id)
    {
        $user = $this->userService->getDetail($id);
        return view('users.updateUser')->with('user', $user);
    }
 
    //update confirm
    // public function confirm_update(Request $request)
    // {
    //         $request->validate([
    //             'name' => ['required', 'string', 'max:255'],
    //             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //             'type' => 'required',
    //             'phone' => 'string',
    //             'dob' => 'date',
    //             'address' => 'string',
    //             'new_profile' => 'mimes:jpg,jpeg,png,gif,svg|max:2048',
    //         ]);

    //     $new_user = new User;
    //     $new_user->id = $request->get('id');
    //     $new_user->name = $request->get('name');
    //     $new_user->email = $request->get('email');
    //     $new_user->password = $request->get('password');
    //     $new_user->type = $request['type'];
    //     $new_user->phone = $request['phone'];
    //     $new_user->dob = $request['dob'];
    //     $new_user->address = $request['address'];
    //     if($request['new_profile'])
    //     {
    //         $profile_name = $request->get('id') . '_' . $request->file('new_profile')->getClientOriginalName();
    //         $request->file('new_profile')->storeAs('upload', $profile_name);
    //         $new_user->profile =  $profile_name;
    //     }else
    //     {
    //         $new_user->profile =  $request['profile'];
    //     }

    //     return view('users.update_confirm')->with("users", $new_user);
    // }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'type' => 'required',
            'phone' => 'string',
            'dob' => 'date',
            'address' => 'string',
            'new_profile' => ['mimes:jpg,jpeg,png,gif,svg|max:2048'],
        ]);

        $new_user = new User;
        $new_user->id = $request->get('id');
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->password = $request->get('password');
        $new_user->type = $request['type'];
        $new_user->phone = $request['phone'];
        $new_user->dob = $request['dob'];
        $new_user->address = $request['address'];
        if($request['new_profile'])
        {
            $profile_name = $request->get('id') . '_' . $request->file('new_profile')->getClientOriginalName();
            $request->file('new_profile')->storeAs('upload', $profile_name);
            $new_user->profile =  $profile_name;
        }else
        {
            $new_user->profile =  $request['profile'];
        }
        $this->userService->update_user($request);
        return redirect()->route("users.index");
    }

    public function destroy($id)
    {
        $auth_id = auth()->user()->id;
        $this->userService->delete($id, $auth_id);
        return redirect()->route("users.index");
    }

    public function search(Request $request)
    {
        $user_type = auth()->user()->type;
        $search_name = $request->get('search_name');
        $search_email = $request->get('search_email');
        $search_from = $request->get('search_from');
        $search_to = $request->get('search_to');
        if ($search_name == NULL && $search_email == NULL && $search_from == NULL && $search_to == NULL) {
            return redirect()->route("users.index");
        } else {
            $users = $this->userService->searchUser($search_name, $search_email, $search_from, $search_to, $user_type);
            return view('users.userlist')->with('users', $users);
        }
    }

    public function changepassword(Request $request)
    {
        $password = auth()->user()->password;
        $request->validate([

            'old_password' => ['required'],

            'new_password' => ['required'],

            'new_confirm_password' => ['required'],

        ]);   

        if ((Hash::check($request->get('old_password'), $password ))){

                $request->validate([    
                    'new_confirm_password' => ['same:new_password'],
                ]);
            
            $this->userService->savePassword($request->new_password);
            return redirect()->route("users.index");
        }
        else
        $request->validate([

            'old_password' => ['same:password'],

        ]);   
    }
}
