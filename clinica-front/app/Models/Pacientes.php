<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    // Outros códigos da model

   public function consultas()
    {
        return $this->hasMany(Consultas::class, 'paciente_id'); // <-- aqui o nome correto da coluna estrangeira
    }
}
