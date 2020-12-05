<?php
	/* setup */
	$mysqli = new mysqli("mysql.eecs.ku.edu", "petertso", "upha3eWa", "petertso");
	
	/* get the input from post */
	$input = $_POST["input"];

	/* get posts form user */
	$query = "Select * from Posts where author_id=\"".$input."\" ;";
	$result = $mysqli->query($query);

	$table = "<table>";
	$table = $table . "<th> Post ID </th> <th> Post Content </th>";
	
	while($row = $result->fetch_assoc()){
		$table = $table . "<tr> <td> " . $row["post_id"] . "</td> <td>".$row["content"]."</td></tr>";
	}
	$table = $table . "</table>";

	echo "	<html>
			<head>
				<style>
					body{
						background-color: black;
						color: #66ff00;
						font-family: monospace;
					}
					h1{
						font-size: 50px;
					}
					td, th{
						font-size: 25px;
						border: 3px solid darkslateblue;
						text-align: left;
						padding: 15px;
					}
				</style>
			</head>
			<body>
				<h1> Posts from user ".$input."</h1>
				".$table."
			</body>
		</html>
	";

	$result->free();
	$mysqli->close();

?>

