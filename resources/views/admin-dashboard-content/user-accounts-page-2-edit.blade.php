@extends('admin-dashboard-layout.dashboard-template')

@section('admin-content-page')

@if($errors->any())
  @foreach ($errors->all() as $error)
      <div id="errorBox" style="text-align:center;margin-top:20px;" class="alert alert-danger col-md-12 alert-dismissible fade show" role="alert">
          <strong style="color:white;">{!!$error!!}</strong>
          <button type="button" style="color:white;" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:white;" >&times;</span>
          </button>
      </div>

     

  @endforeach
@endif


@if(session()->has('message'))

    <div id="successBox" style="text-align:center;margin-top:20px;" class="alert alert-success col-md-12 alert-dismissible fade show" role="alert">
                <strong> {{ session()->get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
    </div>

 

@endif

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">Change Username</h3>
      <br>

      <form action="/edit-user-account" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="username" value="{{$user_data[0]->username}}" name="username" placeholder="Username" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="password" value="{{$user_data[0]->password}}" name="password" placeholder="Password" required>
          </div>

        </div>

        <input type="hidden" name="id" value="{{$user_data[0]->id}}">

        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-primary col-md-2 col-sm-12 float-right" value="Update" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

@endsection


