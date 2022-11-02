<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <style>
        td {
            border-width:1px 1px 2px;
            border-style:solid;
        }
        .read_table {
            border-width:1px 1px 2px;
            border-style:solid;
        }
        .read_title {
            height: 45px;
            font-size: 25px;
            text-align: center;
            width: 1000px; 
        }
        .read_name {
            text-align: center;
            width: 100px;
            height: 35px;
        }
        .name {
            width: 100px;
            height: 35px;
            padding-left: 10px; 
        }
        .read_content {
            padding: 10px;
            border: 1px solid;
            height: 500px; 
            vertical-align:top;
        } 
        .btn {
            width: 700px;
            height: 200px;
            text-align: center;
            padding-left: 450px;
        }
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', '1234', 'cykordb');
    $number = $_GET['number'];  // GET 방식 사용
    session_start();
    $query = "select title, content, date, id from board where number = $number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);

    $title = $rows['title'];
    $content = $rows['content'];
    $userid = $rows['id'];

    if (isset($_SESSION['userid'])) {
      ?>
      <button onclick="location.href='./logout_action.php'" style="float:right; font-size:15px;">로그아웃</button>
      <?php
    } 
    else {
      ?>
      <button onclick="location.href='./login.php'" style="float:right; font-size:15px;">로그인</button>
      <?php
    }
    ?>
    <br></br>
     <table class="read_table" align=center>
        <tr>
            <td class="title" style="text-align:center">제목</td>
            <td class="read_title"><?php echo $title ?></td>
        </tr>
        <tr>
            <td class="name" style="text-align:center">작성자</td>
            <td class="read_name"><?php echo $userid ?></td>
        </tr>
        <tr>
            <td class="content" style="text-align:center">내용</td>
            <td class="read_content"><?php echo $content ?></td>
        </tr>
    </table>

    <div class="btn">
        <button class="content_btn" onclick="location.href='./index.php'" style="margin:auto; font-size:30px;">목록</button>
        <?php
        if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?>
            <button onclick="location.href='./update.php?number=<?= $number ?>'" style="margin:auto; font-size:30px;">수정</button>
            <button onclick="location.href='./delete.php?number=<?= $number ?>'" style="margin:auto; font-size:30px;">삭제</button>
            <?php 
        } 
        ?>
    </div>
</body>

</html>