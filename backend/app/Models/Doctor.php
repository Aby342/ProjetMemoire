<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable =  [
        'user_id',   
        'name',
        'specialite_id',
        'email',
        'experience',
        'phone',
        'diplomes'
    ];

    // Un médecin peut avoir plusieurs rendez-vous
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Un médecin peut donner plusieurs prescriptions
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}


