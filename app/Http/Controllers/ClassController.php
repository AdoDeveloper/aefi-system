<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list(){
       // $data['getRecord'] = User::getClass();
        $data["header_title" ] = "Class List";
        return view("admin.class.list", $data);
    }


    public function add(){
        
        $data["header_title" ] = "Add New Class";
        return view("admin.class.add", $data);
    }

    public function insert(Request $request)
    {
        // **Adición de validaciones para los campos 'name', 'last_name', 'email', 'password', 'password_confirmation' y 'user_photo'**
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);
    
    
        $classModel = new ClassModel(); 
        $classModel->name = trim($request->name);
        $classModel->status = $request->status;
        $classModel->created_by = Auth::user()->id;

        $classModel->save();
    
        return redirect("admin/class/list")->with("welcomeMessage", "Clase creada correctamente.");
    }   


}
