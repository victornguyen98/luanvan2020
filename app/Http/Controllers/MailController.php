<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send_mail(Request $request){
        $host_name = $request->input('host_name');
        $system = $request->input('system');
        $reboot_time = $request->input('reboot_time');
        $reboot_reason = $request->input('reboot_reason');
        $to_name = "Man Duy API";
        $to_email = "manduynguyen147@gmail.com";//send to this email

        $data = array("name"=>"Man Duy API",
            "body"=>"Mail thông báo Reboot",
            "host_name"=>$host_name,
            "system"=>$system,
            "reboot_time"=>$reboot_time,
            "reboot_reason"=>$reboot_reason); //body of mail.blade.php

                Mail::send('send_mail',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Mail thông báo Reboot');//send this mail with subject
                    $message->from($to_email,$to_name);
                });
        return response()->json(['success'=>'Đang Reboot, Vui lòng chờ tí!']);
    }
}
