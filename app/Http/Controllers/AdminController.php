<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data["header_title" ] = "Admin List";
        return view("admin.admin.list", $data);
    }


    public function add(){
        
        $data["header_title" ] = "Add New Admin";
        return view("admin.admin.add", $data);
    }

    public function insert(Request $request){
        
       $user = new User();
       $user->name = trim($request->name);
       $user->last_name = trim($request->last_name);
       $user->email = trim($request->email);
       $user->password = Hash::make($request->password);
       $user->user_type = 1;
       $user->save();

       return redirect("admin/admin/list")->with("welcomeMessage","Administrador creado correctamente.");
       
    }


    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Admin";
            return view("admin.admin.edit", $data);
        }else{
            abort(404);
        }
    }
   
    public function update($id, Request $request)
    {
        $user = User::getSingle($id);

        if (empty($user)) {
            abort(404);
        }

        // **Adición de validaciones para los campos 'name' y 'user_photo'**

        $request->validate([
            'name' => 'required|string|max:255',
            'user_photo' => 'nullable|file|image|max:2048'
        ]);

        // Actualización de campos de nombre, apellido y correo
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);

        // Verificar si se proporcionó una nueva contraseña
        if (!empty($request->new_password)) {
            // Verificar la contraseña actual
            if (Hash::check($request->current_password, $user->password)) {
                
                // Verificar si la confirmación de la contraseña coincide
                if ($request->new_password === $request->new_password_confirmation) {
                    // En caso de coincidencia, se actualiza a la nueva contraseña
                    $user->password = Hash::make($request->new_password);
                } else {
                    // En caso de que la confirmación de la contraseña no coincida
                    return redirect()->back()->with("errorMessage", "Las contraseñas a confirmar no coinciden.");
                }
                
            } else {
                return redirect()->back()->with("errorMessage", "La contraseña actual no es válida.");
            }
        }

        // **Actualización de la foto del usuario**

        if ($request->hasFile('user_photo')) {
            $imageFile = $request->file('user_photo');

            // Obtener la fecha y hora actuales para agregar al nombre del archivo
            $currentDateTime = now()->format('YmdHis');

            // Construir el nombre de la imagen con la fecha y hora
            $imageName = $user->name . '_' . $currentDateTime . '.' . $imageFile->getClientOriginalExtension();

            // Almacenar la imagen en el directorio 'public/user-profile'
            $imageFile->storeAs('user-profile', $imageName, 'public');

            // Actualizar el campo 'user_photo' en el modelo
            $user->user_photo = $imageName;
        }

        $user->updated_at = now();

        // **Guardar el usuario actualizado**
        $user->save();

        return redirect("admin/admin/list")->with("welcomeMessage", "Administrador modificado correctamente.");
    }

}