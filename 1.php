<?php
session_start();   
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
	  
   }
// $q = $_REQUEST["q"];
// echo $q;
// $y = $_REQUEST["y"];
// $m = $_REQUEST["m"];

 if($_SERVER["REQUEST_METHOD"] == "GET") {
        include('connection.php');	
		$username = $_GET['username'];
		$year=$_GET['year'];
        $month=$_GET['month'];}
if ($connection->connect_error) {
	die("Connection failed: " . $connection->connect_error);
	} 
$sql = "SELECT * FROM profile where username='$username' and YEAR(en_time)='$year' and MONTH(en_time)='$month' ";
$result = $connection->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


					if ($result->num_rows > 0) {
						 echo "<table>
						 <tr>
						 <th>Name</th>
						 <th>Designation</th>
						 <th>Entrance Time</th>
						 <th>Exit Time</th>
						 <th>Late Hour</th>
						 <th>Late Minutes</th>
						 <th>Exit Hour</th>
						 <th>Exit Minutes</th>
						 </tr>";
						 while($row = $result->fetch_assoc()) {
							 echo "<tr>
							 <td> ". $row["username"] ."</td>
							 <td> ". $row["designation"] ."</td>
							 <td> ". $row["en_time"] ."</td>
							 <td>" . $row["ex_time"]. "</td>
							 <td>" . $row["late_hour"]. "</td>
							 <td>" . $row["late_minutes"]. "</td>
							 <td>" . $row["exit_hour"]. "</td>
							 <td>" . $row["exit_mitues"]. "</td>
							 </tr>";
						 }
						 echo "</table>";
					} 

?>

<style>
table{
	border:0px;
}
th, td {
          border:1px solid black;
		  width:175px;
		  background-color:gray;
        }
</style>