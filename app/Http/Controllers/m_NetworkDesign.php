<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_NetworkDesign extends Controller
{
    public function index(){
        return view('api_man.network_design');
    }
}
