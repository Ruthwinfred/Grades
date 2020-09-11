<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="grade.css">
</head>
<body>
	<h1 id="h">Key in your <tt title="This is a monospaced word so fonts in this word have the same width.">correct</tt> details here to <tt title="This too is a monospaced word.">access</tt> your information:</h1>
	<hr>
	<nav>
<form method="post" id="f">
	<input type="text" name="StudentName" placeholder="Student name" title="The student's name which were registered in the database">&nbsp;&nbsp;
	<input type="text" name="Subject" placeholder="Subject" title="One of the student's subject">&nbsp;&nbsp;
	<input type="text" name="Score" placeholder="Score" title="The total marks the student got in that subject">&nbsp;&nbsp;
	<input type="submit" name="register" value="Login" title="View results">
</form>

<?php
	if (isset($_POST['register'])) {
		$std = $_POST['StudentName'];
 $sub = $_POST['Subject'];
 $sco = $_POST['Score'];

 // echo $usr;
 // echo $em;
 // echo $pwd;

 //db credentials
$servername = 'localhost';
$dbusername = "root";
$dbpassword = "";
$dbname = "grades";

//connecting to the database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

//checking errors
if ($conn->connect_error) {
	die("Connection error".$conn->connect_error);
}

//insert values into db
	$sql = "INSERT INTO users(studentName,Subject, Score) VALUES('$std','$sub','$sco')";

	//execute the query
	if ($conn->query($sql) === TRUE) {
		header('Location: view.php');
	}else{
		echo "Failled to register";
	}

	$conn->close();
	}
?>
</nav>
</body>
</html>