@extends('index')
@section('content')
    <div class="row" style="background-color: white; padding: 10px;">
        <b>DASHBOARD</b>&ensp;| SORFWARE UPGRADE</div>

    <div class="row" style="padding: 15px 15px 15px 4px; margin-bottom: 75px;">
        <table id="network" style="width: 90%;">
            <thead>
            <tr>
                <th></th>
                <th>Hostname</th>
                <th>System ID</th>
                <th>Chassis Number</th>
                <th>Site ID</th>
                <th>Device Model</th>
                <th>Reachbility</th>
                <th>Current Version</th>
                <th>Default Version</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($x=0; $x<$length; $x++){
                $val = explode(",", $network[$x]);
                echo "<tr>
                    <td></td>
                    <td>$val[0]</td>
                    <td>$val[1]</td>
                    <td>$val[2]</td>
                    <td>$val[3]</td>
                    <td>$val[4]</td>
                    <td>$val[5]</td>
                    <td>$val[6]</td>
                    <td>$val[7]</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#network').DataTable();
        } );
    </script>
@endsection
