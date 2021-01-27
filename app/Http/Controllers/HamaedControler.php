<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HamaedControler extends Controller
{
    public function index()
    {
    return view ('hello');
    }
    public function show($id)
    {
    	return 'myid is: '. $id ;
    }
    public function sum($id)
    {
    	return 3 + $id ;
    }
}
