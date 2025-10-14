<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialite;


class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialite::create(['nom' => 'Cardiologie']);
        Specialite::create(['nom' => 'Neurologie']);
        Specialite::create(['nom' => 'Pediatrie']);
    }
}
