@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Upload CSV File</div>
        <div class="card-body">
          <form method="POST" action="{{ route('posts.import') }}" enctype="multipart/form-data"> @csrf <div class="form-group row">
              <div class="col-md-6">
                <input id="profile" type="file" class="form-control mb-3" name="file">
              </div>
            </div>
            <div class="form-group row mb-0 ">
              <div class="col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary mr-3">Import File</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection