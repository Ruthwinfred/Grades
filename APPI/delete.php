<?php
	if (isset($_GET['id'])) {
		$del_id = $_GET['id'];
		include 'connect.php';

		$sql = "SELECT * FROM users WHERE id = '$del_id'";
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
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form method="post">
	<input type="text" name="id" value="<?php echo $db_id; ?>" placeholder="Student Id" title="The student's id">&nbsp;&nbsp;
	<input type="text" name="studentName" value="<?php echo $db_studentName; ?>" placeholder="Student name" title="Registered name of a student">&nbsp;&nbsp;
	<input type="text" name="Subject" placeholder="Subject" title="One of the student's subject">&nbsp;&nbsp;
	<input type="text" name="Score" placeholder="Score" title="Total marks of the subject">&nbsp;&nbsp;
	<input type="submit" name="delete" value="delete" title="Completely remove the details.">
</form>
<?php
	if (isset($_POST['delete'])) {
		$id = $_POST['id'];
		$std = $_POST['studentName'];
		$sub = $_POST['Subject'];
		$sco = $_POST['Score'];

		require_once 'connect.php';

		$sql = "DELETE FROM users WHERE id =$id";

		if ($conn->query($sql) === TRUE) {
			header('Location: view.php');
		}else{
			echo "Failed to delete".$conn->error;
		}
	}
?>
</body>
</html>