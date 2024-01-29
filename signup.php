<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}
		else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Welcome to NETFLIX</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
</head>

<body background="assets/trailer/netfliximg.jpg">

    <div class="signInContainer">

        <div class="column">

            <div class="header">
                <img src="assets/images/log.png" title="Logo" alt="Site logo" />
                <h3>Sign Up</h3>
                <span>to continue to NETFLIX</span>
            </div>

            <form method="post">

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>

            <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>

        </div>

    </div>

</body>

</html>