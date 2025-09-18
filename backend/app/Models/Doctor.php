<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'speciality',
        'email',
        'phone',
    ];

    // 🔹 Un médecin peut avoir plusieurs rendez-vous
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // 🔹 Un médecin peut donner plusieurs prescriptions
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}


