<?php
    require "dbConn.php";

    $sql = "SELECT * FROM youtubeLinks ORDER BY linkID DESC";
    $query = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <title>PDFshare</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="styleFiles.css">
    </head>

    <body>
        Developed By <a href="https://www.instagram.com/u_sai00_" target="https://www.instagram.com/u_sai00_" id="dev">U. Sai Nath Rao</a><br>
        <a href="files.php">Redirect to files</a>

        <div class="container">
            <?php 
                if (mysqli_num_rows($query)) {
                    while ($videos = mysqli_fetch_assoc($query)) {
                        $videoId = $videos['linkID'];
                        $videoLink = $videos['link'];
                        $videoClass = $videos['class'];

                        echo "<div id='videoSec'>";
                            echo "<iframe src='".$videoLink."' allowfullscreen></iframe><br>";
                            echo "
                                <form action='specificVid.php' method='GET'>
                                    <button type='submit' value='".$videoClass."' class='btn btn-link btn-sm' name='spe'>".$videoClass."th std.</button>
                                </form>";
                        echo "</div>";
                    }
                }
                else {
                    echo "No videos posted!";
                }
            ?>
            <span id="res"></span>
        </div>

        <script type="text/javascript">
            /*function dn(str) {
                var xmlHTTP = new XMLHttpRequest();

                xmlHTTP.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('res').innerHTML = this.responseText;
                    }   
                };
                xmlHTTP.open("GET", "count.php?q=".str, true);
                xmlHTTP.send();
            }*/
        </script>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>