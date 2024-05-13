<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nisn', 'rt_nilai', 'alamat', 'role', 'status'];

    protected $table = "pendaftar";
}
