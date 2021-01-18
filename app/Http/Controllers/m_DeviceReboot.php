<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class m_DeviceReboot extends Controller
{
    public function index(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\device_reboot.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $reboot = explode(";", $output);
        return view('api_man.device_reboot', ['reboot'=>$reboot, 'length'=>count($reboot)]);
    }

    public function device_reboot(Request $request){
        $mot = $request->input('mot');
        $hai = $request->input('hai');
        $ba = $request->input('ba');
        $bon = $request->input('bon');
        $nam = $request->input('nam');
        $sau = $request->input('sau');
        $bay = $request->input('bay');
        if($mot == 'dc-cedge01'){
            $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\reboot_11.py'); //Chuyển mã trong tập tin test.py thành các lệnh
            $output = shell_exec($command);
            $host_name = 'dc-cedge01';
            $system = '10.10.1.11';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $reboot_time = date("F d, Y h:i:s A");
            $reboot_reason = 'reload';
            return redirect()->route('send_mail', ['host_name'	=>	$host_name,
                    'system' => $system,
                    'reboot_time' => $reboot_time,
                    'reboot_reason' => $reboot_reason]);
        }elseif($mot == 'site1-cedge111'){
            $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\reboot_13.py'); //Chuyển mã trong tập tin test.py thành các lệnh
            $output = shell_exec($command);
            $host_name = 'site1-cedge111';
            $system = '10.10.1.13';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $reboot_time = date("F d, Y h:i:s A");
            $reboot_reason = 'reload';
            return redirect()->route('send_mail', ['host_name'	=>	$host_name,
                'system' => $system,
                'reboot_time' => $reboot_time,
                'reboot_reason' => $reboot_reason]);
        }elseif($mot == 'site2-cedge01'){
            $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\reboot_15.py'); //Chuyển mã trong tập tin test.py thành các lệnh
            $output = shell_exec($command);
            $host_name = 'site2-cedge01';
            $system = '10.10.1.15';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $reboot_time = date("F d, Y h:i:s A");
            $reboot_reason = 'reload';
            return redirect()->route('send_mail', ['host_name'	=>	$host_name,
                'system' => $system,
                'reboot_time' => $reboot_time,
                'reboot_reason' => $reboot_reason]);
        }else{
//            site3-vedge01
            $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\reboot_17.py'); //Chuyển mã trong tập tin test.py thành các lệnh
            $output = shell_exec($command);
            $host_name = 'site3-vedge01';
            $system = '10.10.1.17';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $reboot_time = date("F d, Y h:i:s A");
            $reboot_reason = 'reload';
            return redirect()->route('send_mail', ['host_name'	=>	$host_name,
                'system' => $system,
                'reboot_time' => $reboot_time,
                'reboot_reason' => $reboot_reason]);
        }

    }

    public function reboot_active(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\reboot_Active.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $reboot = explode(";", $output);
        return response()->json(['success'=>$reboot, 'length'=>count($reboot)]);
    }
    public function alarm(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\alarm.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $reboot = explode(";", $output);
        return response()->json(['success'=>$reboot, 'length'=>count($reboot)]);
    }
}
