<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    public function medecins()
{
    return $this->hasMany(User::class);
}

}
