@extends('layouts.app')

@section('content')
<div class="container post_detail">
<br>
    <div class="card" style="width: 90%;">
        <div class="card-body">
                @foreach ($user as $u)
                <div class="row drow">
                        <h5 class="card-title col-lg-3 col-md-3 col-sm-3">User Profile</h5>
                        <div class="col-5">
                                <form action="{{ route('users.edit', $u->id) }}">
                                        @csrf
                                        <button class="btn btn-secondary btn-sm" type="submit">Edit</button>
                                </form>
                        </div>
                </div>
                    <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 detail">
                                    <div class="card" style="width: 30%;">
                                        <div class="card-body form-group">
                                            <img class="img-fluid" src="{{asset('upload/' .$u['profile'])}}" alt="">
                                        </div>
                                    </div>
                                    <div class="row drow">
                                            <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Name</label>
                                            <span class="col-lg-5 col-md-5 col-sm-5">{{$u["name"]}}</span>
                                    </div>   
                                    <div class="row drow">
                                            <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Email</label>
                                            <span class="col-lg-5 col-md-5 col-sm-5">{{$u->email}}</span>
                                    </div> 
                                    <div class="row drow">
                                            <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Type</label>
                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                @if($u['type']== 0) 
                                                       <span>Admin</span>
                                                @else
                                                        <span>User</span>
                                                @endif 
                                             </div>
                                    </div> 
                                    <div class="row drow">
                                            <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Phone</label>
                                            <span class="col-lg-5 col-md-5 col-sm-5">{{$u['phone']}}</span>
                                    </div> 
                                    <div class="row drow">
                                            <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Date of Birth</label>
                                            <span class="col-lg-5 col-md-5 col-sm-5">{{date('d/m/Y', strtotime($u['dob']))}}</span>
                                    </div>
                                    <div class="row drow">
                                            <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Address</label>
                                            <span class="col-lg-5 col-md-5 col-sm-5">{{$u['address']}}</span>
                                    </div>                
                                    @endforeach
                            </div>
                    </div>
            </div> 
    </div>
       
</div>
@endsection