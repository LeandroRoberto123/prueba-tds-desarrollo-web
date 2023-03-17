<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {
        $training = Training::orderBy('id', 'DESC')->get();
        return $training;
    }
    public function create()
    {
        // $capacitaciones = Training::all();

        // $eventos = [];
    
        // foreach ($capacitaciones as $capacitacion) {
        //     $evento = [
        //         'title' => $capacitacion->name,
        //         'start' => $capacitacion->start_time,
        //         'end' => $capacitacion->end_time,
        //     ];
    
        //     $eventos[] = $evento;
        // }
    
        // return view('training.create', compact('eventos'));
          
        // return view('training.create')->with('capacitaciones', $capacitaciones);
        // return view('training.create');

    }
    public function store(Request $request)
    {
        // dd($request);
        // die();
        // Validacion 
        // $validate = $this->validate($request, [
        //     'name' =>'required|string|max:255',
        //     'email' =>'required|string|email|max:255',
        //     'gender' =>'required',
        //     'area' =>'required',
        //     'description' =>'required',
        //     'rol' =>'required',
        // ]);
        
        // Recoger los datos
        $name = $request->input('name');
        $description = $request->input('description');
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $available_slots = $request->input('available_slots');

        // Asignar valores al objeto Training
        $training = new Training();
        $training->name = $name;
        $training->description = $description;
        $training->date = $date;
        $training->start_time = $start_time;
        $training->end_time = $end_time;
        $training->available_slots = $available_slots;
        $training->save();


        return redirect()->route('home')->with([
            'message' => 'Capacitación guardada correctamente.'
        ]);

    }

    public function edit($id)
    {

        $user = \Auth::user();
        $training = Training::find($id);


        if($user && $training){
            return view('training.edit', [
                'training' => $training
            ]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request)
    {
        // Validacion
        // $validate = $this->validate($request, [
        //     'name' =>'required|string|max:255',
        //     'email' =>'required|string|email|max:255',
        //     'gender' =>'required',
        //     'area' =>'required',
        //     'description' =>'required',
        //     // 'rol' =>'required',
        // ]);
        // Recoger datos
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $available_slots = $request->input('available_slots');

        // Asignar valores al objeto+
        $training = Training::find($id);
        $training->name = $name;
        $training->description = $description;
        $training->date = $date;
        $training->start_time = $start_time;
        $training->end_time = $end_time;
        $training->available_slots = $available_slots;
        $training->update();
        
        return redirect()->route('home')
        ->with(['message' => 'Capacitación actualizada correctamente.']);

    }

    public function delete($id)
    {
        // $user = \Auth::user();
        $training = Training::find($id)->delete();
    
        return redirect()->route('home')
            ->with('message', "La capacitación se ha borrado correctamente.");

    }
}
