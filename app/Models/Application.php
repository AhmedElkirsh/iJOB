<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table='resumes';
    use HasFactory;
    protected $fillable=
    [
    'full_name',
    'email',
    'phone',
    'address',
    'marital_status',
    'military_status'
    ];
}
