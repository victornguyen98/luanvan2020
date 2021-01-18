<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_SoftwareRepository extends Controller
{
    public function index(){
        return view('api_man.software_repository');
    }
}
