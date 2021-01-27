<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class postcontroler extends Controller
{
     public function hello()
    {
    	return viwe ('hello');
    }
}
