@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="title">
            <h2>Post List</h2>
        </div>
    </div>
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-pressed="true" aria-label="Toolbar with button groups">
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group row">
                <input type="text" class="form-control col_8" name="search_key" placeholder="Search Posts">                     
                <div class="col_2">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search ">Search</span>
                    </button>   
                </div>
            </div>
        </form>
        <div class="btn-group ml-4" role="group" aria-label="btngroup" aria-pressed="true">
            <a href="/posts/createPost" title="post create">
                <button class="btn btn-outline-primary my-2 " style="width:92px">Add</button>
            </a>
            <button class="btn btn-outline-primary my-2 " style="width:92px">Upload</button>
            <button class="btn btn-outline-primary my-2 " style="width:92px">Download</button>
        </div>
    </div>

    <div class="table-responsive text-nowrap table-scroll">
    <table class="table table-striped main-table">
      <thead>
        <tr>
          <th>Post Title</th>
          <th colspan="3">Post Description</th>
          <th>Posted User</th>
          <th>Posted Date</th>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($posts as $post)
        <tr>
        <td>{{ $post->title }}</td>
        <td colspan="3">{{ $post->description }}</td>
        <td>{{ $post->created_user_id }}</td>
        <td>{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
        {{-- <td><a class="btn btn-primary" href="{{ route('user.edit',$users->id) }}">Edit</a></td> --}}
        <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-sm">Edit</a></td>
        <td> <a href=''>Delete</a></td>
        
        </tr>
        @endforeach
      </tbody>
</div>
@endsection