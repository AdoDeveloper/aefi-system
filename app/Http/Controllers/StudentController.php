<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function showPerfil(){
        $data['getRecord'] = User::getUser();
        $data["header_title" ] = "Useer Perfil";
        return view("student.perfil", $data);
    }

    public function showActividades(){
        
        return view("student.Actividades");
    }

    public function add(){
        
        $data["header_title" ] = "Add New Admin";
        return view("admin.admin.add", $data);
    }

   
    
  

}
