<?php
header("Content-Type:text/html;charset=utf-8");
$connect = mysqli_connect('127.0.0.1', 'root', '1234', 'cykordb');
$number = $_GET['number']; 
$query = "select id from board where number = $number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$userid = $rows['id'];

session_start();

$URL = "./index.php";
if (!isset($_SESSION['userid'])) {
    ?> 
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>

    <?php 
} 
else if ($_SESSION['userid'] == $userid) {
    $query1 = "delete from board where number = $number";
    $result1 = $connect->query($query1); ?>
    <script>
        alert("게시글이 삭제되었습니다.");
        location.replace("<?php echo $URL ?>");
    </script>

    <?php 
} 
else { 
    ?>
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
    <?php 
}
?>
