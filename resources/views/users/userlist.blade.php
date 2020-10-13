@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="title">
            <h3>User List</h3>
        </div>
    </div>
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-pressed="true" aria-label="Toolbar with button groups">
        <form action="/users/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group row">
            <div class="col-2 col-md-2 col-sm-2">
              <input type="text" class="form-control " name="search_name" placeholder="Name">
            </div>
            <div class="col-2 col-md-2 col-sm-2">
              <input type="text" class="form-control " name="search_email" placeholder="Email">
            </div>
            <div class="col-3 col-md-3 col-sm-3">
              <input type="date" class="form-control" name="search_from" placeholder="Created From">
            </div>
            <div class="col-3 col-md-3 col-sm-3">
              <input type="date" class="form-control" name="search_to" placeholder="Created To">
            </div>
            <span class="input-group-btn col-2 col-md-2 col-sm-2">
              <button type="submit" class="btn btn-primary w-50">
                <span class="glyphicon glyphicon-search ">Search</span>
              </button>
            </span>
          </div>
        </form>
        <div class="btn-group ml-4" role="group" aria-label="btngroup" aria-pressed="true">
          <a href="/users/createUser" title="user create">
            <button class="btn btn-outline-primary my-2 " style="width:92px">Add</button>
          </a>
        </div>
    </div>

    <div class="table-responsive text-nowrap table-scroll">
    <table class="table table-striped main-table">
      <thead>
        <tr>
          <th>Name</th>
          <th colspan="2">Email</th>
          <th>Created User Name</th>
          <th>Phone</th>
          <th>Birth Date</th>
          <th>Address</th>
          <th>Created date</th>
          <th>Updated date</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($users as $user)
        <tr>
        <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
        <td colspan="2">{{$user->email}}</td>
        <td>{{$user->created_user_name}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->dob}}</td>
        <td>{{$user->address}}</td>
        <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
        <td>{{ date('d/m/Y', strtotime($user->updated_at)) }}</td>
        <td>
          <form action="{{ route('users.destroy', $user->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?');">Delete</button>
          </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {!! $users->links() !!}
    </div>
</div>
@endsection