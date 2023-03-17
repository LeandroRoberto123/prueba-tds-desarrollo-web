<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Reservation;
use App\Http\Controllers\TrainingController;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {

        $training = new TrainingController();
        $training = $training->getAll();
          
        return view('reservation.create', [
            'trainings' => $training,
        ]);
        

    }
    public function store(Request $request)
    {
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
        $reservation_date = $request->input('reservation_date');
        $cancellation_date = $request->input('cancellation_date');
        $training_id = $request->input('training_id');

        $user = \Auth::user();

        // Asignar valores al objeto  Reservation
        $reservation = new Reservation();
        $reservation->training_id  = $training_id;
        $reservation->user_id   = $user->id;
        $reservation->reservation_date = $reservation_date;
        $reservation->cancellation_date = $cancellation_date;
        $reservation->save();

        
        $training = Training::where('id', $training_id)->first();
        // Asignar valores al objeto EmployeeRole
        $available_slots_update = $training->available_slots - 1;
        
        $training_register = Training::find($training_id);
        $training_register->available_slots = $available_slots_update;
        $training_register->update();

        // $empleado_id = Employee::latest('id')->first();

        // // Asignar valores al objeto EmployeeRole
        // $user_rol = new EmployeeRole();
        // $user_rol->rol_id = $request->input('rol');
        // $user_rol->empleado_id = $empleado_id->id;
        // $user_rol->save();

        return redirect()->route('home')->with([
            'message' => 'Inscripción realizada correctamente.'
        ]);

    }

    public function edit($id)
    {
        $user = \Auth::user();
        $reservation = Reservation::find($id);

        if($user && $reservation){
            return view('reservation.edit', [
                'reservation' => $reservation
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
        $cancellation_date = $request->input('cancellation_date');
        $training_id = $request->input('training_id');

        // Asignar valores al objeto+
        $reservation = Reservation::find($id);
        $reservation->cancellation_date = $cancellation_date;
        $reservation->update();

        $training = Training::where('id', $training_id)->first();
        // Asignar valores al objeto 
        if($cancellation_date != ''){
            $available_slots_update = $training->available_slots - 1;
        }else{
            $available_slots_update = $training->available_slots + 1;
        }
        $training_register = Training::find($training_id);
        $training_register->available_slots = $available_slots_update;
        $training_register->update();
        
        return redirect()->route('home')
        ->with(['message' => 'Inscripción actualizada correctamente.']);

    }

    public function delete($id)
    {
        // $user = \Auth::user();
        
        // Eliminar registros de la tabla empleado_rol
        // $employeesRole = EmployeeRole::where('empleado_id', $id)->first()->delete();
        // Eliminar registros de la tabla empleados

        $training = Training::find($id)->delete();
    
        return redirect()->route('home')
            ->with('message', "La capacitación se ha borrado correctamente.");

    }
}
