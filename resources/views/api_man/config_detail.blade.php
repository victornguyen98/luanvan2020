@extends('index')
@section('content')
    <div class="row" style="background-color: white; padding: 10px;">
        <b>DASHBOARD</b>&ensp;| CONFIG UPGRADE
    </div>
    <?php
        $val = explode(",", $data);
    ?>
    <div class="row" style="margin-bottom: 50px;">
        <table align="center">
            <form action="{{ route('config_ne') }}" method="get">
                <tr>
                    <td colspan="2">Variable List (Hover over each field for more information)</td>
                </tr>
                <tr>
                    <td>Chassis Number</td>
                    <td>{{ $val[0] }}</td>
                </tr>
                <tr>
                    <td>System IP</td>
                    <td>{{ $val[1] }}</td>
                </tr>
                <tr>
                    <td>Hostname</td>
                    <td>{{ $val[2] }}</td>
                </tr>
                <tr>
                    <td>Hostname(system_host_name)</td>
                    <td><input type="text" value="{{ $val[3] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td> System IP(system_system_ip)</td>
                    <td><input type="text" value="{{ $val[4] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Site ID(system_site_id)</td>
                    <td><input type="text" value="{{ $val[5] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Interface Name(vpn_1_if_name)</td>
                    <td><input type="text" value="{{ $val[6] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Description(vpn_1_if_description)</td>
                    <td><input type="text" value="{{ $val[7] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>IPv4 Address(vpn_1_if_ipv4_address)</td>
                    <td><input type="text" value="{{ $val[8] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Address(vpn_512_next_hop_ip_address)</td>
                    <td><input type="text" value="{{ $val[9] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td> Interface Name(vpn_512_if_name)</td>
                    <td><input type="text" value="{{ $val[10] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Description(vpn_512_if_description)</td>
                    <td><input type="text" value="{{ $val[11] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>IPv4 Address(vpn_512_if_ipv4_address)</td>
                    <td><input type="text" value="{{ $val[12] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Address(vpn_0_next_hop_ip_address)</td>
                    <td><input type="text" value="{{ $val[13] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Address(public_internet_vpn_0_next_hop_ip_address)</td>
                    <td><input type="text" value="{{ $val[14] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Interface Name(internet_vpn_0_if_name)</td>
                    <td><input type="text" value="{{ $val[15] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Description(internet_vpn_0_if_description)</td>
                    <td><input type="text" value="{{ $val[16] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>IPv4 Address(internet_vpn_0_if_ipv4_address)</td>
                    <td><input type="text" value="{{ $val[17] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Interface Name(vpn_0_if_name)</td>
                    <td><input type="text" value="{{ $val[18] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Description(vpn_0_if_description)</td>
                    <td><input type="text" value="{{ $val[19] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>IPv4 Address(vpn_0_if_ipv4_address)</td>
                    <td><input type="text" value="{{ $val[20] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Latitude(system_latitude)</td>
                    <td><input type="text" value="{{ $val[21] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>Longitude(system_longitude)</td>
                    <td><input type="text" value="{{ $val[22] }}" style="width: 100%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Upgrade!"></td>
                </tr>
            </form>
        </table>
    </div>
    <br><br>
@endsection
