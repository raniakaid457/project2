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
      <h3 class="panel-title" style="text-align:center;">Change Password</h3>
      <br>

      <form action="/change-password" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" required>
          </div>

          <div class="checkbox col-md-2" style="margin-top:0.6%;">
              <label>
                <input type="checkbox" style="width: 0.9rem; height: 0.9rem;" class="form-check-input" id="check2" runat="server"> Show Password
              </label>
          </div>

        </div>

        <div class="form-group row">
          <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
          </div>

          <div class="checkbox col-md-2" style="margin-top:0.6%;">
              <label>
                <input type="checkbox" style="width: 0.9rem; height: 0.9rem;" class="form-check-input" id="check3" runat="server"> Show Password
              </label>
          </div>

        </div>

        <div class="form-group row">
          <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
          </div>

          <div class="checkbox col-md-2" style="margin-top:0.6%;">
              <label>
                <input type="checkbox" style="width: 0.9rem; height: 0.9rem;" class="form-check-input" id="check4" runat="server"> Show Password
              </label>
          </div>

        </div>

        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-primary col-md-2 col-sm-12" value="Change" id="button" type="submit">
          </div>
        </div>
      </form>

    </div>
</div>

<br>




@endsection



     
