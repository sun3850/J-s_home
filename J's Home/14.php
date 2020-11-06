<?php
    $conn = mysqli_connect("localhost","root",sun9930);
    mysqli_select_db($conn,"opentutorials");
        
    $name=mysqli_real_escape_string($conn, $_GET['name']);
    $password=mysqli_real_escape_string($conn, $_GET['password']);
    
    $sql = "SELECT * FROM user WHERE name='".$name."' AND password='".$password."'";
    $result = mysqli_query($conn, $sql);

  ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
       <?php
            $password = $_GET['password'];
            if($result->num_rows== "0"){
                echo "아이디나 비밀번호가 일치하지 않습니다.";
            }
            else{
                echo "안녕하세요 주인님";
            }
        
        ?>
    </body>
</html> 