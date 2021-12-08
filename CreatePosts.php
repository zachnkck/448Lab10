<?php
$user = $_POST["user"];
$content = $_POST["content"];
$userExists = 0;

if($content != "") {
	$mysqli = new mysqli("mysql.eecs.ku.edu", "z857s166", "", "z857s166");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		echo "Post not submitted: could not connect to database";
		exit();
	}
	else {
		$query = "SELECT user_id FROM Users";
		if($result = $mysqli->query($query)) {
			while($row = $result->fetch_assoc()) {
				if($user == $row["user_id"]) {
					$userExists = 1;
				}
			}
			if($userExists == 1) {
				$toAdd = "INSERT INTO Posts (author_id, content) VALUES ('$user', '$content')";
				if($mysqli->query($toAdd) == true) {
					echo "Post successfully submitted";
				}
				else {
					echo "Post not submitted: insert query error";
				}				
			}
			else {
				echo "Post not submitted: user does not exist";
			}
			
		}
		else {
			echo "Post not submitted: select error";
		}
	}
}
else {
	echo "Post not submitted: no content/text";
}
?>