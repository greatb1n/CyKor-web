<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
</head>

<body>
    <div align="center">
        <span>
            <p style="font-size: 25px;"><b>회원가입</b></p>
        </span>

        <form method='post' action='register_action.php'>
            <p style="padding-left: 10px;">ID  <input name="id" type="text" required></p>
            <p>PW  <input name="pw" type="password"  required></p>
            <p  style="padding-left: -50px;">PW 확인 <input name="password_confirm" type="password" required></p>
            <br></br>
            <input type="submit" value="가입">
        </form>
    </div>
</body>

</html>