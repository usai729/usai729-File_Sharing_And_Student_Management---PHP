<?php
    require "dbConn.php";

    if (isset($_GET['search'])) {
        $class = $_GET['cl'];
        $sql = "SELECT * FROM students WHERE stuClass='$class' ORDER BY stuName ASC";
        $query = mysqli_query($conn, $sql);
    }
?>

<?php 
    if (isset($_POST['del'])) {
        $delWho = $_POST['del'];

        $sql = "DELETE FROM students WHERE stuPhNo='$delWho'";

        if (mysqli_query($conn, $sql)) {
            header("Location: inSpecificClass.php?cl=".$class."&search=true");
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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <!--Custom CSS-->
        <link rel="stylesheet" href="styleHome.css">
    </head>

    <style type="text/css">
        #back {
            font-size: 14px;
        }
        #back:hover {
            font-size: 15px;
        }
    </style>

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

        <div class="container">
            <?php echo "<b>".mysqli_num_rows($query)."</b> students registered"; ?> 
            <br>
            <div style="display: inline;">
                <a href="studentsOnSite.php" style="text-decoration: none; color: black;" id="back"><i class="fa fa-arrow-circle-left"></i> Go back</a>
            </div>
            <div style="padding-bottom: 7px;"></div>
            <?php
                session_start();

                if (!isset($_SESSION['pass'])) {
                    header("Location: login.php");
                }
                else {
                    if (mysqli_num_rows($query)) {
                        while ($students = mysqli_fetch_array($query)) {
                                $id = $students['stuId'];
                                $stuName = $students['stuName'];
                                $stuPhNo = $students['stuPhNo'];
                                $stuClass = $students['stuClass'];

                                echo "
                                    <div style='border-radius: 4px; border: 1px solid red' id='".$stuPhNo."'>
                                        <div style='padding: 5px;'>
                                            Student Name: <span style='font-weight: bold;'>".$stuName."</span><br>
                                            Student Phone: <span style='font-weight: bold;'>".$stuPhNo."</span><br>
                                            Studying in: <span style='font-weight: bold;'>".$stuClass."th Std.</span><br>
                                            <form action='' method='post'>    
                                                <button class='btn btn-sm btn-outline-danger'  name='del' value='".$stuPhNo."'><i class='fa fa-trash-o' style='font-size: 18px'></i> <b>".$stuName."</b></button>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                ";
                        }
                    }
                }
            ?>
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
