<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "z857s166", "", "z857s166");
	
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	echo "Could not connect to database";
	exit();
}
else {
	foreach($_POST as $postID) {
		if($mysqli->query("DELETE FROM Posts WHERE post_id='$postID'")) {
			echo "Deleted post with ID " . $postID . "<br>";
		}
		else {
			echo "Delete query failed";
		}
	}
}
?>