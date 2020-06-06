<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DataTables;

class AjaxController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function getRole(){
        $roles = Role::get();  
        return response()->json($roles); 
    }
}
