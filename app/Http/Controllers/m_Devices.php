<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_Devices extends Controller
{
    public function index(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\device.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);
        return view('api_man.devices',['device'=>$wan_edge, 'length'=>count($wan_edge)]);
    }

    public function config(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\config_1.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
//        $wan_edge = explode(";", $output);
        return response()->json(['success'=>$output]);
    }

    public function config_2(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\config_2.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
//        $wan_edge = explode(";", $output);
        return response()->json(['success'=>$output]);
    }
    public function config_3(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\config_3.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
//        $wan_edge = explode(";", $output);
        return response()->json(['success'=>$output]);
    }
    public function config_4(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\config_4.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
//        $wan_edge = explode(";", $output);
        return response()->json(['success'=>$output]);
    }

    public function config_real(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\upgrade_1.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command);
        return view('api_man.config_detail', ['data'=>$output]);
    }

    public function config_ne(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\upgrade_2.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command);
        return view('api_man.config_success');
    }

}
