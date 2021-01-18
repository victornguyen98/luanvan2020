@extends('index')
@section('content')
<style>
    .task{
        width: 100%;
        display: inline;
        background-color: white;
        height: 100px;
        padding: 10px;
    }
    .task_1{
        height: 250px;
        width: 100%;
        margin: 0px 10px 15px 0px;
        background-color: white;
    }
    .hr{
        height: 5px;
        width: 100%;
        background-color: lightblue;
    }
    .left_db{
        width: 30%;
        height: 80px;
        float: left;
    }
    .right_db{
        width: 70%;
        height: 80px;
        float: right;
    }
</style>
<div class="row" style="background-color: white; padding: 10px;">
    <b>DASHBOARD</b>&ensp;| MAIN DASHBOARD
</div>
<br><br>

<div class="row" style="padding: 15px 15px 15px 4px;">
    <div class="col-12" style="display: flex;">
        <div class="task">
            <div class="left_db" style="background-image: url('../image/1.jpg'); background-size: cover; width: 60px; height: 60px;"></div>
            <div class="right_db" id="vsmart"><h4>{{ $vsmart }}</h4>Vsmart - {{ $vsmart }}</div>
        </div>
        <div class="task" style=" margin-left: 15px;">
            <div class="left_db" style="background-image: url('../image/2.jpg'); background-size: cover; width: 60px; height: 60px;"></div>
            <div class="right_db" id="wan_edge"><h4>{{ $wan_edge }}</h4>Wan Edge - {{ $wan_edge }}</div>
        </div>
        <div class="task" style="margin-left: 15px;">
            <div class="left_db" style="background-image: url('../image/3.jpg'); background-size: cover; width: 60px; height: 60px;"></div>
            <div class="right_db" id="vbound"><h4>{{ $vbound }}</h4>Vbound - {{ $vbound }}</div>
        </div>
        <div class="task" style="margin-left: 15px;">
            <div class="left_db"><b>REBOOT </b><br>Last 24h</div>
            <div class="right_db" id="reboot"><h1>{{ $reboot }}</h1></div>
        </div>
    </div>
</div><br><br>

<div class="row" style="padding: 0px 15px 0px 2px;">
    <div class="col-4">
        <div class="task_1">
            <div class="header" style="background-color: #6574cd; height: 50px;"><b>Control Status (Total 4)</b></div>
            <span id="control_up">Control Up&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            {{ $control[0] }}</span>
            <div class="hr">
                <hr align="left" style="width: <?php echo $control[0]/4*100 ?>%; height: 5px; background-color: limegreen;">
            </div><br>

            Partial&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            {{ $control[1] }}
            <div class="hr">
                <hr align="left" style="width: <?php echo $control[1]/4*100 ?>%; height: 5px; background-color: #bb2d3b">
            </div><br>

            Control Down&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            {{ $control[2] }}
            <div class="hr">
                <hr align="left" style="width: <?php echo (int)$control[2]/4*100 ?>%; height: 5px; background-color: #bb2d3b">
            </div><br>
        </div>
    </div>
    <div class="col-4">
        <div class="task_1">
            <div class="header" style="background-color: #6574cd; height: 50px;"><b>WAN Edge Health (Total 4)</b></div>
            <table style="width: 100%; text-align: center;">
                <tr>
                    <td>Normal</td>
                    <td>Warning</td>
                    <td>Error</td>
                </tr>
                <tr>
                    <td><br>
                        <div style="height: 100px; width: 100px; border-radius: 50%; border: 2px solid #73AD21;">
                            <br><br><span style="margin-left: 12px;" id="normal">{{ $health[0] }}</span>
                        </div>
                    </td>
                    <td><br>
                        <div style="height: 100px; width: 100px; border-radius: 50%; border: 2px solid #73AD21;">
                            <br><br><span style="margin-left: 12px;">{{ $health[1] }}</span>
                        </div>
                    </td>
                    <td><br>
                        <div style="height: 100px; width: 100px; border-radius: 50%; border: 2px solid #73AD21;">
                            <br><br><span style="margin-left: 12px;">{{ $health[2] }}</span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-4">
        <div class="task_1">
            <div class="header" style="background-color: #6574cd; height: 50px;"><b>WAN Edge Inventory</b></div>
            Total&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
            <span id="we_total">{{ $inven[0] }}</span><hr>

            Authorized&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <span id="we_author">{{ $inven[1] }}</span><hr>

            Deployed&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
            <span id="we_deloy">{{ $inven[2] }}</span><hr>

            Staging&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ $inven[3] }}<hr>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_vsmart" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Reachability</th>
                            <th>Hostname</th>
                            <th>System_IP</th>
                            <th>Site_ID</th>
                            <th>Device_Model</th>
                            <th>Version</th>
                            <th>Chassis_Number/ID</th>
                            <th>Serial_Number</th>
                            <th>Last_Updated</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_wan_edge" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Reachability</th>
                            <th>Hostname</th>
                            <th>System_IP</th>
                            <th>Site_ID</th>
                            <th>Device_Model</th>
                            <th>Version</th>
                            <th>Chassis_Number/ID</th>
                            <th>Serial_Number</th>
                            <th>Last_Updated</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_vbound" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Reachability</th>
                            <th>Hostname</th>
                            <th>System_IP</th>
                            <th>Site_ID</th>
                            <th>Device_Model</th>
                            <th>Version</th>
                            <th>Chassis_Number/ID</th>
                            <th>Serial_Number</th>
                            <th>Last_Updated</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_3" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_control_up" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Hostname</th>
                            <th>Reachability</th>
                            <th>System_IP</th>
                            <th>Site_ID</th>
                            <th>Device_Model</th>
                            <th>Control Connections</th>
                            <th>Last_Updated</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_4" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_normal" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Hostname</th>
                            <th>Reachability</th>
                            <th>System_IP</th>
                            <th>Site_ID</th>
                            <th>Device_Model</th>
                            <th>Memory % (Last 1 hour)</th>
                            <th>Hardware</th>
                            <th>Last_Updated</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_5" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Reboot History</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_reboot" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Hostname</th>
                            <th>System IP</th>
                            <th>Reboot time</th>
                            <th>Reboot reason</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_6" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Wan Ege</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_we" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Hostname</th>
                            <th>System IP</th>
                            <th>Site ID</th>
                            <th>Validity</th>
                            <th>Chassis Number/Unique ID</th>
                            <th>Serial Number</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_7" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Wan Ege</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_we_1" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Hostname</th>
                            <th>System IP</th>
                            <th>Site ID</th>
                            <th>Validity</th>
                            <th>Chassis Number/Unique ID</th>
                            <th>Serial Number</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal_8" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 1100px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Wan Ege</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="table_we_2" width="100%" cellspacing="0" border="1">
                        <tr>
                            <th>Hostname</th>
                            <th>System IP</th>
                            <th>Site ID</th>
                            <th>Validity</th>
                            <th>Chassis Number/Unique ID</th>
                            <th>Serial Number</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#vsmart").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/vsmart_detail",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    var d = new Date(data.success[8]);
                    $('#table_vsmart').empty();
                    $('#table_vsmart').append(
                    '<tr>'+
                        '<th>Reachability</th>'+
                        '<th>Hostname</th>'+
                        '<th>System_IP</th>'+
                        '<th>Site_ID</th>'+
                        '<th>Device_Model</th>'+
                        '<th>Version</th>'+
                        '<th>Chassis_Number/ID</th>'+
                        '<th size="20">Serial_Number</th>'+
                        '<th>Last_Updated</th>'+
                    '</tr>'+
                    '<tr>' +
                        '<td>'+data.success[0]+'</td>' +
                        '<td>'+data.success[1]+'</td>' +
                        '<td>'+data.success[2]+'</td>' +
                        '<td>'+data.success[3]+'</td>' +
                        '<td>'+data.success[4]+'</td>' +
                        '<td>'+data.success[5]+'</td>' +
                        '<td>'+data.success[6]+'</td>' +
                        '<td style="overflow: hidden:">'+data.success[7]+'</td>' +
                        '<td>'+setDate(parseInt(data.success[8]))+'</td>' +
                    '</tr>');
                    $('#vsmart').attr('data-toggle','modal');
                    $('#vsmart').attr('data-target','#myModal');
                }
            });

        });
        $("#wan_edge").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/wan_edge_detail",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_wan_edge').empty();
                    $('#table_wan_edge').append(
                        '<tr>'+
                            '<th>Reachability</th>'+
                            '<th>Hostname</th>'+
                            '<th>System_IP</th>'+
                            '<th>Site_ID</th>'+
                            '<th>Device_Model</th>'+
                            '<th>Version</th>'+
                            '<th>Chassis_Number/ID</th>'+
                            '<th size="20">Serial_Number</th>'+
                            '<th>Last_Updated</th>'+
                        '</tr>');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#table_wan_edge').append(
                            '<tr>'+
                                '<td>'+value[0]+'</td>'+
                                '<td>'+value[1]+'</td>'+
                                '<td>'+value[2]+'</td>'+
                                '<td>'+value[3]+'</td>'+
                                '<td>'+value[4]+'</td>'+
                                '<td>'+value[5]+'</td>'+
                                '<td>'+value[6]+'/ID</td>'+
                                '<td size="20">'+value[7]+'</td>'+
                                '<td>'+setDate(parseInt(value[8]))+'</td>'+
                            '</tr>');
                    }
                    $('#wan_edge').attr('data-toggle','modal');
                    $('#wan_edge').attr('data-target','#myModal_1');
                }
            });

        });
        $("#vbound").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/vbound_detail",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_vbound').empty();
                    $('#table_vbound').append(
                        '<tr>'+
                            '<th>Reachability</th>'+
                            '<th>Hostname</th>'+
                            '<th>System_IP</th>'+
                            '<th>Site_ID</th>'+
                            '<th>Device_Model</th>'+
                            '<th>Version</th>'+
                            '<th>Chassis_Number/ID</th>'+
                            '<th size="20">Serial_Number</th>'+
                            '<th>Last_Updated</th>'+
                        '</tr>'+
                    '<tr>' +
                    '<td>'+data.success[0]+'</td>' +
                    '<td>'+data.success[1]+'</td>' +
                    '<td>'+data.success[2]+'</td>' +
                    '<td>'+data.success[3]+'</td>' +
                    '<td>'+data.success[4]+'</td>' +
                    '<td>'+data.success[5]+'</td>' +
                    '<td>'+data.success[6]+'</td>' +
                    '<td style="overflow: hidden:">'+data.success[7]+'</td>' +
                    '<td>'+setDate(parseInt(data.success[8]))+'</td>' +
                    '</tr>');
                    $('#vbound').attr('data-toggle','modal');
                    $('#vbound').attr('data-target','#myModal_2');
                }
            });

        });
        $("#control_up").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/control_up",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_control_up').empty();
                    $('#table_control_up').append(
                        '<tr>'+
                        '<th>Hostname</th>'+
                        '<th>Reachability</th>'+
                        '<th>System_IP</th>'+
                        '<th>Site_ID</th>'+
                        '<th>Device_Model</th>'+
                        '<th>Control Connections</th>'+
                        '<th>Last_Updated</th>'+
                        '</tr>');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#table_control_up').append(
                            '<tr>'+
                            '<td>'+value[0]+'</td>'+
                            '<td>'+value[1]+'</td>'+
                            '<td>'+value[2]+'</td>'+
                            '<td>'+value[3]+'</td>'+
                            '<td>'+value[4]+'</td>'+
                            '<td>'+value[5]+'</td>'+
                            '<td>'+setDate(parseInt(value[6]))+'</td>'+
                            '</tr>');
                    }
                    $('#control_up').attr('data-toggle','modal');
                    $('#control_up').attr('data-target','#myModal_3');
                }
            });

        });
        $("#normal").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/normal",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_normal').empty();
                    $('#table_normal').append(
                        '<tr>'+
                        '<th>Hostname</th>'+
                        '<th>Reachability</th>'+
                        '<th>System_IP</th>'+
                        '<th>Site_ID</th>'+
                        '<th>Device_Model</th>'+
                        '<th>Memory % (Last 1 hour)</th>'+
                        '<th>Hardware</th>'+
                        '<th>Last_Updated</th>'+
                        '</tr>');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#table_normal').append(
                            '<tr>'+
                            '<td>'+value[0]+'</td>'+
                            '<td>'+value[1]+'</td>'+
                            '<td>'+value[2]+'</td>'+
                            '<td>'+value[3]+'</td>'+
                            '<td>'+value[4]+'</td>'+
                            '<td>'+value[5]+'</td>'+
                            '<td>'+value[6]+'</td>'+
                            '<td>'+setDate(parseInt(value[7]))+'</td>'+
                            '</tr>');
                    }
                    $('#normal').attr('data-toggle','modal');
                    $('#normal').attr('data-target','#myModal_4');
                }
            });

        });
        $("#reboot").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/reboot_detail",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_reboot').empty();
                    $('#table_reboot').append(
                        '<tr>'+
                            '<th>Hostname</th>'+
                            '<th>System IP</th>'+
                            '<th>Reboot time</th>'+
                            '<th>Reboot reason</th>'+
                        '</tr>');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#table_reboot').append(
                            '<tr>'+
                                '<td>'+value[0]+'</td>'+
                                '<td>'+value[1]+'</td>'+
                                '<td>'+value[2]+'</td>'+
                                '<td>'+value[3]+'</td>'+
                            '</tr>');
                    }
                    $('#reboot').attr('data-toggle','modal');
                    $('#reboot').attr('data-target','#myModal_5');
                }
            });

        });
        $("#we_total").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/we_total",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_we').empty();
                    $('#table_we').append('' +
                        '<tr>\n' +
                        '                            <th>Hostname</th>\n' +
                        '                            <th>System IP</th>\n' +
                        '                            <th>Site ID</th>\n' +
                        '                            <th>Validity</th>\n' +
                        '                            <th>Chassis Number/Unique ID</th>\n' +
                        '                            <th>Serial Number</th>\n' +
                        '                        </tr>');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#table_we').append(
                            '<tr>'+
                            '<td>'+value[0]+'</td>'+
                            '<td>'+value[1]+'</td>'+
                            '<td>'+value[2]+'</td>'+
                            '<td>'+value[3]+'</td>'+
                            '<td>'+value[4]+'</td>'+
                            '<td>'+value[5]+'</td>'+
                            '</tr>');
                    }
                    $('#we_total').attr('data-toggle','modal');
                    $('#we_total').attr('data-target','#myModal_6');
                }
            });

        });

        $("#we_author").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/we_author",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_we_1').empty();
                    $('#table_we_1').append('' +
                        '<tr>\n' +
                        '                            <th>Hostname</th>\n' +
                        '                            <th>System IP</th>\n' +
                        '                            <th>Site ID</th>\n' +
                        '                            <th>Validity</th>\n' +
                        '                            <th>Chassis Number/Unique ID</th>\n' +
                        '                            <th>Serial Number</th>\n' +
                        '                        </tr>');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#table_we_1').append(
                            '<tr>'+
                            '<td>'+value[0]+'</td>'+
                            '<td>'+value[1]+'</td>'+
                            '<td>'+value[2]+'</td>'+
                            '<td>'+value[3]+'</td>'+
                            '<td>'+value[4]+'</td>'+
                            '<td>'+value[5]+'</td>'+
                            '</tr>');
                    }
                    $('#we_author').attr('data-toggle','modal');
                    $('#we_author').attr('data-target','#myModal_7');
                }
            });

        });

        $("#we_deloy").click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/we_deloy",
                type: 'GET',
                dataType : "json",
                success: function (data) {
                    $('#table_we_2').empty();
                    $('#table_we_2').append('' +
                        '<tr>\n' +
                        '                            <th>Hostname</th>\n' +
                        '                            <th>System IP</th>\n' +
                        '                            <th>Site ID</th>\n' +
                        '                            <th>Validity</th>\n' +
                        '                            <th>Chassis Number/Unique ID</th>\n' +
                        '                            <th>Serial Number</th>\n' +
                        '                        </tr>');
                    var x;
                    for(x=0; x<data.length; x++){
                        var value = data.success[x].split(',');
                        $('#table_we_2').append(
                            '<tr>'+
                            '<td>'+value[0]+'</td>'+
                            '<td>'+value[1]+'</td>'+
                            '<td>'+value[2]+'</td>'+
                            '<td>'+value[3]+'</td>'+
                            '<td>'+value[4]+'</td>'+
                            '<td>'+value[5]+'</td>'+
                            '</tr>');
                    }
                    $('#we_deloy').attr('data-toggle','modal');
                    $('#we_deloy').attr('data-target','#myModal_8');
                }
            });

        });
    });
    function setDate($vl){
        let current_datetime = new Date($vl)
        let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds()
        return formatted_date;
    }
</script>
    @endsection
