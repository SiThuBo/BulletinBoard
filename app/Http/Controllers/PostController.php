<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Contracts\Services\Post\PostServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostsImport;
use App\Exports\PostsExport;

class PostController extends Controller
{

    private $postService;

    public function __construct(PostServiceInterface $post)
    {

        $this->postService = $post;
    }
   
    public function index()
    {
        // var_dump("index");
        $auth_id = auth()->user()->id;
        $user_type = auth()->user()->type;
        $posts = $this->postService->getPost($auth_id, $user_type);
        return view('posts.postList')->with('posts', $posts);
       
    }

    public function postdetail($id)
    {
        $post = $this->postService->getPostdetail($id);
        return view('posts.postdetail')->with('post', $post);
    }

    public function create(Request $request)
    {   
        // var_dump("create");
        $validate_data = $request->validate([
            "title" => "required",
            "description" => "required",
        ]);
        return view('posts.create_confirm')->with("posts", $validate_data);
    }

    public function store(Request $request)
    {
        $auth_id = auth()->user()->id;
        // var_dump( $auth_id);
        $new_post =new Post;
        $new_post->title = $request['title'];
        $new_post->description = $request['description'];
        $post = $this->postService->store($auth_id, $new_post);
        return redirect('/posts');
    }

    public function show($id)
    {
        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = $this->postService->edit($id);
        if (auth()->user()->type == 0) {
            return view("posts.update_post", compact('post'));
        } elseif (auth()->user()->type == 1 && auth()->user()->id == $post->created_user_id) {
            return view("posts.update_post", compact('post'));
        } else
        return redirect('/posts')->with('error', 'Posted User is not allowed!');
    }

    public function update(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'post_status'=>'required'
        ]);

        $post_update = new Post;
        $post_update->id = $request->get('id');
        $post_update->title = $request->get('title');
        $post_update->description = $request->get('description');
        $post_update->post_status = $request->get('post_status');
        $this->postService->update($post_update);
        return redirect()->route("posts.index");
    }

    // public function update_confirm(Request $request)
    // {   
    //     $post_id =  $request['id'];
    //     $validate_post = $request->validate([
    //         "title" => "required|min:4|max:255|unique:posts",
    //         "description" => "required|min:3|max:255",
    //         "post_status" => "",
    //     ]);
    //     return view('posts.update_confirm')->with("posts", $validate_post)->with("post_id", $post_id);
    // }

    public function destroy($id)
    {
        $auth_id = auth()->user()->id;
        $this->postService->delete($id, $auth_id);
        return redirect()->route("posts.index");
    }

    public function search(Request $request)
    {
        $auth_id = auth()->user()->id;
        $user_type = auth()->user()->type;
        $data = $request->get('search_key');
        $posts = $this->postService->searchPost($data, $auth_id, $user_type);
        // var_dump($posts);
        return view('posts.postList')->with('posts', $posts);
    }
    public function fileImport(Request $request) 
    {
        Excel::import(new PostsImport, $request->file('file')->store('temp'));
        return redirect()->route("posts.index");
    }

    public function fileExport() 
    {
        return Excel::download(new PostsExport, 'posts-collection.xlsx');
    }    
  
}
