<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
   
    public function login(){
        //dd(Hash::make(123456));
   
         if(!empty(Auth::check())){
                
           if(Auth::user()->user_type == 1){
               return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2){
               return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3){
               return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 4){
               return redirect('parent/dashboard');
            }
         }
   
          return view('auth.login');
        
      }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            
            // Obtener el usuario autenticado
            $user = Auth::user();

            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard')->with('welcomeMessage', '¡Bienvenido al sistema, ' . $user->name . '!');;
             }
             else if(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard')->with('welcomeMessage', '¡Bienvenido al sistema, ' . $user->name . '!');;
             }
             else if(Auth::user()->user_type == 3){
                return redirect('student/dashboard')->with('welcomeMessage', '¡Bienvenido al sistema, ' . $user->name . '!');;
             }
             else if(Auth::user()->user_type == 4){
                return redirect('parent/dashboard')->with('welcomeMessage', '¡Bienvenido al sistema, ' . $user->name . '!');;
             }

        } else {
            return redirect()->back()->with('error', 'Por favor introduzca las credenciales correctas');
        }
    }


    public function forgotpassword()
    {
      return view('auth.forgot');
    }   


    public function PostForgotPassword(Request $request){
      //dd($request->all());

      $user = User::getEmailSingle($request->email);
      if(!empty($user)){
         
         $user->remember_token = Str::random(30);
         $user->save();
         Mail::to($user->email)->send(new ForgotPasswordMail($user));
         return redirect()->back()->with('success',"Por favor revise su Email y restablezca su contraseña. ");
         

      }else {
           return redirect()->back()->with('error','El email no fue encontrado en el sistema. ');

      }

    }
   


    public function reset($remember_token){
       $user = User::getTokenSingle($remember_token);

       if (!empty($user)){

         $data['user'] = $user;
         return view('auth.reset', $data);

       }else{
         abort(404);
       }
     
    }



    public function PostReset($token, Request $request){

     if($request->password == $request->cpassword){
       
      $user = User::getTokenSingle($token);
      $user->password = Hash::make($request->password);
      $user->remember_token = Str::random(30);
      $user->save();

      return redirect(url(''))->with('success','Contraseña correctamente restablecida.');

     }else{

      return redirect()->back()->with('error','Contraseñas no coinciden. ');

     }

    }




    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
