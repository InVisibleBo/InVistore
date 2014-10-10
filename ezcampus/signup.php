<?php
	session_start();
	$db = mysql_connect("mysql4.000webhost.com", "a9017876_zhongwu","307442570szw") or die("I cannot connect to the database" . mysql_errno());
	mysql_select_db("a9017876_ezcampu");
	if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['school'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password1'];
		$school = $_POST['school'];

		$sql = "select id from users where name='$username'";
		$query = mysql_query($sql,$db);
		$check_user = mysql_num_rows($query);
		$sql = "select id from users where email='$email'";
		$query = mysql_query($sql,$db);
		$check_email = mysql_num_rows($query);
		if ($check_user < 1 && $check_email < 1) {
			$sql = "insert into users (name,email,password,school) values ('$username','$email','$password','$school')";
			$query = mysql_query($sql,$db);
			if ($query) echo "You are successfully registered! Please log into your email $email and activate your account";
			else {
				echo "Sorry the registration is unsuccessful.";
			}
		} else if ($check_user < 1) {
			echo "The email is already registered!";
		} else if ($check_email < 1) {
			echo "The username name is taken!";
		}
	}
?>


<html>
	<head>
		<title>Sign Up -- Ezcampus</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<script>
		function validateForm() {
			var username = $("[name='username']").val();
			var email = $("[name='email']").val();
			var pass1 = $("[name='password1']").val();
			var pass2 = $("[name='password2']").val();
			var school = $("#school_list option:selected").text();
			
			if (username == "" || email == "" || pass1 == "" || pass2 == "") {
				alert("Please fill all the blanks");
				return false;
			} else if (school == "Choose your school...") {
				alert("Please choose your school.");
				return false;
			}

			var username_format=/^[a-zA-Z]{1}[a-zA-Z0-9]{2,14}$/;
			if (username.length < 3 || username.length > 15) {
				alert("username can only be 5-15 characters");
				return false;
			} else if (!username.match(username_format)) {
				alert("Please use the correct format for username");
				return false;
			}

			if (pass1.length < 8) {
				alert("password should be at least 8 characters");
				return false;
			} else if (pass1 != pass2) {
				alert("Passwords must match");
				return false;
			}



			var UR_email = /.+@.+\.rochester+\.edu$/;
			var NYU_email = /.+@.+\.nyu+\.edu$/;
			if (!email.match(UR_email) && !email.match(NYU_email)) {
				alert("Please enter a valid school email address.");
				return false;
			}


		}
	</script>
	<body>
		<div>
			<form name = "registration" action="signup.php" method="post" onSubmit="return validateForm()">
				Username:  (3-15 characters starting with letter, only letters and digits are accepted)<br>
				<input type="text" name="username" placeholder="Type your name here."><br><br>
				Email: (only school emails are accepted)<br>
				<input type="text" name="email" placeholder="Enter your email address."><br><br>
				Create password:  (8-character minimum; case sensitive)<br>
				<input type="password" name="password1"><br><br>
				Confirm password:<br>
				<input type="password" name="password2"><br><br>
				School:<br>
				<select id="school_list" name="school">
					<option selected>Choose your school...</option>
					<option value="University of Rochester">University of Rochester</option>
					<option value="New York University">New York University</option>
				</select><br><br>
				<button type="submit">Submit</button>
			</form>
		</div>
		<p>&nbsp;</p>
		<h2>Orianna</h2>
		<p>the Lady of Clockwork</p>
		<h3>Win Rate: 72%</h3>
		<p>&nbsp;</p>
		<p><img src="Images/Orianna.jpg" width="1276" height="1080"></p>
	</body>
</html>
