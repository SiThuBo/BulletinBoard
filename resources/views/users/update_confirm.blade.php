@extends('layouts.app')
  
@section('content')
@foreach ($users as $user)
<form action="{{ route('users.update') }}" method="POST">
    @method('PATCH') 
    
    {{ csrf_field() }}
    <div class="container">
        <div class="d-flex justify-content-around">
            <h4 class="col-sm-9">Create User Confirmation</h4>
            <div class="card" style="width: 20%;">
                <div class="card-body form-group">
                    <img class="img-fluid" src="{{asset('upload/' .$users['profile'])}}" alt="">
                    <input type="text" name="profile" value="{{$user->profile}}" hidden>
                </div>
            </div>
        </div>
        <input type="text" name="id" value="{{$user->id}}" hidden>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" class="form-control" name="name" value="{{$users['name']}}" readonly>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Email Address:</strong>
                <input type="text" class="form-control" name="email" value="{{$users['email']}}" readonly>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" class="form-control" name="password" value="{{$users['password']}}" readonly>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Type:</strong>
                    <input type="text" class="form-control" name="type" value="@if($users['type'] == '0')Admin @else User @endif " readonly>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" class="form-control" name="phone" value="{{$users['phone']}}" readonly>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Date of Birth:</strong>
                <input type="text" class="form-control" name="dob" value="{{$users['dob']}}" readonly>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea class="form-control" name="address" style="height:200px;resize:none;"
                readonly>{{$users['address']}}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                <a href="javascript:history.back()" class="btn btn-warning">Back</a>
            </div>
        </div>
   
</form>
@endforeach
@endsection