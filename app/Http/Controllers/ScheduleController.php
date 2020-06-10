<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Schedule;
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
    // <!-- AQUI SE CREA EL HORARIO -->
    public function ScheduleStore(Request $request){
        if (request()->ajax()) {
  
            // $request->data['viernes'];
            // return response()->json($request->data['lunes']);
            $schedule = new Schedule();
            $schedule->user_id = auth()->user()->id;
            $schedule->nameSchedule = $request->data['nombreHorario'];
            $schedule->lu1 = $request->data['lunes'][0];
            $schedule->lu2 = $request->data['lunes'][1];
            $schedule->lu3 = $request->data['lunes'][2];
            $schedule->lu4 = $request->data['lunes'][3];
            $schedule->lu5 = $request->data['lunes'][4];
            $schedule->lu6 = $request->data['lunes'][5];
            $schedule->ma1 = $request->data['martes'][0];
            $schedule->ma2 = $request->data['martes'][1];
            $schedule->ma3 = $request->data['martes'][2];
            $schedule->ma4 = $request->data['martes'][3];
            $schedule->ma5 = $request->data['martes'][4];
            $schedule->ma6 = $request->data['martes'][5];
            $schedule->mi1 = $request->data['miercoles'][0];
            $schedule->mi2 = $request->data['miercoles'][1];
            $schedule->mi3 = $request->data['miercoles'][2];
            $schedule->mi4 = $request->data['miercoles'][3];
            $schedule->mi5 = $request->data['miercoles'][4];
            $schedule->mi6 = $request->data['miercoles'][5];
            $schedule->ju1 = $request->data['jueves'][0];
            $schedule->ju2 = $request->data['jueves'][1];
            $schedule->ju3 = $request->data['jueves'][2];
            $schedule->ju4 = $request->data['jueves'][3];
            $schedule->ju5 = $request->data['jueves'][4];
            $schedule->ju6 = $request->data['jueves'][5];
            $schedule->vi1 = $request->data['viernes'][0];
            $schedule->vi2 = $request->data['viernes'][1];
            $schedule->vi3 = $request->data['viernes'][2];
            $schedule->vi4 = $request->data['viernes'][3];
            $schedule->vi5 = $request->data['viernes'][4];
            $schedule->vi6 = $request->data['viernes'][5];
            $schedule->save();
            return response()->json('hecho');
        }
    }
    public function view(){
        return view('pages.listSchedule');
    }
    public function deleteMateria($id){
        $materia = Materia::where('id',$id)->firstOrFail();
        $materia->delete();
    }
    public function viewSchedule($id){
        $schedule = Schedule::where('id',$id)->firstOrFail();
        return view('pages.viewListSchedule', compact('schedule'));
    }
}
