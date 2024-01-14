<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


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

    public function showRegisterForm()
   {
    return view('auth.register');
   }


   public function registerUser(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'nombre' => ['required', 'string', 'max:255'],
           'last_name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'email', 'unique:users,email', 'max:250'],
           'password' => ['required', 'min:8', 'confirmed'],
           'user_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Permitir nulo para user_photo
       ]);
   
       if ($validator->fails()) {
           // Redirigir de vuelta con mensajes de error y datos de entrada
           return redirect()->back()->withErrors($validator)->withInput();
       }
   
       try {
           // Guardar Usuario
           $user = User::create([
               'name' => $request->nombre, // Actualizar a $request->nombre
               'last_name' => $request->last_name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'user_photo' => null, // Valor predeterminado si no se proporciona ningún archivo
           ]);
   
           // Guardar la ruta de la foto del usuario si se proporciona
           if ($request->hasFile('user_photo')) {
               $imagePath = $request->file('user_photo')->store('user_photos', 'public');
               $user->update(['user_photo' => $imagePath]);
           }
   
           // Autenticar al usuario
           Auth::login($user);
           $request->session()->regenerate();
   
           // Redirigir a la página de inicio de sesión o al panel de control según tu lógica.
           return redirect()->route('login');
       } catch (\Exception $e) {
           // Manejar el error (por ejemplo, redirigir de vuelta con un mensaje de error)
           return redirect()->back()->with('error', 'Ha ocurrido un error al crear la cuenta. Detalles del error: ' . $e->getMessage());
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
