@extends('layouts.app')
  
@section('content')
   
<form action="{{ route('posts.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="container">
        
    <div class="row justify-content-center">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Title:</strong>
                <input id="title" type="title" class="form-control" name="title"
                value="{{$posts['title']}}" readonly>
            </div>
        </div>
     </div>
     <div class="row justify-content-center">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea id="description" class="form-control" name="description" style="height:200px;resize:none;"
                readonly>{{$posts['description']}}</textarea>
            </div>
        </div>
     </div>
    <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                {{-- <a href="{{ URL::previous() }}" class="btn btn-warning">Back</a> --}}
                <a href="javascript:history.back()" class="btn btn-warning">Back</a>
            </div>
        </div>
   
</form>
@endsection  