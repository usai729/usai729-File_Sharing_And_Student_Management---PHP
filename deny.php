<?php 
    require "dbConn.php";
    include "allow-delete.php";

    $pendingID = $_POST['hiddenInputID'];

    $sql_decline = "DELETE FROM pendingStudents WHERE PstuId = '$pendingID'";
    $query_decline = mysqli_query($conn, $sql_allow);

    if ($query_decline) {
        echo getPendingStudents();
    }
?>