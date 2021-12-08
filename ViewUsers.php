<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "z857s166", "", "z857s166");
	
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	echo "Could not connect to database";
	exit();
}
else {
	$query = "SELECT user_id FROM Users";
	if($result = $mysqli->query($query)) {
		echo "<table>";
		echo "<tr><th>Users</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>";
			echo $row["user_id"];
			echo "</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "Select query failed";
	}
}


?>