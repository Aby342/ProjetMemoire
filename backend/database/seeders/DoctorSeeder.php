<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialite;

class DoctorSeeder extends Seeder
{
    public function run(): void
{
    // Médecin 1 : Dr Babacar Ndiaye
    $user1 = User::firstOrCreate(
        ['email' => 'babacar@gmail.com'],
        [
            'name' => 'Dr Babacar Ndiaye',
            'password' => bcrypt('passer123'),
            'role' => 'doctor'
        ]
    );

    $specialite1 = Specialite::firstOrCreate(['nom' => 'Cardiologie']);

    Doctor::firstOrCreate([
        'user_id' => $user1->id,
        'specialite_id' => $specialite1->id,
        'name' => 'Dr Babacar Ndiaye',
        'email' => 'babacar@gmail.com',
        'phone' => '77 9960801',
        'experience' => 8,
        'diplomes' => 'Cardiologie'
    ]);

    // Médecin 2 : Dr Aïssatou Diop
    $user2 = User::firstOrCreate(
        ['email' => 'aissatou.diop@gmail.com'],
        [
            'name' => 'Dr Aïssatou Diop',
            'password' => bcrypt('passer123'),
            'role' => 'doctor'
        ]
    );

    $specialite2 = Specialite::firstOrCreate(['nom' => 'Pediatrie']);

    Doctor::firstOrCreate([
        'user_id' => $user2->id,
        'specialite_id' => $specialite2->id,
        'name' => 'Dr Aïssatou Diop',
        'email' => 'aissatou@gmail.com',
        'phone' => '77 1234567',
        'experience' => 5,
        'diplomes' => 'Pediatrie'
    ]);

    echo " Médecins ajoutés : Babacar Ndiaye & Aïssatou Diop\n";

   }

}
