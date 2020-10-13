@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="title">
            <h3>Post List</h3>
        </div>
    </div>
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-pressed="true" aria-label="Toolbar with button groups">
        <form action="/posts/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group row">
            <input type="text" class="form-control col-8 col-md-8 col-sm-8 ml-3" name="search_key" placeholder="Search Post">
            <span class="input-group-btn col-4 col-md-4 col-sm-4">
              <button type="submit" class="btn btn-primary w-100">
                <span class="glyphicon glyphicon-search ">Search</span>
              </button>
            </span>
          </div>
        </form>
        <div class="btn-group ml-4" role="group" aria-label="btngroup" aria-pressed="true">
          <a href="/posts/createPost" title="post create">
            <button class="btn btn-outline-primary my-2 " style="width:92px">Add</button>
          </a>
          <a href="/posts/uploadCSV" title="upload post">
            <button class="btn btn-outline-primary my-2 " style="width:92px">Upload</button>
          </a>
          <a class="btn btn-outline-primary my-2 " style="width:92px" href="{{ route('file-export') }}">Download</a>
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
        <td><a href="{{ route('posts.postdetail', $post->id) }}" method="get">{{ $post->title }}</a></td>
        {{-- <td><a href={{ url('/posts/postdetail/'.$post) }} title="post create"> {{ $post->title }} </a></td> --}}
        <td colspan="3">{{ $post->description }}</td>
        <td>{{ $post->name }}</td>
        <td>{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
        <td>
            <form action="{{ route('posts.edit', $post->id) }}">
              @csrf
              <button class="btn btn-secondary btn-sm" type="submit">Edit</button>
            </form>
        </td>
        <td>
          <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?');">Delete</button>
          </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {!! $posts->links() !!}
    </div>
</div>
@endsection