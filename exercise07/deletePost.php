<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "petertso", "upha3eWa", "petertso");

	$deleteArr = array();
	foreach($_POST["input"] as $elem){
		array_push($deleteArr, $elem);
	}

	$table = "<table>";
	$table = $table."<th>Post ID</th>";
	foreach($deleteArr as $elem){
		$query = "Delete from Posts where post_id=\"".$elem."\" ; ";
		$mysqli->query($query);
		$table = $table."<tr><td>".$elem."</td></tr>";
	}
	$table = $table."</table>";
	
	echo "	<html>
			<head>
				<style>
					body{
						background-color: black;
						color: #66ff00;
						font-family; monospace;
					}
					h1{
						font-size: 50px;
					}
					th, td{
						font-size: 25px;
						border: 4px solid darkslateblue;
						text-align: center;
						padding: 15px;
					}
				</style>
			</head>
			<body>
				<h1> Deleted Posts </h1>
				".$table."
				<p> Posts deleted successful </p>
			</body>
		</html>
	";

?>
