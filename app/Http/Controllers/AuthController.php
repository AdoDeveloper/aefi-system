<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
