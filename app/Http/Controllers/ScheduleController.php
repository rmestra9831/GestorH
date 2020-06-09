<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('pages.createSchedule');
    }
    public function createMateria(){
        return view('pages.createMateria');
    }
    public function storeMateria(Request $request){
        // return('asd');
        if ($request()->ajax()) {
            return response()->json('si es');
        }else{
            return response()->json('no es');
        }
    }
}
