<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    //
    public function index(){
          return view('register');
    }

    public function register(Request $request){
           $validate=$request->validate([
               'email'=>'required|email|unique:users',
               'password'=>'required',
           ]);
         $user=User::create([
            'email'=>$validate['email'],
            'password'=>bcrypt($validate['password'])
         ]);
         Auth::login($user);
         return redirect()->route('step1');
    }


    public function step_one() {
        $userFirstName=User::find(\auth()->id())->firstName;
        return view('step-one',['userFirstName'=>$userFirstName]);
}

 public function storeStepOne(Request $request){
         $validate=$request->validate([
             'firstName'=>'required'
         ]);
         $user=User::find(\auth()->id());
         $user->update([
             'firstName'=>$validate['firstName'],
         ]);
     return redirect()->route('step2');
 }

    public function step_two() {
        $checkfirstStep=User::find(\auth()->id())->firstName;
        if (!$checkfirstStep){
            return redirect()->route('step1');
        }
        $userLastName=User::find(\auth()->id())->lastName;
        return view('step-two',['userLastName'=>$userLastName]);
    }

    public function storeStepTwo(Request $request){
        $validate=$request->validate([
           'lastName'=>'required'
        ]);
        $user=User::find(\auth()->id());
        $user->update([
           'lastName'=>$validate['lastName'],
        ]);
        return redirect()->route('step3');
    }

    public function step_three() {
        $checkSecondStep=User::find(\auth()->id())->lastName;
        if (!$checkSecondStep){
            return redirect()->route('step2');
        }
        $userPhone=User::find(\auth()->id())->phone;
        return view('step-three',['phone'=>$userPhone]);
    }

    public function storeStepThree(Request $request){
        $validate=$request->validate([
            'phone'=>'required'
        ]);
        $user=User::find(\auth()->id());
        $user->update([
            'phone'=>$validate['phone'],
        ]);
        return redirect()->route('index')->with('msg','user added successfully');
    }

    public function preiviewPage(){
        $user=User::find(\auth()->id());
        return view('index',['user'=>$user]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('signup');
    }

}
