<?php
header("Content-Type:text/html;charset=utf-8");
$connect = mysqli_connect('127.0.0.1', 'root', '1234', 'cykordb');

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw_confirm = $_POST['password_confirm'];
$date = date('Y-m-d H:i:s');

//id 중복 확인
$query1 = "select * from member where id='$id'";
$result1 = $connect->query($query1);
$exist = mysqli_num_rows($result1);

if ($exist) {      
    ?>
    <script>
        alert('이미 존재하는 ID입니다.');
        history.back();
    </script>
    <?php 
} 
else if($pw != $pw_confirm) {  
    ?>
    <script>
        alert('비밀번호가 일치하지 않습니다.');
        history.back();
    </script>
    <?php 
}
else {
    $query = "insert into member(id, password, date) values('$id', '$pw', '$date')";

    $result = $connect->query($query);

    if ($result) {
        ?> 
        <script>
            alert('회원가입 성공.');
            location.replace("./login.php");
        </script>
        <?php 
    } 
    else {
        ?> 
        <script>
            alert("회원가입 실패");
        </script>
        <?php 
    }
}

mysqli_close($connect);
?>
