<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    //  Un patient peut avoir plusieurs rendez-vous
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    //  Un patient peut recevoir plusieurs prescriptions
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    // Vérification des rôles
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isDoctor()
    {
        return $this->role === 'doctor';
    }

    public function isPatient()
    {
        return $this->role === 'patient';
    }
}
