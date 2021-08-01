<?php
    require "dbConn.php";

    $sql = "SELECT * FROM files ORDER BY fileId DESC";
    $query = mysqli_query($conn, $sql);

    if (isset($_POST['delBtn'])) {
        $failMsg = "Couldn't delete file!";

        $id = $_POST['delBtn'];
        $file = $_POST['fileName'];

        $sql = "DELETE FROM files WHERE fileId='$id'";

        if (mysqli_query($conn, $sql)) {
            if (unlink("uploads/".$file)) {
                header("Location: home.php");
            }
            else {
                echo $failMsg;
            }
        }
        else {
            echo $failMsg;
        }
    }
    else {}

    if (isset($_GET['delAllStudents'])) {
        $sql = "DELETE FROM students";

        if (mysqli_query($conn, $sql)) {
            header("Location: home.php");
        }
    }
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
        <link rel="stylesheet" href="styleHome.css">
    </head>

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
                  <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="videoUp.php">Upload a video</a>
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

        <form enctype="multipart/form-data" action="upload.php" method="post">
            <div class="container">
                <center>
                    <div id="file">
                        <input type="file" name="file" class="form-control" required="required">
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
                        <button type="submit" name="submit" id="submitBtn" class="btn btn-outline-warning">Upload</button>
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
                        echo "<table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>File Id</th>
                                        <th scope='col'>File</th>
                                        <th scope='col'>Class</th>
                                        <th scope='col'>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                            ";
                        while ($fileRaw = mysqli_fetch_array($query)) {
                                $fileId = $fileRaw['fileId'];
                                $fileLink = $fileRaw['fileAddr'];
                                $class = $fileRaw['class'];

                                echo "
                                <tr>
                                    <th scope='row'>".$fileId."</th>
                                    <td>
                                        <a href='".$fileLink."' target='' download='".$fileLink."'>".$fileLink."</a><br>
                                        <a href='./uploads/".$fileLink."' target='".$fileLink."' id='content'>View Content</a>
                                    </td>
                                    <td>".$class."th std.</td>
                                    <td>
                                        <form action='' method='post'>
                                            <input type='hidden' value='".$fileLink."' name='fileName'>
                                            <button value='".$fileId."' class='btn btn-danger btn-sm' name='delBtn'>Delete Upload</button>
                                        </form>
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
                }
            ?>

            <form action="" method="get">
                <button class="btn btn-sm btn-outline-danger" name="delAllStudents">Delete All Students</button>
            </form>
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
