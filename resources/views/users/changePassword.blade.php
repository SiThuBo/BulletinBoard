@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    <form method="POST" action="{{ route('users.changepassword') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">                
                <strong>Old Password:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input id="password" type="password" class="form-control" name="old_password" >
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>New Password:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input id="password" type="password" class="form-control" name="new_password">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>Confirm Password:</strong>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 form-group">
                <input id="password-confirm" type="password" class="form-control" name="new_confirm_password" >
            </div>
        </div>

        <div class="row col-md-6 offset-md-3">
            <div class="col-xs-2 col-sm-2 col-md-2 mr-5 text-center">
                <button type="submit" class="btn btn-primary">Change</button>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                <button type="reset" class="btn btn-primary">Clear</button>
            </div>
        </div>

    </form>
</div>
@endsection