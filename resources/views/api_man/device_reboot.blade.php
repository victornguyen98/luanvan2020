@extends('index')
@section('content')
    <script>
        function setDate($vl){
            let current_datetime = new Date($vl)
            let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds()
            return formatted_date;
        }
    </script>
    <div class="row" style="background-color: white; padding: 10px;">
        <b>DASHBOARD</b>&ensp;| DEVICE REBOOT
    </div>

    <div class="row" style="padding: 15px 15px 15px 4px; margin-bottom: 75px;">
        <table id="reboot" style="width: 1200px;margin-left: 30px;" >
            <thead>
            <tr>
                <th></th>
                <th>Hostname</th>
                <th>System IP</th>
                <th>Chassic Number/ID</th>
                <th>Site ID</th>
                <th>Device Model</th>
                <th>Reachability</th>
                <th>Up Since</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($x=0; $x<$length; $x++){
                $val = explode(",", $reboot[$x]);
                echo "<tr>
                    <td><button>Reboot</button></td>
                    <td>$val[0]</td>
                    <td>$val[1]</td>
                    <td>$val[2]</td>
                    <td>$val[3]</td>
                    <td>$val[4]</td>
                    <td>$val[5]</td>
                    <td><script>
                        document.write(setDate(".$val[6]."));
                   </script></td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            var table = $('#reboot').DataTable({
                pageLength:5,
            });
            $('#reboot tbody tr').on('click', 'td:eq(0)', function () {
                var data = table.row( this ).data();
                var mot = data[1];
                var hai = data[2];
                var ba = data[3];
                var bon = data[4];
                var nam = data[5];
                var sau = data[6];
                var bay = data[7];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/device_report",
                    type: 'GET',
                    dataType : "json",
                    data: {
                        mot : mot,
                        hai : hai,
                        ba : ba,
                        bon : bon,
                        nam : nam,
                        sau : sau,
                        bay : bay,
                    },
                    success: function (data) {
                        alert(data.success);
                    }
                });
            } );
        } );
    </script>
@endsection
