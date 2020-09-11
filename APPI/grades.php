<html lang="en">
<head>
<title>Grades</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <meta http-equiv = "refresh" content = "5; url = http://www.tutorialspoint.com" /> -->
<!-- <meta http-equiv = "cookie" content = "userid = xyz; expires = Wednesday, 26-Mar-20 23:59:59 GMT;" /> -->
<meta name = "author" content = "Ruth Winfred" />
   <!-- <link rel="stylesheet" href="grade.css"> -->
   <style type = "text/css">
         .myclass {
            background-color: green;
            padding: 10px;
         }
         body > p {
   color: pink; 
}
input[type = "text"] {
   color: blue; 
}
a:link {color:white}
        
      </style>
</head>
    <body text="green" align="center" style="font-size: 20 ;font-family: Times New Roman" >
        <!-- <p>Let's do this</p> -->
        <table>
<tr>
        <marquee direction="right" style="word-spacing:10px; text-shadow:4px 4px 8px lime;">Key in student's details to view subject results here:</marquee>

        <!-- <embed src = "mid/kim.mp3" width = "100%" height = "60" style="alignment-baseline: central;" ></embed> -->

        <nav class="myclass">

        <form action="" method="post" >

        <input type="text" name="studentName" placeholder="Student name" title="The official name of a student" required> &nbsp;&nbsp;
                    
        <input type="text" name="Subject" placeholder="Subject" title="One of the student's subject" required>&nbsp;&nbsp;

        <input type="text" name="Score" placeholder="Score" title="The total marks a student scored in a single subject" required>&nbsp;&nbsp;
                    
        <input type=submit name="res" value="Result" title="Display the mean grade in that subject" required>&nbsp;&nbsp;
                     
        <input type=submit name="reg" value="Register" title="Enter the details in the database." required>&nbsp;&nbsp;

        <a href = "mailto:abc@example.com?subject = Feedback&body = Message" title="Communicate back to us via email" required>Feedback</a>
            </form>
            </nav>
        </tr>
            <tr>
            <td>
               <b style="word-spacing:10px;"> Copyright © 2020 reuwinn@yahoo.com</b>
            </td>
         </tr>
        </table>
            </body>
            </html>
<?php
if(isset($_POST['res'])){////checking whether the input element is set or not{
    $std=$_POST['studentName']; //accessing value from 2nd text field
    $sub=$_POST['Subject']; //accessing value from 3rd text field
    $sco=$_POST['Score']; //accessing value from 4th text field
    $sum=$sco; //total marks
    $avg=$sco;
    if($avg>=0&&$avg<=60)
        $grade="F";
    if($avg>60&&$avg<=69)
        $grade="C";
    if($avg>69&&$avg<=79)
        $grade="B";
    if($avg>=80)
        $grade="A";
    echo "<br><br>";
    echo "<font size=4><right>".$std." scored ".$sum." marks in ".$sub." and has a mean grade of ".$grade."</right><br>"; 
}
 ?>

 <?php
    if (isset($_POST['reg'])) {
        $std = $_POST['studentName'];
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
        header('Location: index.php');
    }else{
        echo "Failled to register";
    }

    $conn->close();
}
?> 
