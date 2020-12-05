<?php
	$input = $_POST['input'];
	
	//connet to mysql
	$mysqli = new mysqli("mysql.eecs.ku.edu", "petertso", "upha3eWa", "petertso");
	
	/* check connection */
	if($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	/* default message */
	$output = "Error. Account already exists.";

	/* query from users */
	$query = "SELECT user_id FROM Users WHERE user_id=\"". $input ."\" ;";

	/* check results */
	$result = $mysqli->query($query);

	/* check if the set is empty */
	if($result->num_rows === 0 && $input != ""){
		$output = "Successful. Account Added. ";

		/* add the account */
		$query = "INSERT INTO Users (user_id) VALUES (\"". $input ."\") ;";
		$mysqli->query($query);
	}

	if($input == ""){
		$output = "Field cannot be blank.";
	}

	/* free and close the mysqli */
	$result->free();
	$mysqli->close();

	//create the output
	echo "<html>
			<head>
				<style>
					body{
						background-color: darkslateblue;
						font-family: monospace;
						border: 5px solid azure;
					}
					h1{
						font-size: 50px;
						color: white;
					}
					p{
						font-size: 25px;
						color: white;
					}
				</style>
			</head>
			<body>
				<h1> Response </h1>
				<p>Account: ". $input ." </p>
				<p> ". $output  ." </p>
			</body>
		</html>
	";
?>

