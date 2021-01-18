<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_Policices extends Controller
{
    public function index(){
        return view('api_man.policices');
    }
}
