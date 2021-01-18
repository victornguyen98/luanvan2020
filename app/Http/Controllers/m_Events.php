<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_Events extends Controller
{
    public function index(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\events.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);
        return view('api_man.events',['network'=>$wan_edge, 'length'=>count($wan_edge)]);
    }
}
