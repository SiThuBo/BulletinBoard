@extends('layouts.app')
  
@section('content')

<div class="container">
    <h4>Create User</h4>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif  
    <form action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container">
            
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Name:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input type="text" name="name" class="form-control" placeholder="Nmae">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Email Address:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Password:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Confirm Password:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Type:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <select name="type" id="type" class="form-control">
                    <option value="">Select</option>
                    <option value="0">Admin</option>
                    <option value="1">User</option>
                  </select>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Phone:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Date of Birth:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input type="date" name="dob" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Address:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <textarea type="text" class="form-control" name="address" placeholder="Address"> </textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Profile:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input type="file" name="profile">
            </div>
        </div>

        <div class="row col-md-6 offset-md-3">
            <div class="col-xs-2 col-sm-2 col-md-2 mr-5 text-center">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                <button type="reset" class="btn btn-primary">Clear</button>
            </div>
        </div>
        
    </form>
   
</div>
@endsection  