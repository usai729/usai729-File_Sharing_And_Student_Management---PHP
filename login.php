<?php 
        //since it's a single admin, login for the admin isn't a complex one. This is changed to sql login system in the original project.
	$password = "123";
	$count = 0;

	if (isset($_POST['pass'])) {
		$ePass = $_POST['pass'];

		if ($ePass == $password) {
			session_start();

			$_SESSION['pass'] = $ePass;

			header("Location: home.php");
		}
	}
	else {
		$count += 1;
		echo "Wrong password!";
	}
?>

<html>
    <head>
        <title>Login - Admin</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
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

    <body>
        <div class="container" style="padding-top: 200px;">
		<?php
			//Check if the users session is already set, if it is then redirect the user to home.php where files are uploaded and students are managed
			if (isset($_SESSION['pass'])) {
				header("Location: home.php");
			}
		?>

	    <center>
		<h2>Log in</h2>
		<!-- FORM -->
		<form method="post" action="">
			<input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password">
					<br>
			<button type="submit" name="sub" class="btn btn-primary">LogIn</button>
		</form>
		<!-- FORM END -->

		<div id="show">
			<input type="checkbox" onclick="show()"> Show password</button>
		</div>

		<!-- LINK TO OPEN THE PAGE THAT STUDENTS WILL SEE -->
		<div id="redirect">
		    <a href="files.php">Redirect to uploads</a>
		</div>

		<div id="by">
		    Developed By <a href="https://www.instagram.com/u_sai00_" target="https://www.instagram.com/u_sai00_">U. Sai Nath Rao</a>
		</div>
	    </center>
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
