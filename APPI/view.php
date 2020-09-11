<?php
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

//select from the table
$sql = "SELECT * FROM users";
$results = $conn->query($sql);

if ($results->num_rows > 0) {
	echo "<link rel='stylesheet' href='grade.css'><table> 
		  <tr>
		  <th>Id</th>
		  <th>StudentName</th>
		  <th>Subject</th>
		  <th>Score</th>
		  <th colspan='2'>Action</th>
		  </tr>";
	while ($row = $results->fetch_assoc()) {
	echo "<tr>
		  <td>".$row['id']."</td>
		  <td>".$row['studentName']."</td>
		  <td>".$row['Subject']."</td>
		  <td>".$row['Score']."</td>
		  <td><a href='edit.php?id=$row[id]'>Edit</a></td>
		  <td><a href='delete.php?id=$row[id]'>Delete</a></td>
		  </tr>";
	}
	echo "</table>";

}
?>
