<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesoresModel extends Model
{
    protected $primaryKey = 'clave_profesor'; // para que no sea id en las consultas
    use HasFactory;
}
