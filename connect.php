<?php
// Create connection
$conn = mysqli_connect('localhost:16151','root','','ngolist');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";	
// $sqlget="";
// $sqldata="";

// $sqlget = 'SELECT * FROM user';
// $sqldata = mysqli_query($conn,$sqlget);

// echo "<table>";
// echo "<tr><th>Name</th><th>Username</th><th>Password</th></tr>";
// while ($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)) {
// 	echo "<tr><td>";
// 	echo $row['Host'];
// 	echo "</td><td>";
// 	echo $row['User'];
// 	echo "</td><td>";
// 	echo $row['Password'];
// 	echo "</td></tr>";
// }

// echo "</table>";
// ?>