@extends('index')
@section('content')
    <div class="row" style="background-color: white; padding: 10px;">
        <b>DASHBOARD</b>&ensp;| NETWORK&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <form action="{{url('network-csv')}}" method="POST">
            @csrf
            <input type="submit" value="Export CSV" name="export_csv" class="btn btn-success">
        </form>

    </div>

    <div class="row" style="padding: 15px 15px 15px 4px; margin-bottom: 75px;">
        <table id="network" style="width: 90%;">
            <thead>
            <tr>
                <th>Hostname</th>
                <th>System IP</th>
                <th>Device Model</th>
                <th>Chassic Number/ID</th>
                <th>State</th>
                <th>Reachability</th>
                <th>Site ID</th>
                <th>Control</th>
                <th>Version</th>
                <th>Up Since</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($x=0; $x<$length; $x++){
                $val = explode(",", $network[$x]);
                echo "<tr>
                    <td>$val[0]</td>
                    <td>$val[1]</td>
                    <td>$val[2]</td>
                    <td>$val[3]</td>
                    <td><img src='../../image/".$val[4].".jpg' style='border-radius: 55px;'></td>
                    <td>$val[5]</td>
                    <td>$val[6]</td>
                    <td>$val[7]</td>
                    <td>$val[8]</td>
                    <td>$val[9]</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#network').DataTable({
                pageLength:5,
            });
        } );
    </script>
@endsection
