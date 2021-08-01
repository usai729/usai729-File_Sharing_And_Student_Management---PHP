<?php 
    require "dbConn.php";

    $failure = "";

    if (isset($_POST['sub'])) {
        $pwdHash = md5(mysqli_real_escape_string($conn, $_POST['pass']));
        $phno = mysqli_real_escape_string($conn, $_POST['stuNo']);
        $name = ucfirst((mysqli_real_escape_string($conn, $_POST['stuName'])));
        $class = $_POST['class'];

        $sql = "SELECT * FROM students WHERE stuPhNo='$phno'";
        $get = mysqli_query($conn, $sql);

        if (mysqli_num_rows($get) == 0) {
            $sql = "INSERT INTO pendingStudents(stuPassword, stuName, stuPhNo, stuClass) VALUES('$pwdHash', '$name', '$phno', '$class')";  
            $query = mysqli_query($conn, $sql);

            if ($query) {
                header("Location: success_msg.html");
            }
        }
        else {
            $failure = "Phone Number Already Exists!";
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
            function greet() {
                function capitalizeTheFirstLetterOfEachWord(words) {
                   var separateWord = words.toLowerCase().split(' ');
                   for (var i = 0; i < separateWord.length; i++) {
                      separateWord[i] = separateWord[i].charAt(0).toUpperCase() +
                      separateWord[i].substring(1);
                   }
                   return separateWord.join(' ');
                }

                if (document.getElementById("name").value != "") {
                    document.getElementById("head").innerHTML = "";

                    userName = document.getElementById("name").value;

                    document.getElementById("greetUser").innerHTML = "Hi, "+capitalizeTheFirstLetterOfEachWord(userName)+"!";
                }
                else {
                    document.getElementById("head").innerHTML = "Register Yourself";
                    document.getElementById("greetUser").innerHTML = "";
                }
            }
        </script>
    </head>

    <style type="text/css">
        #pass {
            border-top-left-radius: 7px; 
            border-bottom-left-radius: 0px;
            border-top-right-radius: 7px; 
            border-bottom-right-radius: 0px;
        }
        #name {
            border-bottom-left-radius: 0px;
            border-top-left-radius: 0px;
            border-bottom-right-radius: 0px;
            border-top-right-radius: 0px;
        }
        #num {
            border-bottom-left-radius: 0px;
            border-top-left-radius: 0px;
            border-bottom-right-radius: 0px;
            border-top-right-radius: 0px;
        }
        #select {
            border-top-left-radius: 0px;
            border-bottom-left-radius: 7px;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 7px;
        }
        #me {
            text-decoration: none;
            font-weight: bolder;
            font-family: 'Shippori Mincho B1', serif;
            color: black;
        }
    </style>

    <body>
        <div class="container" style="padding-top: 170px;">
            <center>
            	<h3 id="head">Register Yourself</h3>
                <center>
                    <h3 id="greetUser"></h3>
                </center>
            	<form method="post" action="">
	            	<input type="password" oninput="showPwd()" required name="pass" id="pass" spellcheck="false" class="form-control" placeholder="Create Password">
	            	<input type="text" name="stuName" maxlength="150" placeholder="Enter your name" autocomplete="off" id="name" spellcheck="false" oninput="greet()" class="form-control" required>
                    <input type="number" name="stuNo" placeholder="Enter your phone number" id="num" class="form-control" required>
                    <select name="class" class="form-control" id="select" required>
                        <option value="" selected="selected" disabled>Select your class</option>
                        <option value="9">9th Std.</option>
                        <option value="10">10th Std.</option>
                        <option value="11">11th Std.</option>
                        <option value="12">12th Std.</option>
                    </select>
                    <br>
	            	<button type="submit" name="sub" class="btn btn-primary">Register</button>
	            </form>
	            <div id="show">
	            	<input type="checkbox" class="form-check-input" onclick="show()"> Show password</button>
	            </div>
                <div id="by">
                    Developed By <a id="me" href="https://www.instagram.com/u_sai00_" target="https://www.instagram.com/u_sai00_">U. Sai Nath Rao</a>
                </div>
                <?php echo "<span style='font-family: courier;'>".$failure."</span>"; ?>
            </center>
        </div>

        <!--Bootstrap Javascript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
