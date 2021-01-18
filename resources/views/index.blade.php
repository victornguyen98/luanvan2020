<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../fontawesome/css/brands.css" rel="stylesheet">
    <link href="../fontawesome/css/solid.css" rel="stylesheet">


    <title>Dev Net - Nguyễn Duy Mẫn</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 15px;
            overflow:hidden;
        }
        #menu ul {
            background: #3E3F40;
            width: 78px;
            padding: 0;
            list-style-type: none;
            text-align: left;
        }
        #menu li {
            width: auto;
            height: 50px;
            line-height: 40px;
            padding: 0 1em;
        }
        #menu li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            display: block;
        }
        #menu li:hover {
            background: #CDE2CD;
        }

        /*==Dropdown Menu==*/
        #menu ul li {
            position: relative;
        }
        #menu .sub-menu {
            position: absolute;
            z-index: 99;
            left: 78px;
            top: 0;
            display: none;
            width: 250px;
        }
        #menu li:hover .sub-menu {
            display: block;
        }
        .contain{
            width: 100%;
            height: 700px;
            overflow-y: scroll;
        }
        .left{
            float: left;
            width: 78px;
            background-color: #3E3F40;
            height: 700px;
        }
        .right{
            float: right;
            width:calc(100% - 78px);
            background-color: lightblue;
            height: 700px;
            padding-left: 15px;
            color: #5e6062;
            overflow: auto;
        }
        .list_reboot{
            width: 400px;
            height: 700px;
            position: absolute;
            z-index: 999;
            border-width: 0px 1px 0px 1px;
            border-style: solid;
            display: none;
            background-color: #b6effb;
            margin-left: 965px;
            overflow: scroll;
            padding-bottom: 80px;
        }
        .list_alarm{
            width: 400px;
            height: 700px;
            position: absolute;
            z-index: 999;
            border-width: 0px 1px 0px 1px;
            border-style: solid;
            display: none;
            background-color: #b6effb;
            margin-left: 965px;
            overflow: scroll;
            padding-bottom: 80px;
        }
        .task_reboot{
            width: 90%;
            height: 100px;
            background-color: lightblue;
            margin-left: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="row" style="background-color: #3E3F40; height: 50px; padding: 10px;">
    <div class="col-3">
        <i class="fas fa-align-justify" style="color: #A9A9A9; margin-left: 22px; font-size: 25px;"></i>
        <img src="../image/cisco.jpg" style="margin-top: -50px; margin-left: 67px; height: 50px;">
    </div>
    <div class="col-7"></div>
    <div class="col-1">
        <img id="list_reboot" src="../image/list_reboot.jpg">&emsp;&emsp;
        <img id="alarm" src="../image/alarm.jpg">
    </div>
    <div class="col-1" style="color: #A9A9A9;"><b>Man Duy</b></div>
</div>

<div class="contain">
    <div class="left">
        <div id="menu">
            <ul>
                <li><a href="{{ route("dashboard") }}">&emsp;<img src="../image/dashboard.jpg" width="25px;"></a></li>
                <li style="padding-top: 5px;"><a href="#"><i class="fas fa-tv" style="color: #A9A9A9; font-size: 22px; margin-left: 13px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route("network") }}">Network</a></li>
                        <li><a href="{{ route("alarms") }}">Alarms</a></li>
                        <li><a href="{{ route("events") }}">Events</a></li>
                    </ul>
                </li>
                <li style="padding-top: 5px;"><a href="#"><i class="fas fa-cog" style="color: #A9A9A9; font-size: 22px; margin-left: 13px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route("devices") }}">Devices</a></li>
                        <li><a href="{{ route("certificates") }}">Certificates</a></li>

                        <li><a href="{{ route("templates") }}">Templates</a></li>

                    </ul>
                </li>
                <li style="padding-top: 5px;"><a href="#"><i class="fas fa-tools" style="color: #A9A9A9; font-size: 22px; margin-left: 13px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route("ssh_terminal") }}">SSH Terminal</a></li>
                    </ul>
                </li>
                <li style="padding-top: 5px;"><a href="#"><i class="fas fa-toolbox" style="color: #A9A9A9; font-size: 22px; margin-left: 13px;"></i></a>
                    <ul class="sub-menu">


                        <li><a href="{{ route("device_reboot") }}">Device Reboot</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="right">
        @yield('content')
    </div>
    <div class="list_reboot">
        <div class="row" style="background-color: #343538; color: white; width: 400px; margin-left: 0px; height: 25px;">
            <b id="list_active">Tasks - Active <span id="length_active">(?)</span></b>&emsp;&emsp;&emsp;&emsp;&emsp;
            <b id="list_reboot">Tasks - Completed <span id="length_reboot"></span></b>
        </div>
        <span id="content">
            <div class="task_reboot"></div>
        </span>
    </div>
    <div class="list_alarm">
        <div class="row" style="background-color: #343538; color: white; width: 400px; margin-left: 0px; height: 25px;">
            <b>Alarms - Active <span id="length_alarm">(?)</span></b>
        </div>
        <span id="content_1">
            <div class="task_reboot"></div>
        </span>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#list_reboot").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/reboot_active",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#length_reboot').empty();
                    $('#content').empty();
                    var length =data.length;
                    $('#length_reboot').append('('+length+')');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#content').append(
                            '<div class="task_reboot">' +
                            '<b>'+value[0]+'</b></br>'+
                            'Success : '+value[1]+'</br>'+
                            'Start: '+setDate(parseInt(value[2]))+'</br>'+
                            'By : '+value[3]+'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'+
                            'From : '+value[4]+'</br>'+
                            '</div>');
                    }
                }
            });
            $(".list_reboot").toggle();
        });
        $("#list_active").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/reboot_active",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#length_active').empty();
                    $('#content').empty();
                    var length =0;
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        if(value[5]=='in_progress'){
                            length = length + 1;
                            $('#content').append(
                                '<div class="task_reboot">' +
                                '<b>'+value[0]+'</b></br>'+
                                'Success : '+value[1]+'</br>'+
                                'Start: '+setDate(parseInt(value[2]))+'</br>'+
                                'By : '+value[3]+'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'+
                                'From : '+value[4]+'</br>'+
                                '</div>');
                        }
                    }
                    $('#length_active').append('('+length+')');
                }
            });
            $(".list_reboot").css("display", "block");
        });
        $("#alarm").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/alarm",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#length_alarm').empty();
                    $('#length_alarm').append(data.length);
                    $('#content_1').empty();
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#content_1').append(
                            '<div class="task_reboot">' +
                            '<b>'+value[0]+'</b></br>'+
                            'System id : '+value[1]+'</br>'+
                            'Host name: '+value[2]+'</br>'+
                            'Start time : '+setDate(parseInt(value[3]))+'&emsp;&emsp;&emsp;'+
                            '<i style="color: red;">'+value[4]+'</i>'+
                            '</div>');
                    }
                }
            });
            $(".list_alarm").toggle();
        });
    });
    function setDate($vl){
        let current_datetime = new Date($vl)
        let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds()
        return formatted_date;
    }
</script>
</body>
</html>
