<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
</head>

<body>
    <div align='center'>
        <span>
            <p style="font-size: 25px;"><b>로그인</b></p>
        </span>

        <form method='post' action='login_action.php'>
            <p>ID  <input name="id" type="text"></p>
            <p>PW  <input name="pw" type="password"></p>
            <input type="submit" value="로그인">
        </form>
        <br>
        <button id="register" onclick="location.href='./register.php'">회원가입</button>

    </div>
</body>

</html>