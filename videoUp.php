<?php
    require "dbConn.php";

    $sql = "SELECT * FROM youtubeLinks ORDER BY linkID DESC";
    $query = mysqli_query($conn, $sql);

    if (isset($_GET['delBtn'])) {
        $failMsg = "Couldn't delete file!";

        $id = $_GET['delBtn'];

        $sql = "DELETE FROM youtubeLinks WHERE linkId='$id'";

        if (mysqli_query($conn, $sql)) {
            header("Location: videoUp.php");
        }
        else {
            echo $failMsg;
        }
    }
    else {}
?>

<html>
    <head>
        <title>PDFshare</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="styleHome.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Sharma's Panchavati</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studentsOnSite.php">View Students</a>
                </li>
                <li>
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.instagram.com/u_sai00_" tabindex="-1" aria-disabled="false"><b>U. Sai Nath Rao</b></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <form enctype="multipart/form-data" action="post.php" method="post">
            <div class="container">
                <center>
                    <div id="file">
                        <input type="text" placeholder="Paste your youtube video link here" class="form-control" name="link">
                    </div>
                    <div id="class">
                        <select class="form-control" name="class" required>
                            <option value="" selected="selected" disabled>Select class</option>
                            <option value="8">8th</option>
                            <option value="9">9th</option>
                            <option value="10">10th</option>
                            <option value="11">11th</option>
                            <option value="12">12th</option>
                        </select>
                    <div id="btnSubmit" class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="post" id="submitBtn" class="btn btn-outline-warning">Post</button>
                    </div>
                </center>

            </div>
        </form>

        <hr>

        <div class="container">
            <?php
                session_start();

                if (!isset($_SESSION['pass'])) {
                    header("Location: login.php");
                }
                else {
                    if (mysqli_num_rows($query)) {
                        while ($videos = mysqli_fetch_assoc($query)) {
                            $videoId = $videos['linkID'];
                            $videoLink = $videos['link'];
                            $videoClass = $videos['class'];

                            echo "<div id='videoSec'>";
                                echo "<iframe src='".$videoLink."' allowfullscreen></iframe><br>";
                                echo "<form method='get'><button value='".$videoId."' name='delBtn' class='btn btn-danger'>Delete Video</button></form>";
                                //echo "<a href='' download='".$videoLink."'><i class='fa fa-download' style='font-size: 24px;'></i></a>";
                            echo "</div>";
                        }
                    }
                    else {
                        echo "No videos posted!";
                    }
                }
            ?>
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>