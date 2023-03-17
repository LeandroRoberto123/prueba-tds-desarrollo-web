<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Reservation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();
        // echo $user->role;
        if($user->role == 'Admin'){

            $training = Training::orderBy('id', 'DESC')->get();
            return view('home', [
                'trainings' => $training,
            ]);

        }else if($user->role == 'User'){


            $reservation = Reservation::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
            // dd($reservation);
            // die();

            return view('home', [
                'reservations' => $reservation,
            ]);

        }
    }
}
