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
        <b>DASHBOARD</b>&ensp;| CERTIFICATES</div>

    <div class="row" style="padding: 15px 15px 15px 4px; margin-bottom: 75px;">
        <table id="network" style="width: 100%;">
            <thead>
            <tr>
                <th>templateDescription</th>
                <th>templateDescription</th>
                <th>deviceType</th>
                <th>templateAttached</th>
                <th>devicesAttached</th>
                <th>lastUpdatedBy</th>
                <th>lastUpdatedOn</th>
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
            $('#network').DataTable({
                pageLength:7,
            });
        } );
    </script>
@endsection
