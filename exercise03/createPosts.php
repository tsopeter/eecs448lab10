<?php
	/* get the input from user*/
	$input = $_POST['input'];
	$uname = $_POST['uname'];

	/* setup sqli */
	$mysqli = new mysqli("mysql.eecs.ku.edu", "petertso", "upha3eWa", "petertso");

	$output1 = "";
	$output2 = "Please check input field.";
	/* check to see valid input */
	if($uname == ""){
		$output1 = "Username must not be empty.";
	}
	else{
		if($input == ""){
			$output2 = "Input field must not be empty";
		}
		else{
			/* check to see if valid username */
			$query = "Select user_id from Users where user_id=\"". $uname  . "\" ;";
			$result = $mysqli->query($query);
			if($result->num_rows === 0){
				$output1 = "Username does not exist. ";
			}	
			else{
				/* now since the username is valid and input field is valid */
				/* create and submit post */
				$query = "Insert into Posts (content, author_id) values (\"". $input  . "\", \"". $uname  . "\") ;";
				$mysqli->query($query);

				$output1 = "Success.";
				$output2 = "Your post has been successfully submitted. </br> ";
				$output2 = $output2 . "User's ". $uname  . " Post: </br>";
				$output2 = $output2 . $input;
			}

			$result->free();
			$mysqli->close();
		}
	}

	echo "  <html>
			<head>
				<style>
					body{
						background-color: lightgrey;
						font-family: monospace;
					}
					h1{
						font-size: 50px;
					}
				</style>
			</head>
			<body>
				<h1> Response </h1>
				<p class=\"r1\"> " . $output1 .  "</p>
				<p class=\"r2\"> ". $output2  . "</p> 
			</body>
		</html>
	";
?>

