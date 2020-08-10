@extends('layouts.app')
  
@section('content')

<div class="container">

    <fieldset>
        <legend>Create Post</legend>
            
        <form action="{{ route('posts.create') }}" method="POST">
            {{ csrf_field() }}
            <div class="container">
                
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <strong>Title:</strong>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <strong>Description:</strong>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                    <textarea type="text" class="form-control" name="description" placeholder="Description"> </textarea>
                </div>
                
            </div>

            <div class="row col-md-6 offset-md-3">
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <button type="reset" class="btn btn-primary">Clear</button>
                </div>
            </div>
            
        
        </form>
    </fieldset>
</div>
@endsection  