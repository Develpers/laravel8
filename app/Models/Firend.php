<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firend extends Model
{
    use HasFactory;
    protected $fillable = ['firend_name','firend_age','bio,is_approved'];
}
