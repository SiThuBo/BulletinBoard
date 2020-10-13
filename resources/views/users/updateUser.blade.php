@extends('layouts.app')
@section('content')

<div class="container">
@foreach ($user as $user)
<form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @csrf
    <input type="text" name="id" value="{{$user->id}}" hidden>
    <div class="d-flex justify-content-around">
        <h4 class="col-sm-9">Update User</h4>
        <div class="card" style="width: 20%;">
            <div class="card-body form-group">
                <img class="img-fluid" src="{{asset('upload/' .$user['profile'])}}" alt="">
                <input type="text" name="profile" value="{{$user->profile}}" hidden>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <strong>Name:</strong>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 form-group">
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <strong>Email Address:</strong>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 form-group">
            <input type="email" name="email" class="form-control" value="{{$user->email}}">
        </div>
        
    </div>

    @if(auth()->user()->type==0)   
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <strong>Type:</strong>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 form-group">         
            <select name="type" id="type" class="form-control">
                <option value="">Select</option>
                <option value="0" @if($user->type == 0 ) selected @endif>Admin</option>
                <option value="1" @if($user->type == 1 ) selected @endif>User</option>
            </select>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <strong>Phone:</strong>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 form-group">
            <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <strong>Date of Birth:</strong>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 form-group">
            <input type="date" name="dob" class="form-control" value="{{$user->dob}}">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <strong>Address:</strong>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 form-group">
            <textarea class="form-control" name="address" style="height:150px;resize:none;">{{$user['address']}}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <strong>Profile:</strong>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 form-group">
            <input type="file" name="new_profile">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2">
            <a href="/users/changePassword">Change Password</a>
        </div>
    </div>

    <div class="row col-md-6 offset-md-3">
        <div class="col-xs-2 col-sm-2 col-md-2 mr-5 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 text-center">
            <button type="reset" class="btn btn-primary">Clear</button>
        </div>
    </div>
</form>
@endforeach
</div>
@endsection