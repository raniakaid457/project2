@extends('staff-dashboard-layout.dashboard-template')

@section('dashboard-staff-content')


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
      <h3 class="panel-title" style="text-align:center;">Requesting for leave</h3>
      <br>

      <form action="/insert-leave-data-of-staff-account" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="type_of_leave" class="col-sm-2 col-form-label">reason</label>
          <div class="col-sm-8">
            <select class="form-control" name = "reason" id="reason" aria-label="Default select example" required>
              <option selected disabled>Select a leave type</option>
              <option value="Sick leave">Sick leave</option>
              <option value="travel leave">travel leave</option>
              <option value="personal Leave">personal Leave</option>
             

            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-8">

            <textarea class="form-control" name="description" id="description" placeholder="Enter the description" required></textarea>

          </div>
        </div>

        <div class="form-group row">
          <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave from</label>
          <div class="col-sm-4">
              <input type="date" class="form-control" id="date_of_leave" name="date_of_leave" required>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="date_of_leaveTo" class="col-sm-2 col-form-label">Date of Leave To</label>
          <div class="col-sm-4">
              <input type="date" class="form-control" id="date_of_leaveTo" name="date_of_leaveTo" required>
          </div>
        </div>
      
        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-primary col-md-2 col-sm-12" value="Submit" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">My Pending Requests</h3>
      <br>

      @foreach ($leave_pending_data as $key => $data)

          <div class="card text-white bg-dark mb-3">
            <div class="card-header bg-dark ">
              <strong>{{$data->date_of_leave}} {{$data->date_of_leaveTo}}</strong>
              <i class="float-right" style="font-size:85%;">Request sent on :- {{$data->date_of_request}}</i>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$data->reason}}</h5>
              <p class="card-text">{{$data->description}}</p>
              <a class="btn btn-danger float-right confirmation" href="/delete-leave-pending-request-in-staff-account/{{$data->id}}">Delete Request</a>
            </div>
          </div>

      @endforeach



    </div>
</div>



@endsection


