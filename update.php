<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            line-height: 1.5;
            border-top: 2px solid;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            border-bottom: 2px solid;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            border-bottom: 2px solid;
        }

    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', '1234', 'cykordb');
    $number = $_GET['number'];
    $query = "select title, content, date, id from board where number = $number";
    $result = $connect->query($query);

    $rows = mysqli_fetch_assoc($result);

    $title = $rows['title'];
    $content = $rows['content'];
    $userid = $rows['id'];

    session_start();

    $URL = "./index.php";

    if ($_SESSION['userid'] == $userid) {
        ?>
        <form method="POST" action="update_action.php">
            <table align=center>
                <tr>
                    <td>
                        <p style="font-size:25px; text-align:center;"><b>수정</b></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>"><?= $_SESSION['userid'] ?></td>
                            </tr>

                            <tr>
                                <td>제목</td>
                                <td><input type=text name=title size=87 value="<?= $title ?>"></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td><textarea name=content cols=75 rows=15><?= $content ?></textarea></td>
                            </tr>

                        </table>

                        <center>
                            <input type="hidden" name="number" value="<?= $number ?>">
                            <input style=" font-size:16px;" type="submit" value="작성">
                        </center>
                    </td>
                </tr>
            </table>
        </form>
        <?php   
    } 
    else {
        ?> 
        <script>
            alert("권한이 없습니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php   }
    ?>
</body>

</html>