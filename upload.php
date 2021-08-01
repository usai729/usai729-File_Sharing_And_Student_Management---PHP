<?php
    require "dbConn.php";
    
    /*
    ini_set('post_max_size', 'size');
    ini_set('upload_max_filesize', 'size');
    */

    if (isset($_POST['submit'])) {
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $class = $_POST['class'];

        $splitName = explode(".", $fileName);
        $finalName = $splitName[0].".".strtolower($splitName[1]);

        if (move_uploaded_file($fileTmp, __DIR__."\uploads\\".$finalName)) {
            $sql = "INSERT INTO files(fileAddr, class) VALUES('$finalName', '$class')";

            if (mysqli_query($conn, $sql)) {
                header("Location: home.php");
            }
        }
    }
?>
