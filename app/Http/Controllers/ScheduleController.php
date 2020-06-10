<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\User;

class ScheduleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $materias = Materia::get();
        return view('pages.createSchedule',compact('materias'));
    }
    public function createMateria(){
        return view('pages.createMateria');
    }
    public function storeMateria(Request $request){
        if (request()->ajax()) {
            $data = json_decode($request['array']);

            $validate = Materia::get();
            foreach ($validate as $valid) {
                if ($valid->name == $data[0]) {
                    return response()->json('error');
                }
            }
            $materia = new Materia();
            $materia->name = $data[0]; 
            $materia->color = $data[1]; 
            $materia->save();
            return response()->json('hecho');
        }
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
    public function deleteMateria($id){
        $materia = Materia::where('id',$id)->firstOrFail();
        $materia->delete();
    }
}
