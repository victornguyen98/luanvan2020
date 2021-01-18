<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\Export;
use Excel;
use NetworkExport;


class m_Network extends Controller
{
    public function index(){
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Network.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);
        return view('api_man.network',['network'=>$wan_edge, 'length'=>count($wan_edge)]);
    }

    public function export_csv(){
        DB::table('network')->delete();
        $command = escapeshellcmd('D:\xampp\htdocs\api_man\app\Http\Controllers\Dashboard\Network.py'); //Chuyển mã trong tập tin test.py thành các lệnh
        $output = shell_exec($command); // Lấy kết quả trả về biến $output
        $wan_edge = explode(";", $output);

        for($x=0; $x<count($wan_edge); $x++){
            $val = explode(",", $wan_edge[$x]);
            if($val==9){
                DB::table('network')->insert([
                    ['host-name'=>$val[0], 'system-ip'=>$val[1], 'device-model'=>$val[2], 'uuid'=>$val[3], 'state'=>$val[4],
                        'reachability'=>$val[5], 'site-id'=>$val[6], 'version'=>$val[7], 'uptime-date'=>$val[8]],
                ]);
            }
            else{
                DB::table('network')->insert([
                    ['host-name'=>$val[0], 'system-ip'=>$val[1], 'device-model'=>$val[2], 'uuid'=>$val[3], 'state'=>$val[4],
                        'reachability'=>$val[5], 'site-id'=>$val[6], 'controlConnections'=>$val[7], 'version'=>$val[8], 'uptime-date'=>$val[9]],
                ]);
            }
        }
        return Excel::download(new Export , 'network.xlsx');
    }
}
