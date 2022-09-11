@extends('admin-dashboard-layout.dashboard-template')

@section('admin-content-page')

@if($errors->any())
  @foreach ($errors->all() as $error)
      <div id="errorBox" style="text-align:center;margin-top:20px;" class="alert alert-danger col-md-12 alert-dismissible fade show" role="alert">
          <strong>{!!$error!!}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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

        <h3 class="panel-title" style="text-align:center;">Register staffs</h3>
        <br>

        <form action="/insert-staff-data" method="POST">
          {{ csrf_field() }}
          <div class="form-row">

            <div class="col-md-4 mb-3">
              <label for="staff_id">staff ID</label>
              <input type="text" class="form-control" id="staff_id" name="staff_id" placeholder="Enter staff ID" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required>
            </div>

           

            <div class="col-md-4 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="phone_number">Phone Number</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="position">Position</label>
              <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position/Role" required>
            </div>

          </div>
          <input class="btn btn-lg btn-primary" value="Register" type="submit">
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
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
         
                  <th scope="col">Email</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Position</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($staff as $key => $data)

                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{$data->staff_id}}</td>
                        <td>{{$data->firstname}}</td>
                        <td>{{$data->lastname}}</td>
                   
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone_number}}</td>
                        <td>{{$data->position}}</td>
                        <td><a class="btn btn-primary" href="/view-staff-management-edit/{{$data->id}}">Edit</a> <a class="btn btn-danger confirmation" href="/delete-staff-data/{{$data->id}}">Delete</a></td>
                    </tr>

                @endforeach

              </tbody>
          </table>

      </div>
</div>





@endsection


