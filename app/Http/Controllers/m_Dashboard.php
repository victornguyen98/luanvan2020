<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_Dashboard extends Controller
{
    public function index()
    {
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Vsmart.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $vsmart = $output;

        $command_1 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Wan_Edge.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output_1 = shell_exec($command_1); // Lấy kết quả trả về biến $output
        $wan_edge = $output_1;

        $command_2 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Vbound.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output_2 = shell_exec($command_2); // Lấy kết quả trả về biến $output
        $vbound = $output_2;

        $command_3 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\rebootCount.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output_3 = shell_exec($command_3); // Lấy kết quả trả về biến $output
        $reboot = $output_3;

        $command_4 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Control_Count.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output_4 = shell_exec($command_4); // Lấy kết quả trả về biến $output
        $control = explode(",", $output_4);

        $command_5 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Wan_edge_Health.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output_5 = shell_exec($command_5); // Lấy kết quả trả về biến $output
        $health = explode(",", $output_5);

        $command_6 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Wan_Edge_Inven.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output_6 = shell_exec($command_6); // Lấy kết quả trả về biến $output
        $inven = explode(",", $output_6);

//        $command_7 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Wan_Edge_detail.py'); //Chuyển mã trong tập tin test.py thành các lệnh
//        $output_7 = shell_exec($command_7); // Lấy kết quả trả về biến $output
//        $inven = explode(",", $output_7);



        return view("home", ['vsmart'=>$vsmart, 'wan_edge'=>$wan_edge, 'vbound'=>$vbound, 'reboot'=>$reboot, 'control'=>$control,
            'health'=>$health, 'inven'=>$inven]);

    }

    public function vsmart_detail(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\pp_Vsmart.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $vsmart = explode(",", $output);
        return response()->json(['success'=>$vsmart]);
    }

    public function wan_edge_detail(){
        $command_1 = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Wan_Edge.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output_1 = shell_exec($command_1);

        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\pp_Wan_Edge.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);

        return response()->json(['success'=>$wan_edge, 'length'=>$output_1]);
    }

    public function vbound_detail(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\pp_Vbound.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $vbound = explode(",", $output);

        return response()->json(['success'=>$vbound]);
    }

    public function reboot_detail(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\reboot_History.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $reboot = explode(";", $output);

        return response()->json(['success'=>$reboot, 'length'=>count($reboot)]);
    }

    public function control_up(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\pp_Control_up.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);

        return response()->json(['success'=>$wan_edge, 'length'=>count($wan_edge)]);
    }

    public function normal(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\pp_Normal.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);

        return response()->json(['success'=>$wan_edge, 'length'=>count($wan_edge)]);
    }

    public function we_total(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\WE_total.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);

        return response()->json(['success'=>$wan_edge, 'length'=>count($wan_edge)]);
    }

    public function we_author(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\WE_author.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);

        return response()->json(['success'=>$wan_edge, 'length'=>count($wan_edge)]);
    }

    public function we_deloy(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\WE_deloy.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);

        return response()->json(['success'=>$wan_edge, 'length'=>count($wan_edge)]);
    }
}
