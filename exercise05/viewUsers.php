<?php
	/* get all users */
	$mysqli = new mysqli("mysql.eecs.ku.edu", "petertso", "upha3eWa", "petertso");

	/* get the table as result */
	$query = "Select user_id from Users where 1=1 ;";
	$result = $mysqli->query($query);

	$table = "";
	$table = "<table> ";
	$table = $table . "<th> # </th> <th> USER ID </th> ";
	$i = 0;
	while($row = $result->fetch_assoc()){
		$table = $table . "<tr> <td> ". $i++ . "</td> <td>". $row["user_id"] . "</td> </tr>"; 
	}
	$table = $table . "</table>";

	$result->free();
	$mysqli->close();


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
					tr:nth-child(odd){
						background-color: white;
					}
					tr:nth-child(even){
						background-color: lightgrey;
					}
					td, th{
						font-size: 25px;
						color: black;
						border: 2px solid #66ff00;
						text-align: left;
						padding: 12px;
					}
				</style>
			</head>
			<body>
				<h1> All Users </h1>
				".$table."
			</body>
		</html>
	";
?>

