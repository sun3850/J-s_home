<?php
    require("config/config.php");
    require("lib/db.php");
    $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
    $result = mysqli_query($conn, "SELECT * FROM topic");
    echo $result;


  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <title>Index</title>
    </head>
        <link rel="stylesheet" type="text/css" href= "http://localhost/style.css">
    <body id="target">
        <div class="container">
            <header class="jumbotron text-center">
                    <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/2039/3780.gif" class="rounded-circle" id="logo">
                 <h1><a href="http://localhost/index.php">Javascript</a></h1>
            </header>
            <div class="row">
                <nav class="col-md-3">
                    <ol class="nav flex-column"> 
                       <?php 
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<li class="nav-item"><a href="http://localhost/index.php?id='.$row['id'].'" class="nav-link">'.htmlspecialchars( $row['title']).'</a></li>'."\n";
                            }
                        ?>
                    </ol>
                </nav>
                <hr> 
                <div class="col-md-9">
                    <article>
                        <?php
                            if(empty($_GET['id'])===false){    
                                $sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
                                 echo strip_tags($row['description'], '<a><h1><h2><h3><h5><ul><ol><li>');
                            }
                        ?>
                        
                        <form action="process.php" method="POST">
                            <div class="form-group">
                                <label for="form-title">제목</label>
                                <input type="text" name="title" class="form-control" id="form-title" aria-describedby="emailHelp" placeholder="제목을 적어주세요">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="form-author">작성자</label>
                                <input type="text" name="author" class="form-control" id="form-author" aria-describedby="emailHelp" placeholder="작성자를 적어주세요">
                            </div>
                            <div class="form-group">
                                <label for="form-title">제목</label>
                                 <textarea rows="10" name="description" class="form-control" id="form-title" aria-describedby="emailHelp" placeholder="본문을 적어주세요"></textarea>
                            </div>
                            <input type="submit" name="name" class="btn btn-primary"> 
                        </form>
                    </article>
                    <div id="control">
                        <div  class="btn-group" data-toggle="buttons">
                            <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-light"/>
                            <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-light"/>
                        </div>
                        <a href="http://localhost/write.php" class="btn btn-success">쓰기</a>
                    </div>
                </div>

            </div>
            <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        </div>
    </body>
</html>