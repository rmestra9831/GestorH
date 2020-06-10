<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Schedule;
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
    public function getMateria(){
        return datatables()->eloquent(Materia::query())
        ->addColumn('name', function($data){ return $data->name; })
        // ->addColumn('color', function($data){ return $data->color;})
        ->addColumn('color', 'buttom.btnColor')
        ->addColumn('actions', 'buttom.btnTableMateria')
        ->rawColumns(['actions','color'])
        ->toJson();
    }
    public function getSchedule(){
        return datatables()->eloquent(Schedule::query())
        ->addColumn('name', function($data){ return $data->createBy->name; })
        ->addColumn('nameSchedule', function($data){ return $data->nameSchedule; })
        ->addColumn('actions', 'buttom.btnTableSchedule')
        ->rawColumns(['actions','color'])
        ->toJson();
    }
}
