<div class="content">
    <img src="../image/logo.jpg" height="320px;" width="80%">
    <form method="post">
        <h1 style="color: white;">Login</h1>
        <input name="email" placeholder="Nhập Email" type="email" required="">
        <input name="password" placeholder="Nhập Password" type="password" required="">
        <input type="submit" value="Đăng Nhập">
        {{ csrf_field() }}
    </form>
</div>
<style type="text/css">
    *{
        margin: 0 auto;
    }
    body{
        background-color: #084298;
    }
    .content{
        width: 500px;
        height: 500px;
        border-radius: 15px;
        background-color: #084298;
        text-align: center;
        padding: 20px;
        margin-top: 50px;
    }
    input{
        height: 40px;
        width: 80%;
        margin-bottom: 10px;
    }
    input[type=submit]:hover{
        background-color: lightblue;
    }
</style>
