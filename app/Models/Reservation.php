<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    
    // Relacion Many To One / de muchos a uno
    public function training()
    {
        return $this->belongsTo('App\Models\Training', 'training_id');
    }

}
