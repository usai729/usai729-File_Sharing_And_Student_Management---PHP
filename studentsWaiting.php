<?php
    require "dbConn.php";

    $sql = "SELECT * FROM students ORDER BY stuClass, stuName ASC";
    $query = mysqli_query($conn, $sql);

    //DELETE ALL STUDENTS 
    if (isset($_GET['delAllStudents'])) {
        $sql = "DELETE FROM students";

        if (mysqli_query($conn, $sql)) {
            header("Location: studentsOnSite.php");
        }
    }

    //DELETE ONE STUDENT
    if (isset($_POST['del'])) {
        $delWho = $_POST['del'];

        $sql = "DELETE FROM students WHERE stuPhNo='$delWho'";

        if (mysqli_query($conn, $sql)) {
            header("Location: studentsOnSite.php");
        }
    }
?>

<html>
  <head>
    <title>PDFshare</title>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" co ntent="width=device-width, initial-scale=1" />

    <!--Bootstrap CSS-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!--Custom CSS-->
    <link rel="stylesheet" href="styleHome.css" />
  </head>

  <style type="text/css">
    #search {
      border: 0px;
      box-shadow: 0.5px 0.5px 0.5px 0.5px #57f2e0;
    }
    #search:hover {
      border: 0px;
      box-shadow: 0.75px 0.75px 0.75px 0.75px #57f2e0;
    }
    select {
      border: 0.5px solid #57f2e0;
    }
  </style>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Site Name</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php"
                >Redirect to home</a
              >
            </li>
            <li>
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="https://www.instagram.com/u_sai00_"
                tabindex="-1"
                aria-disabled="false"
                ><b>U. Sai Nath Rao</b></a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    //This is where the students from pending students MySQL table 
    <div id="root"></div>

    <script>
      fetch("allow-delete.php", {
        method: "POST",
      })
        .then((response) => {
          return response.text();
        })
        .then((result) => {
          document.getElementById("root").innerHTML = result;
        })
        .catch((error) => {
          console.error(error);
        });

      function allowQuery() {
        fetch("allow.php", {
          method: "POST",
          body: new FormData(document.getElementById("allowForm")),
        })
          .then((response) => {
            document.getElementById("root").innerHTML = "";
            return response.text();
          })
          .then((result) => {
            document.getElementById("root").innerHTML = result;
          })
          .catch((error) => {
            console.log(error);
          });
      }
      function denyQuery() {
        fetch("deny.php", {
          method: "POST",
          body: new FormData(document.getElementById("denyForm")),
        })
          .then((response) => {
            document.getElementById("root").innerHTML = "";
            return response.text();
          })
          .then((result) => {
            document.getElementById("root").innerHTML = result;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    </script>

    <!--Bootstrap Javascript-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
