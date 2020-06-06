<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:create user');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::get();
        return view('users.index');
    }

    public function permissionsUser(){
        return view('pages.listPermissions');
    }

    public function getUsers(){
        return datatables()->eloquent(User::query())
        ->addColumn('name', function($data){ return $data->name; })
        ->addColumn('email', function($data){ return $data->email;})
        ->addColumn('rol', function($data){ 
            if ($data->getRoleNames() == '["Administrador"]') {
                return "Administrador";
            }else{ if ($data->getRoleNames() == '["Docente"]') {
                return "Docente";
                }else {
                    return "Estudiante";
                }
            }
            return $data->getRoleNames();
        })
        ->addColumn('created_at', function($data){ return $data->created_at;})
        ->addColumn('actions', 'buttom.userTable')
        ->rawColumns(['actions'])
        ->toJson();
    }
    public function delete($slug){
        $user = User::where('slug',$slug)->firstOrFail();
        $user->delete();
    }
}
