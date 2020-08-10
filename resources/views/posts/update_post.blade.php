@extends('layouts.app')
  
@section('content')

<div class="container">
    <fieldset>
        <legend>Update Post</legend>

        <form action="{{ route('posts.update_confirm') }}" method="POST">
            {{ csrf_field() }}
            <div class="container">
            <input type="text" name="id" value="{{$post->id}}" hidden>
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input id="title" type="title" class="form-control" name="title" value=" {{ $post->title }}">
                    </div>
                </div>
             </div>
             <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea id="description" class="form-control" name="description" style="height:200px;resize:none;">{{$post->description}}</textarea>
                    </div>
                </div>
             </div>
             <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <input id="post_status" type="post_status" class="form-control" name="post_status"
                        value=" {{ $post->post_status }}">
                    </div>
                </div>
             </div>
            <div class="row justify-content-center">
                    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                        {{-- <a href="{{ URL::previous() }}" class="btn btn-warning">Back</a> --}}
                        <a href="javascript:history.back()" class="btn btn-warning">Back</a>
                    </div>
                </div>
           
        </form>
        
    </fieldset> 
</div>

@endsection