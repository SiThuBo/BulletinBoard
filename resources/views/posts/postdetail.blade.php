@extends('layouts.app')

@section('content')
<div class="container post_detail">
<br>
        <div class="card" style="width: 90%;">
                <div class="card-body">
                        <h5 class="card-title">Post Details</h5>
                        <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 detail">
                                        @foreach ($post as $p)
                        
                                        <div class="row drow">
                                                <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Title</label>
                                                <span class="col-lg-5 col-md-5 col-sm-5">{{$p["title"]}}</span>
                                        </div>   
                                        <div class="row drow">
                                                <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Description</label>
                                                <span class="col-lg-5 col-md-5 col-sm-5">{{$p->description}}</span>
                                        </div> 
                                        <div class="row drow">
                                                <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Status</label>
                                                <span class="col-lg-5 col-md-5 col-sm-5">{{$p['post_status']}}</span>
                                        </div> 
                                        <div class="row drow">
                                                <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Created At</label>
                                                <span class="col-lg-5 col-md-5 col-sm-5">{{date('d/m/Y', strtotime($p['created_at']))}}</span>
                                        </div> 
                                        <div class="row drow">
                                                <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Created User</label>
                                                <span class="col-lg-5 col-md-5 col-sm-5">{{$p['name']}}</span>
                                        </div> 
                                        <div class="row drow">
                                                <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Last Updated at</label>
                                                <span class="col-lg-5 col-md-5 col-sm-5">{{date('d/m/Y', strtotime($p['updated_at']))}}</span>
                                        </div>

                                        <div class="row drow">
                                                <label class="col-lg-3 col-md-3 col-sm-3 font-weight-bold">Updated User</label>
                                                <span class="col-lg-5 col-md-5 col-sm-5">{{$p['name']}}</span>
                                        </div>                
                                        @endforeach
                                </div>

                        </div>
                </div>
        </div>
       
</div>
@endsection