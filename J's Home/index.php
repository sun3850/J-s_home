
<?php
    require("lib/db.php");
    $conn = db_init("localhost","root","sun9930","my_profile");
    $result = mysqli_query($conn,"SELECT * FROM topic");
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My_Profile</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href= "http://localhost/css/style.css">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="jumbotron text-center">
                    <div class="container">
                        <img src="profile_img.jpg" class="rounded-circle" class="border border-primary" id="logo">
                        <a href="http://localhost/index.php"><h3>J's home</h3></a>
                    </div>
                </div>
            </header>
            <div class="row">
                <nav class="col-4">
                    <ul class="nav flex-column nav-pills" id="pills-tab" role="tablist">
                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<li class="nav-item"><a class="nav-link" data-toggle="pill" href="http://localhost/index.php?id='.$row['id'].'" role="tab" aria-selected="false">'.htmlspecialchars($row['title']).'</a>';
                            }
                        ?>
                    </ul>
                </nav>
                <article class="col-8">
                    <p>description1</p>
                </article>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>