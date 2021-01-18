@extends('index')
@section('content')
    <div class="row" style="background-color: white; padding: 10px;">
        <b>DASHBOARD</b>&ensp;| CERTIFICATES</div>

    <div class="row" style="padding: 15px 15px 15px 4px; margin-bottom: 75px;">
        <table id="network" style="width: 90%;">
            <thead>
            <tr>
                <th>vedgeCertificateState</th>
                <th>deviceModel</th>
                <th>chasisNumber</th>
                <th>host-name</th>
                <th>deviceIP</th>
                <th>serialNumber</th>
                <th>validity</th>
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
                    <td>$val[4]</td>
                    <td>$val[5]</td>
                    <td>$val[6]</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#network').DataTable({
                pageLength:7,
            });
        } );
    </script>
@endsection
