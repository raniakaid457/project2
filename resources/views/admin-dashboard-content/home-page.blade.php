@extends('admin-Dashboard-layout.dashboard-template')

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
      <h3 class="panel-title" style="text-align:center;">Pending Requests</h3>
      <br>



      @foreach ($pending_data as $key => $data)

          <div class="card text-white bg-dark mb-3">
            <div class="card-header bg-dark ">
              <strong>{{$data->date_of_leave}}{{$data->date_of_leaveTo}}({{$data->firstname}} {{$data->lastname}})</strong>
              <i class="float-right" style="font-size:85%;">Request sent on :- {{$data->date_of_request}}</i>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$data->reason}}</h5>
              <p class="card-text">{{$data->description}}</p>

              <a style="margin-left:10px;" class="btn btn-danger  float-right " href="/decline-request/{{$data->id}}">Decline</a>
              <a class="btn btn-primary float-right" href="/accept-request/{{$data->id}}">Accept</a>

            </div>
          </div>

      @endforeach



    </div>
</div>


@endsection

<script>

    window.onload=function(){

      $(".nav-item:eq(0)").addClass("active");

    }

</script>
