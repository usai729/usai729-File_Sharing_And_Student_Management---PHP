<?php 
    require "dbConn.php";

    $wrongPwd = "";

    if (isset($_POST['sub'])) {
        $pwd = md5(mysqli_real_escape_string($conn, $_POST['pass']));
        $phno = mysqli_real_escape_string($conn, $_POST['num']);

        $sql = "SELECT * FROM students WHERE stuPassword='$pwd' AND stuPhNo='$phno'";

        if (mysqli_num_rows(mysqli_query($conn, $sql)) == 0) {
            $wrongPwd = "Wrong password or phone number!";
        }
        else {
            session_start();

            $_SESSION['student'] = $pwd;

            header("Location: files.php");
        }
    }
?>

<html>
    <head>
        <title>PDFshare</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@600;700&display=swap" rel="stylesheet">

        <!--Custom CSS-->
        <link rel="stylesheet" href="styleHome.css">

        <script type="text/javascript">
        	function show() {
        		var x = document.getElementById("pass");

				if (x.type === "password") {
				    x.type = "text";
				} 
				else {
				    x.type = "password";
				}
        	}
        </script>
    </head>

    <style type="text/css">
        #me {
            text-decoration: none;
            font-weight: bolder;
            font-family: 'Shippori Mincho B1', serif;
            color: black;
        }
    </style>

    <body>
        <div class="container" style="padding-top: 200px;">
        	<?php
        		if (isset($_SESSION['student'])) {
        			header("Location: files.php");
        		}
        	?>

            <center>
            	<h2>Student LogIn</h2>
            	<form method="post" action="">
                    <input type="password" style="border-radius: 10px;" name="pass" id="pass" class="form-control" placeholder="Enter Password">
	            	<br>
                    <input type="number" style="border-radius: 10px;" name="num" id="pass" class="form-control" placeholder="Enter phone number">
                    <br>
	            	<button type="submit" name="sub" class="btn btn-primary btn-sm">LogIn</button>
	            </form>
	            <div id="show">
	            	<input type="checkbox" onclick="show()"> Show password</button>
	            </div>
                <div id="by">
                    Developed By <a id="me" href="https://www.instagram.com/u_sai00_" target="https://www.instagram.com/u_sai00_">U. Sai Nath Rao</a>
                </div>

                <?php echo $wrongPwd; ?>
            </center>
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>