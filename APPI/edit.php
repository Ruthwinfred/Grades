<?php
	if (isset($_GET['id'])) {
		$edit_id = $_GET['id'];
		include 'connect.php';

		$sql = "SELECT * FROM users WHERE id = '$edit_id'";
		$results = $conn->query($sql);

		if ($results->num_rows > 0) {
		while ($row = $results->fetch_assoc()) {
		$db_id = $row['id'];
		$db_studentName = $row['studentName'];
		$db_Subject = $row['Subject'];
		$db_Score = $row['Score'];
		}
	}
	// 
	}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form method="post">
	<input type="text" name="id" value="<?php echo $db_id; ?>" placeholder="Student id">&nbsp;&nbsp;
	<input type="text" name="studentName" value="<?php echo $db_studentName; ?>" placeholder="Student name">&nbsp;&nbsp;
	<input type="text" name="Subject" placeholder="Subject">&nbsp;&nbsp;
	<input type="text" name="Score" placeholder="Score">&nbsp;&nbsp;
	<input type="submit" name="update" value="Update">
</form>

  <?php
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$std = $_POST['studentName'];
		$sub = $_POST['Subject'];
		$sco = $_POST['Score'];

		require_once 'connect.php';

		$sql = "UPDATE users SET studentName = '$std', Subject = '$sub', Score = '$sco' WHERE id = '$id'";

		if ($conn->query($sql) === TRUE) {
			header('Location: view.php');
		}else{
			echo "Failed to update".$conn->error;
		}
	}
?>
</body>
</html>