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
            margin: 10px 450px;
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
    

    session_start();
    $URL = "./login.php";
    if (!isset($_SESSION['userid'])) {
        ?>
        <script>
            alert("로그인이 필요합니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php
    }
    ?>

    <form method="post" action="write_action.php">
        <table align=center width=auto>
            <tr>
                <td>
                    <p style="font-size:25px; text-align:center;"><b>글 작성</b></p>
                </td>
            </tr>
            <
            <tr>
                <table class="table2">
                    <tr>
                        <td>name</td>
                        <td><input type="hidden" name="name" value="<?= $_SESSION['userid'] ?>"><?= $_SESSION['userid'] ?></td>
                    </tr>
                    <tr>
                        <td>title</td>
                        <td><input type=text name=title size=80></td>
                    </tr>
                    <tr>
                        <td>content</td>
                        <td><textarea name=content cols=75 rows=20></textarea></td>
                    </tr>
                </table>
            </tr>
            <input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>">
        </table>
        <center>
            <input style="font-size:30px;" type="submit" value="작성">
        </center>
    </form>
</body>

</html>