<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

class PageController extends Controller
{
  public function ViewLoginPageController(){

      return view("login-page");

  }

  public function ViewHomePageController(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $pending_data = DB::select("SELECT leaves.*, staff.firstname, staff.lastname FROM leaves, staff WHERE staff.staff_id = leaves.staff_id AND leaves.apprestate = '[PENDING]' ORDER BY leaves.date_of_request ASC"); 

         return view("admin-dashboard-content/home-page")->with("pending_data", $pending_data);

       }else if($session_type == "Staff"){



       }else{

         return Redirect::to("/");

       }
  }

  public function ViewStaffManagementIndexController(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $staff = DB::table('staff')->get(); 
         return view("admin-dashboard-content/staff-management-page-1-index")->with('staff', $staff); 

       }else{

         return Redirect::to("/");

       }

  }

  public function ViewStaffManagementEditController($id){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $staff = DB::table('staff')->where("id", $id)->get(); 
         return view("admin-dashboard-content/staff-management-page-2-edit")->with('staff', $staff); 

       }else{

         return Redirect::to("/");

       }

  }

  public function ViewSettingsPageContoller(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $admin_data = DB::table('user')->where("account_type", "admin")->get(); 
         return view("admin-dashboard-content/settings-page-1-index")->with('admin_data', $admin_data); 

       }else{

         return Redirect::to("/");

       }

  }



  public function ViewUserAccountsIndexContoller(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $staff = DB::select("SELECT * FROM staff WHERE staff.staff_id NOT IN (SELECT user.staff_id FROM user)"); 
         $staff_user_data = DB::table('user')->where("account_type", "staff")->get(); 

         return view("admin-dashboard-content/user-accounts-page-1-index")->with(['staff_user_data' => $staff_user_data, "staff" => $staff]); 

       }else{

         return Redirect::to("/");

       }

  }

  public function ViewEditUserAccount($id){

    $session_type = Session::get('Session_Type');
    $session_value = Session::get('Session_Value');

    if($session_type == "Admin"){

      $user_data = DB::table('user')->where(["id" => $id])->get();
      return view("admin-dashboard-content/user-accounts-page-2-edit")->with(['user_data' => $user_data]); 



    }else{

      return Redirect::to("/");

    }

  }


  public function ViewHomePageOfStaffAccountController(){

    $session_type = Session::get('Session_Type');


    if($session_type == "Staff"){

      $session_value = Session::get('Session_Value');

      $staff_basic_data = DB::table('staff')->select("firstname", "lastname")->where(["staff_id" => $session_value])->get();
      $leave_pending_data = DB::table('leaves')->where(["staff_id" => $session_value, "apprestate" => "[PENDING]"])->orderBy('date_of_leave', 'ASC')->get();
      $leave_pending_data2 = DB::table('leaves')->where(["staff_id" => $session_value, "apprestate" => "[PENDING]"])->orderBy('date_of_leaveTo', 'ASC')->get();
      $username = DB::table('user')->select("username")->where(["staff_id" => $session_value])->get();

      return view("staff-dashboard-content/home-page-index")->with(['staff_basic_data' => $staff_basic_data, "username" => $username, "leave_pending_data" => $leave_pending_data,"leave_pending_data2" => $leave_pending_data2]);

    }else{

      return Redirect::to("/");

    }

  }

  public function ViewSettingsPageOfStaffAccountContoller(){

     $session_type = Session::get('Session_Type');
     if($session_type == "Staff"){

       $session_value = Session::get('Session_Value');

       $staff_basic_data = DB::table('staff')->select("firstname", "lastname")->where(["staff_id" => $session_value])->get();
       $staff_data = DB::table('user')->where(["account_type" => "staff", "staff_id" => $session_value])->get(); 

       return view("staff-dashboard-content/settings-page-1-index")->with(['staff_data' => $staff_data, 'staff_basic_data' => $staff_basic_data]); 

     }else{

       return Redirect::to("/");

     }

  }

  public function ViewMyLeaveHistoryPageOfStaffAccountController(){


     $session_type = Session::get('Session_Type');

     if($session_type == "Staff"){

       $session_value = Session::get('Session_Value');

       $staff_basic_data = DB::table('staff')->select("firstname", "lastname")->where(["staff_id" => $session_value])->get();
       $leaves = DB::table('leaves')->where(["apprestate" => "[ACCEPTED]"])->orWhere("apprestate", "[DECLINED]")->orderBy('date_of_request', 'DESC')->get();

       return view("staff-dashboard-content/my-leave-history")->with(["staff_basic_data" =>$staff_basic_data,"leaves" => $leaves,"filter_options" => ["reason" => "All", "year" => "All", "month" => "All", "status" => "All"]]); 

     }else{

       return Redirect::to("/");

     }
  }


}
