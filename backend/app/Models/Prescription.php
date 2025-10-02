<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'appointment_id',
        'medication',
        'instructions',
    ];

    // Prescription donnée à un patient
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Prescription faite par un médecin
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Prescription liée à un rendez-vous
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
