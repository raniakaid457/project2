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
      <h3 class="panel-title" style="text-align:center;">Create User Accounts</h3>
      <br>

      <form action="/insert-user-accounts" method="POST">

        {{ csrf_field() }}

        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">staff ID</label>
          <div class="col-sm-8">
            <select class="form-control" name = "staff_id" id="staff_id" aria-label="Default select example">

              <option selected disabled>Select a staff</option>
              @foreach ($staff as $key => $data)
                <option value="{{$data->staff_id}}">{{$data->staff_id}} ({{$data->firstname}} {{$data->lastname}})</option>
              @endforeach

            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" required>
          </div>
        </div>

        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-primary col-md-2 col-sm-12" value="Create" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

<br>

<div class="card">
      <div class="card-body">

          <table class="table table-bordered table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">staff ID</th>
                  <th scope="col">Username</th>
                  <th scope="col">Password</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($staff_user_data as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{$data->staff_id}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->password}}</td>
                        <td><a class="btn btn-primary" href="/view-edit-user-account/{{$data->id}}">Edit</a> <a class="btn btn-danger confirmation" href="/delete-user-account/{{$data->id}}">Delete</a></td>
                    </tr>

                @endforeach

              </tbody>
          </table>

      </div>
</div>



@endsection


