<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<hr>
	<nav style="background-color: green">
	<center>
<a href="dashboard.php?id=view" style="color: white" title="Display registered details">View</a>&nbsp;&nbsp;|
<a href="dashboard.php?id=logout" style="color: white" title="Leave the page">Logout</a>&nbsp;&nbsp;|
<a href = "mailto: abc@example.com" title="Click here to communicate with us via email" style="color: white" >Email us</a>
<hr>
</nav>
</center>
</body>
</html>

<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		if ($id=='view') {
			include 'view.php';
		}

		if ($id=='logout') {
			echo "You clicked logout";
		}
	}
?>
