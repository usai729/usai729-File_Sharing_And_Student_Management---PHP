<?php
    require "dbConn.php";

    $sql = "SELECT * FROM files ORDER BY fileId DESC";
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

    <script type="text/javascript">
        var isMobile = window.orientation > -1;

        if (isMobile) {
            //Mobile
            document.getElementById("content").remove();
            alert("Mobile");
        }
    </script>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Site Name</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="files.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="videos.php">Redirect to videos</a>
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

        <?php
            session_start();

            if (!isset($_SESSION['student'])) {
                header("Location: studentLogin.php");
            }
        ?>

        <div class="container">

            <?php echo "<b>".mysqli_num_rows($query)."</b> file uploads find"; ?>

            <hr>

            <?php 
                if (mysqli_num_rows($query)) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>File Id</th>
                                    <th scope='col'>File</th>
                                    <th scope='col'>Class</th>
                                </tr>
                            </thead>
                            <tbody>
                        ";
                    while ($fileRaw = mysqli_fetch_array($query)) {
                            $fileId = $fileRaw['fileId'];
                            $fileLink = $fileRaw['fileAddr'];
                            $class = $fileRaw['class'];
                            $afterExplode = explode("/", $fileLink);

                            echo "
                                <tr>
                                    <th scope='row'>".$fileId."</th>
                                    <td>
                                        <a href='./uploads/".$fileLink."' download='".$fileLink."' name='dn'>".$afterExplode[0]."</a><br>
                                        <a href='./uploads/".$fileLink."' target='".$fileLink."' id='content' name='view'>View Content</a>
                                    </td>
                                    <td>
                                        <form action='specific.php' method='GET'>
                                            <button type='submit' value='".$class."' class='btn btn-link btn-sm' name='spe'>".$class."th std.</button>
                                        </form>
                                    </td>
                                </tr>
                            ";
                        }

                    echo "
                            </tbody>
                            </table>
                    ";
                }
                else {
                    echo "No files uploaded!";
                }
            ?>
            <span id="res"></span>
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
