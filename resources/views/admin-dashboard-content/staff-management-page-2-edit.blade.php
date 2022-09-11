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

        <h3 class="panel-title" style="text-align:center;">Edit staffs</h3>
        <br>

        <form action="/update-staff-data" method="POST">

          {{ csrf_field() }}

          <div class="form-row">

            <div class="col-md-4 mb-3">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" value="{{$staff[0]->firstname}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="{{$staff[0]->lastname}}" required>
            </div>

          

            <div class="col-md-4 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$staff[0]->email}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="phone_number">Phone Number</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="{{$staff[0]->phone_number}}" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="position">Position</label>
              <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position/Role" value="{{$staff[0]->position}}" required>
            </div>

          </div>

          <input type="hidden" name="id" value="{{$staff[0]->id}}" />

          <input class="btn btn-lg btn-primary float-right" value="Update" type="submit">

        </form>

      </div>
</div>

@endsection


