<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        table {
          height:30px;
          border-width:1px 1px 2px;
          border-style:solid;
          border-color:#29367c;
          vertical-align:middle;
          text-align:center;
          border-collapse: initial;
        }
        th {
          height:30px;
          border-width:1px 1px 0;
          border-style:solid;
          border-color:#29367c;
          vertical-align:middle;
          text-align:center;
          border-collapse: initial;
        }

        tr {
          height:30px;
          border-width:1px 1px 0;
          border-style:solid;
          border-color:#29367c;
          vertical-align:middle;
          text-align:center;
          border-collapse: initial;
        }

        td {
          height:30px;
          border-width:1px 1px 0;
          border-style:solid;
          border-color:#29367c;
          vertical-align:middle;
          text-align:center;
          border-collapse: collapse;
        }

        .text {
          height:30px;
          border-width:1px 0 0;
          border-color:#29367c;
          vertical-align:middle;
          text-align:center;
          border-collapse: collapse;
        }

        .text:hover {
            border-collapse: collapse;
        }

        a:link {
            color: #57A0EE;
        }

        a:hover {
            border-collapse: collapse;
        }
    </style>
</head>
<?php
    $connect = mysqli_connect('127.0.0.1', 'root', '1234', 'cykordb') or die("connect failed"); 
    $query = "select * from board order by number desc";    
    $result = mysqli_query($connect, $query);
    
    $total = mysqli_num_rows($result);

    session_start();

    if (isset($_SESSION['userid'])) {
      ?>
      <p style="text-align:right">현재 로그인 계정: <?php echo $_SESSION['userid']?></p>
      <button onclick="location.href='./logout_action.php'" style="float:right; font-size:15px;">로그아웃</button>
      <?php
    } 
    else {
      ?>
      <button onclick="location.href='./login.php'" style="float:right; font-size:15px;">로그인</button>
      <?php
    }
?>
<body>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', '1234', 'cykordb') or die("connect failed");
    $query = "select * from board order by number desc";   
    $result = mysqli_query($connect, $query);

    $total = mysqli_num_rows($result); 
    if (isset($_SESSION['userid'])) {
      ?>
      <p style="font-size:25px; text-align:center"><b>CyKor 게시판</b></p>
      <table align=center>
        <thead align="center">
            <tr>
                <th width="50" align="center">번호</td>
                <th width="500" align="center">제목</td>
                <th width="100" align="center">작성자</td>
                <th width="200" align="center">날짜</td>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td width="50" align="center"><?php echo $total ?></td>
                <td width="500" align="center"><a href="read.php?number=<?php echo $rows['number'] ?>"><?php echo $rows['title'] ?></td>
                <td width="100" align="center"><?php echo $rows['id'] ?></td>
                <td width="200" align="center"><?php echo $rows['date'] ?></td>
              </tr>
              <?php
              $total--;
            }
        ?>
        </tbody>
      </table>
      <div class=text>
        <br></br><button onclick="location.href='./write.php'"; style="font-size: 15px">글쓰기</button>
      </div>
      <?php
    } 
    else {
      ?>
      <script>
        alert("로그인이 필요합니다. 로그인 후 이용하여 주세요");
        location.href='./login.php'
      </script>
      <?php
    }
    ?>
    
</body>

</html>