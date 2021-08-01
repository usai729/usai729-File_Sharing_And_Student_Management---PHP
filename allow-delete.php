<?php
    require "dbConn.php";

    function getPendingStudents() {
        $conn = mysqli_connect("localhost", "root", "rootmysql@1#", "files");

        $sql_getPendingStudents = "SELECT * FROM pendingStudents ORDER BY PstuId DESC";
        $query_getPendingStudents = mysqli_query($conn, $sql_getPendingStudents);

        if ($query_getPendingStudents) {
            while ($rows = mysqli_fetch_assoc($query_getPendingStudents)) {
                $stuId = $rows['PstuId'];
                $name = $rows['stuName'];
                $class = $rows['stuClass'];

                echo "
                    <div id='main' style='margin: 15px; border: 1px solid lightgray;'> 
                        <div id='student' style='padding: 6;'>
                            Name: ".$name."<br>
                            Class: ".$class."
                            <div id='buttons'>
                                <form onsubmit='return false' id='allowForm'>
                                    <input type='hidden' value='".$stuId."' name='hiddenInputID' />
                                    <button class='btn btn-outline-warning' value='".$stuId."' onclick='allowQuery()'>Allow</button>
                                </form>
                                <form onsubmit='return false' id='denyForm'>
                                    <input type='hidden' value='".$stuId."' name='hiddenInputID' />
                                    <button class='btn btn-outline-danger' value='".$stuId."' onclick='denyQuery()'>Deny</button>
                                </form>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    echo getPendingStudents();
?>