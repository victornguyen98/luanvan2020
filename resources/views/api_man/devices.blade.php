@extends('index')
@section('content')
    <div class="row" style="background-color: white; padding: 10px;">
        <b>DASHBOARD</b>&ensp;| DEVICES
    </div>

    <div class="row" style="padding: 15px 15px 15px 4px; margin-bottom: 75px;">
        <table id="devices" style="width: 100%;">
            <thead>
            <tr>
                <th>State</th>
                <th>Device Model</th>
                <th>Chassic Number/ID</th>
                <th>Serial No./Token</th>
                <th>Enterprise Cert Serial No</th>
                <th>Enterprise Cert Expiration Date</th>
                <th>Hostname</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($x=0; $x<$length; $x++){
                $val = explode(",", $device[$x]);
                if(count($val)==7){
                    if($val[6]!=''){
                        echo "<tr>
                            <td>$val[0]</td>
                            <td>$val[1]</td>
                            <td>$val[2]</td>
                            <td>$val[3]</td>
                            <td>$val[4]</td>
                            <td>$val[5]</td>
                            <td>$val[6]</td>
                            <td><button id='config".($x+1)."'>Config</button><button id='change'>Change</button></td>
                        </tr>";
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 900px; margin-left: -250px;">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="content"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#devices').DataTable();
            $("#config1").click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/config",
                    type: 'GET',
                    dataType : "json",
                    success: function (data) {
                        $('#config1').attr('data-toggle','modal');
                        $('#config1').attr('data-target','#myModal');
                        $('#content').empty();
                        $('#content').append(data.success);
                    }
                });

            });
            $("#config2").click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/config_2",
                    type: 'GET',
                    dataType : "json",
                    success: function (data) {
                        $('#config2').attr('data-toggle','modal');
                        $('#config2').attr('data-target','#myModal');
                        $('#content').empty();
                        $('#content').append(data.success);
                    }
                });

            });
            $("#config3").click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/config_3",
                    type: 'GET',
                    dataType : "json",
                    success: function (data) {
                        $('#config3').attr('data-toggle','modal');
                        $('#config3').attr('data-target','#myModal');
                        $('#content').empty();
                        $('#content').append(data.success);
                    }
                });

            });
            $("#config9").click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/config_4",
                    type: 'GET',
                    dataType : "json",
                    success: function (data) {
                        $('#config9').attr('data-toggle','modal');
                        $('#config9').attr('data-target','#myModal');
                        $('#content').empty();
                        $('#content').append(data.success);
                    }
                });

            });
            $("#change").click(function () {
                window.location="http://127.0.0.1:8000/config_real";
            });
        } );
    </script>
@endsection
