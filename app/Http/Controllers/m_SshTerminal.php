<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_SshTerminal extends Controller
{
    public function index(){
        return view('api_man.ssh_terminal');
    }
}
