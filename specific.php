<?php
    require "dbConn.php";

    if (isset($_GET['spe'])) {
        $val = $_GET['spe'];

        $sql = "SELECT * FROM files WHERE class='$val' ORDER BY fileId DESC";
        $query = mysqli_query($conn, $sql);
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
        <link rel="stylesheet" href="styleFiles.css">
    </head>

    <body>
        Developed By <a href="https://www.instagram.com/u_sai00_" target="https://www.instagram.com/u_sai00_" id="dev">U. Sai Nath Rao</a><br>
        <a href="files.php">Redirect to files</a>
        <div class="container">
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
                                        <a href='./uploads/".$fileLink."' target='".$fileLink."' id='content'>View Content</a>
                                    </td>
                                    <td>".$class."th std.</td>
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
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
