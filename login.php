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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
		 			if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: main.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to NETFLIX</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
		<style>
        footer {
            background-color: black;
            padding: 100px;
            text-align: left;
			opacity: 80%;
			
        }

        footer p {
            color: #777;
            font-size: 20px;
			margin-left:45px;
			margin-right:45px;
        }
    </style>
	</head>
    	<body background="assets/trailer/netfliximg.jpg">
        <div class="signInContainer">

            <div class="column">

                <div class="header">
                    <img src="assets/images/log.png" title="Logo" alt="Site logo" />
                    <h3>Sign In</h3>
                    <span>to continue to NETFLIX</span>
                </div>

	<form method="post">
		

		<input id="text" type="text" name="user_name"><br><br>
		<input id="text" type="password" name="password"><br><br>
		<input id="button" type="submit" value="Login"><br><br>

		<a href="signup.php">Click to Signup</a><br><br>
	</form>
            <a href="register.php" class="signInMessage">Need an account? Sign up here!</a>

            </div>

        </div>
		<footer>
        <pre><p>Questions? Call 000-800-919-1694                                   </p></pre><br>
		<pre><p>FAQ                                                                                           Help Center</p></pre>
		<pre><p>Cookie Preferences                                                            Corporate Information</p></pre>
		<label for="op1">English</label>
		<select id="op1">
			<option value="English">English</value>
			<option value="Kannada">Kannada</value>
			<option value="Hindi">Hindi</value>
			<option value="Tamil">Tamil</value>
			<option value="Telugu">Telugu</value>
    </footer>

</body>
</html>