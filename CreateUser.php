<?php
$user = $_POST["user"];
$notTaken = 1;


if($user == "") {
	echo "User not stored: text field empty";
}
else {
	$mysqli = new mysqli("mysql.eecs.ku.edu", "z857s166", "", "z857s166");
	
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		echo "User not stored: could not connect to database";
		exit();
	}
	else {
		$query = "SELECT user_id FROM Users";
		if($result = $mysqli->query($query)) {
			while($row = $result->fetch_assoc()) {
				if($user == $row["user_id"]) {
					$notTaken = 0;
				}
			}
			if($notTaken == 1) {
				$toAdd = "INSERT INTO Users (user_id) VALUES ('$user')";
				if($mysqli->query($toAdd) == true) {
					echo "User successfully stored";
				}
				else {
					echo "User not stored: insert query error";
				}
			}
			else {
				echo "User not stored: ID already taken";
			}
		}
		else {
			echo "User not stored: select query failed";
		}

	}
}
?>