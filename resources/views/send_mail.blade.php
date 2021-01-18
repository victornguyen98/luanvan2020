<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gửi mail thông báo Reboot</title>
</head>
<body>
    <h1>Mail được gửi từ : {{ $name }}</h1>
    <span>Với nội dung là : {{ $body }}<br>
        Host name : {{ $host_name }}<br>
        System : {{ $system }}<br>
        Reboot time : {{ $reboot_time }}<br>
        Reboot reason : {{ $reboot_reason }}
    </span>
</body>
</html>
