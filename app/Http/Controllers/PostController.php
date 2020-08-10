<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

use App\Contracts\Services\Post\PostServiceInterface;

use App\Services\Post\PostService;
use Illuminate\Http\Request;


class PostController extends Controller
{

    private $postService;

    public function __construct(PostServiceInterface $post)
    {

        $this->postService = $post;
    }
   
    public function index()
    {
        var_dump("index");
        $auth_id = auth()->user()->id;
        $user_type = auth()->user()->type;
        $posts = $this->postService->getPost($auth_id, $user_type);
        return view('posts.postList')->with('posts', $posts);
       
    }

    public function create(Request $request)
    {   
        var_dump("create");
        $validate_data = $request->validate([
            "title" => "required",
            "description" => "required",
        ]);
        return view('posts.create_confirm')->with("posts", $validate_data);
    }

    public function create_confirm(Request $request)
    {
        var_dump("create_confirm");
        $validate_data = $request->validate([
            "title" => "required",
            "description" => "required",
        ]);
        return view('posts.create_confirm')->with("posts", $validate_data);
    }

    public function store(Request $request)
    {
        $auth_id = auth()->user()->id;
        var_dump( $auth_id);
        $new_post =new Post;
        $new_post->title = $request['title'];
        $new_post->description = $request['description'];
        $post = $this->postService->store($auth_id, $new_post);
        return redirect('/posts');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        var_dump("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postService->edit($id);
        if (auth()->user()->type == 0) {
            return view("posts.update_post")->with('post', $post);
        } elseif (auth()->user()->type == 1 && auth()->user()->id == $post->created_user_id) {
            return view("posts.update_post")->with('post', $post);
        } else
        return redirect('/posts')->with('success', 'Posted User is no allowed!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post_update = new Post;
        $post_update->id = $id;
        $post_update->title = $request['title'];
        $post_update->description = $request['description'];
        $post_update->post_status = $request['post_status'];
        $post = $this->postService->update($post_update);
        return redirect()->route("posts.index");
      
    }

    public function update_confirm(Request $request)
    {   
        $post_id =  $request['id'];
        $validate_post = $request->validate([
            "title" => "required|min:4|max:255|unique:posts",
            "description" => "required|min:3|max:255",
            "post_status" => "",
        ]);
        return view('posts.update_confirm')->with("posts", $validate_post)->with("post_id", $post_id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        var_dump("destroy");
    }
 
    // public function index()
    // {
    //     $user_type = auth()->user()->type;
    //     if ($user_type == 0)
    //     {
    //         $auth_id = auth()->user()->id;
    //         $posts = Post::all();
    //         $users = User::find($auth_id);
    //         return view('posts.postList')->with(array("users" => $users, "posts" => $posts));
            
    //     } else{
    //         $auth_id = auth()->user()->id;
    //         $posts = Post::where('created_user_id', $auth_id )->get();
    //         $users = User::find($auth_id);
    //         return view('posts.postList')->with(array("users" => $users, "posts" => $posts));
    //     }
      
    // }

    // public function create(Request $request)
    // {
    //     $validate_data = $request->validate([
    //         "post_title" => "required|min:4|max:255|unique:posts",
    //         "post_description" => "required|min:3|max:255",
    //     ]);
    //     return view('posts.create_confirm')->with("posts", $validate_data);
    // }


    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $auth_id = auth()->user()->id;
    //     $post = new Post([
    //         'updated_user_id' => $auth_id,
    //         'post_title' => $request->get('post_title'),
    //         'post_description' => $request->get('post_description'),
    //         'post_status' => 1,
    //         'created_user_id' => $auth_id,
    //         'deleted_user_id' => $auth_id,

    //     ]);
    //     $post->save();
    //     return redirect()->route('posts.index')
    //                     ->with('success','Post created successfully.');

    // }

  
}
