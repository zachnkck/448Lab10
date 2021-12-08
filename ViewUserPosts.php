<?php
$user = $_POST["user"];
echo $user;

$mysqli = new mysqli("mysql.eecs.ku.edu", "z857s166", "", "z857s166");
	
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	echo "Could not connect to database";
	exit();
}
else {
	$query = "SELECT post_id, content FROM Posts WHERE author_id='$user'";
	if($result = $mysqli->query($query)) {
		echo "<table><tr><th>Post ID</th><th>Content</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["content"] . "</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "Select query failed";
	}
	
}
?>