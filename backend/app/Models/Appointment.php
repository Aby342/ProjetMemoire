<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'date',
        'status',
    ];

    // 🔹 Un rendez-vous appartient à un patient
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔹 Un rendez-vous appartient à un médecin
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // 🔹 Un rendez-vous peut avoir une prescription
    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }
}


