<?php 
    require "dbConn.php";
    include "allow-delete.php";

    $pendingID = $_POST['hiddenInputID'];

    //MySQL Query 
    $sql_allow = "INSERT INTO students(stuPassword, stuName, stuPhNo, stuClass)
                SELECT stuPassword, stuName, stuPhNo, stuClass FROM pendingStudents WHERE PstuId='$pendingID' LIMIT 1
            ";

    if (mysqli_query($conn, $sql_allow)) {
        //Delete students from pendingStudents table after inserting him/her in students table
        $sql_delete = "DELETE FROM pendingStudents WHERE PstuId='$pendingID'"; 

        if (mysqli_query($conn, $sql_delete)) {
            echo getPendingStudents();
        }
    }
?>
