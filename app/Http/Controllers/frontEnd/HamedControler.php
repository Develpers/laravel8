<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HamedControler extends Controller
{
    public function index()
    {
    	return view('hello');
    }
}
