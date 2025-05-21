<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    public function paciente()
    {
        return $this->belongsTo(Pacientes::class);
    }
}
