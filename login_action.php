<?php
session_start();

$connect = mysqli_connect("127.0.0.1", "root", "1234", "cykordb");

$id = $_POST['id'];
$pw = $_POST['pw'];

$query = "select * from member where id='$id'";
$result = $connect->query($query);


if (mysqli_num_rows($result)) {

    $row = mysqli_fetch_assoc($result);

    if ($row['password'] == $pw) {   
        $_SESSION['userid'] = $id;
        if (isset($_SESSION['userid'])) {
            ?> 
            <script>
                location.replace("./index.php");
            </script>
            <?php
        } 
        else {
            echo "세션 만료";
        }
    } 
    else {
        ?> 
        <script>
            alert("아이디 또는 비밀번호를 확인해주세요.");
            history.back(); 
        </script>
    <?php
    }
} 
else {
    ?> 
    <script>
        alert("아이디 또는 비밀번호를 확인해주세요.");
        history.back();
    </script>
    <?php
}
?>