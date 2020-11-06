
<?php
    require("lib/db.php");
    $conn = db_init("localhost","root","sun9930","my_profile");
    $result = mysqli_query($conn,"SELECT * FROM topic");
    $row = mysqli_fetch_assoc($result);
    echo $row["id"];
    echo $row["title"];
    echo $row["id"];
    $row = mysqli_fetch_assoc($result);
    echo $row["id"];
?>
