<?php
	session_start();
	$db = mysql_connect("mysql4.000webhost.com", "a9017876_zhongwu","307442570szw") or die("I cannot connect to the database" . mysql_errno());
	mysql_select_db("a9017876_ezcampu");

	if (isset($_POST['email']) && isset($_POST['password'])) {
		$typed_email = $_POST['email'];
		$typed_password = $_POST['password'];

		$sql = "select id from users where email='$typed_email' and password='$typed_password'";
		$query = mysql_query($sql,$db);
		$check = mysql_num_rows($query);
		if ($check == 1) {
			header('Location: welcome.php');
		} else {
			echo "nonono";
		}
	}
?>


<html>
	<head>
		<title>Log in -- Ezcampus</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body>
		<div>
			<form name = "registration" action="login.php" method="post">
				Email:
				<input type="text" name="email"><br><br>
				Password:
				<input type="password" name="password"><br><br>
				<button type="submit">Submit</button>
			</form>
		</div>
		<p>&nbsp;</p>
		<h2> Zed	    </h2>
	<p>the Master of Shadows</p>
<h3>Win Rate: 78%</h3>
<p><img src="Images/zed.jpg" width="934" height="643"></p>
	</body>
</html>
