<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

class HomeController extends Controller
{
    public function InsertStaffData(Request $request){

      $session_type = Session::get('Session_Type');
      $session_value = Session::get('Session_Value');

      if($session_type == "Admin"){

        $this->validate($request, [
          'staff_id' => 'required',
          'firstname' => 'required',
          'lastname' => 'required',
          'email' => 'required',
          'phone_number' => 'required',
          'position' => 'required',
        ]);

        $staff_id       = $request->staff_id;
        $first_name     = $request->firstname;
        $last_name      = $request->lastname;
        $email          = $request->email;
        $phone_number   = $request->phone_number;
        $position       = $request->position;


        if (DB::table('staff')->where('staff_id', $staff_id)->doesntExist()) {

          if(DB::insert('INSERT INTO user (staff_id, firstname, lastname,email, phone_number, position) values (?, ?, ?, ?, ?, ?)', [$staff_id, $firstname, $lastname, $email, $phone_number, $position])){

              return redirect()->back()->with('message', 'Registeration is Successful.');

          }

        }else{
          return redirect()->back()->withErrors("<strong>Unable to register:</strong> The given staff ID already exists in the database");
        }

      }

    }

    public function DeleteStaffData($id){

       $session_type = Session::get('Session_Type');

       if($session_type == "Admin"){

           if(DB::table('staff')->where('id', '=', $id)->delete()){

               return redirect()->back()->with('message', 'Deletion is Successful.');
           }

       }else{

           return Redirect::to("/");

       }

   }

   public function UpdateStaffData(Request $request){

      $session_type = Session::get('Session_Type');

      if($session_type == "Admin"){

        $this->validate($request, [
          'id' => 'required',
          'firstname' => 'required',
          'lastname' => 'required',
          'email' => 'required',
          'phone_number' => 'required',
          'position' => 'required',
        ]);

        $id        = $request->id;
        $firstname     = $request->firstname;
        $lastname      = $request->lastname;
        $email          = $request->email;
        $phone_number   = $request->phone_number;
        $position       = $request->position;


       
        if(DB::table('staff')->where('id', $id)->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'phone_number' => $phone_number, 'position' => $position])){

          return Redirect::to("/view-staff-management-index")->with('message', 'Updation is Successful.');

        }else{

          return Redirect::to("/view-staff-management-index")->with('message', 'No changes made.');
        }

      }else{

          return Redirect::to("/");

      }

  }
       

 public function ChangePassword(Request $request){

    $session_type = Session::get('Session_Type');

    if($session_type == "Admin"){

       $admin_data = DB::table('user')->where("account_type", "admin")->get(); 

       if($request->current_password == $admin_data[0]->password){

         if($request->new_password == $request->confirm_password){

           if(DB::table('user')->where('account_type', 'admin')->update(['password'=>$request->new_password])){

               return redirect()->back()->with('message', 'Password has been updated successfully.');

           }else{

             return redirect()->back()->with('message', 'No changes made.');

           }

         }else{

           return redirect()->back()->withErrors('The confirm password does not match');

         }

       }else{

         return redirect()->back()->withErrors('The current password is wrong.');
       }

    }else{

        return Redirect::to("/");

    }

  }

  public function EditUserAccount(Request $request){

     $session_type = Session::get('Session_Type');

     if($session_type == "Admin"){

       $this->validate($request, [
         'username' => 'required',
         'password' => 'required',
       ]);


       $username  =  $request->username;
       $password  =  $request->password;
       $id   =  $request->id;

       if(DB::table('user')->where('id', $id)->update(['username' => $username, 'password' => $password])){

         return Redirect::to("/view-user-accounts-index")->with('message', 'Updation is Successful.');

       }else{

         return Redirect::to("/view-user-accounts-index")->with('message', 'No changes made.');
       }


     }else{

         return Redirect::to("/");

     }
  }

  public function DeleteUserAccount($id){

     $session_type = Session::get('Session_Type');

     if($session_type == "Admin"){

         if(DB::table('user')->where('id', '=', $id)->delete()){

             return redirect()->back()->with('message', 'Deletion is Successful.');
         }

     }else{

         return Redirect::to("/");

     }

 }

 public function InsertUserAccount(Request $request){

   $session_type = Session::get('Session_Type');
   $session_value = Session::get('Session_Value');

   if($session_type == "Admin"){

     $this->validate($request, [
       'staff_id' => 'required',
       'username' => 'required',
       'password' => 'required',
     ]);

     $staff_id  =  $request->staff_id;
     $username  =  $request->username;
     $password  =  $request->password;


     if (DB::table('user')->where('staff_id', $staff_id)->doesntExist()) {

       if (DB::table('user')->where('username', $username)->doesntExist()) {

         if(DB::insert('INSERT INTO user (staff_id, username, password, account_type) values (?, ?, ?, ?)', [$staff_id, $username, $password, "staff"])){

             return redirect()->back()->with('message', 'Account creation is Successful.');
         }

       }else{

         return redirect()->back()->withErrors("<strong>Unable to create:</strong> The given username already exists in the database.");

       }

     }else{

       return redirect()->back()->withErrors("<strong>Unable to create:</strong> The staff already has an account");

     }
   }
 }

 public function AcceptRequest($id){

   $session_type = Session::get('Session_Type');
   $session_value = Session::get('Session_Value');

   if($session_type == "Admin"){

     if(DB::table('leaves')->where(["id"=>$id])->update(['apprestate'=>"[ACCEPTED]"])){

         return redirect()->back()->with('message', 'Accepted');

     }else{

       return redirect()->back()->with('message', 'No changes made.');

     }

   }else{

        return Redirect::to("/");

   }

 }

 public function DeclineRequest($id){

   $session_type = Session::get('Session_Type');
   $session_value = Session::get('Session_Value');

   if($session_type == "Admin"){

     if(DB::table('leaves')->where(["id"=>$id])->update(['apprestate'=>"[DECLINED]"])){

         return redirect()->back()->with('message', 'Declined');

     }else{

       return redirect()->back()->with('message', 'No changes made.');

     }

   }else{

        return Redirect::to("/");

   }

 }



  public function ChangePasswordOfStaffAccount(Request $request){

    $session_type = Session::get('Session_Type');
    $session_value = Session::get('Session_Value');

    if($session_type == "Staff"){

       $staff = DB::table('user')->where(["account_type" => "staff", "staff_id" => $session_value])->get(); 

       if($request->current_password == $staff[0]->password){

         if($request->new_password == $request->confirm_password){

           if(DB::table('user')->where(["account_type" => "staff", "staff_id" => $session_value])->update(['password'=>$request->new_password])){

               return redirect()->back()->with('message', 'Password has been updated successfully.');

           }else{

             return redirect()->back()->with('message', 'No changes made.');

           }

         }else{

           return redirect()->back()->withErrors('The confirm password does not match');

         }

       }else{

         return redirect()->back()->withErrors('The current password is wrong.');
       }

    }else{

        return Redirect::to("/");

    }

  }


   public function InsertLeavesOfStaffAccount(Request $request){

     $session_type = Session::get('Session_Type');
     $session_value = Session::get('Session_Value');

     if($session_type == "Staff"){

       $this->validate($request, [
         'reason' => 'required',
         'description' => 'required',
         'date_of_leave' => 'required',
         'date_of_leaveTo' => 'required',
       ]);

       $staff_id          =  $session_value;
       $reason            =  $request->reason;
       $description       =  $request->description;
       $date_of_leave     =  $request->date_of_leave;
       $date_of_leaveTo     =  $request->date_of_leaveTo;
       $date_of_request   =  date('Y-m-d H:i:s');
       $apprestate  =  "[PENDING]";


       if(DB::insert('INSERT INTO leaves (staff_id, reason, description, date_of_leave,date_of_leaveTo, date_of_request,apprestate ) values (?, ?, ?, ?, ? ,?, ?)', [$staff_id, $reason, $description, $date_of_leave, $date_of_leaveTo ,$date_of_request, $apprestate])){

           return redirect()->back()->with('message', 'Leave request has been submited successfully.');

       }

     }
   }

   public function DeleteLeavePendingRequestInStaffAccount($id){

      $session_type = Session::get('Session_Type');

      if($session_type == "Staff"){

        if(DB::table('leaves')->where('id', '=', $id)->delete()){

            return redirect()->back()->with('message', 'Deletion is Successful.');
        }

      }else{

          return Redirect::to("/");

      }

  }


}

?>
