<?php
session_start();   
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
   }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
  	th, td {
          border:1px solid black;
        }
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            padding: 15px;
			background-color: white;
        }
	    #index h1 {
            color:red;
        }

    .row.content {height: 450px}
    

    .sidenav {
      padding-top: 20px;
      background-color: white;
      height: 100%;
    }

        footer {
            background-color: white;
            color: white;
            padding: 2%;
        }

    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div id="index">
          <h1 class="text-center">Content House Ltd</h1>
    </div> 
    <div class="collapse navbar-collapse" id="myNavbar">
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
		<div class="col-sm-2 sidenav">
		   <div class="btn-group-vertical">
		   </div>
		</div>
		<div class="col-sm-10 text-left"> 
		  <h1>Attendance of each Person</h1>
		   <?php

						include('connection.php');	
						$username=$_SESSION['name'];
						$year=$_SESSION['year'];
						$month=$_SESSION['month'];
						$sql = "SELECT * FROM profile1 where username='$username' and YEAR(en_time)='$year' and MONTH(en_time)='$month'";
						$result = $connection->query($sql);

						if ($result->num_rows > 0) {
												 echo "<table>
												 <tr>
												 <th>Name</th>
												 <th>Designation</th>
												 <th>Entrance Time</th>
												 <th>Late Entrance Hour</th>
												 <th>Late Entance Minutes</th>
												 <th>Early Entrance Hour</th>
												 <th>Early Entrance Minutes</th>
												 <th>Exit Time</th>
												 <th>Late Exit Hour</th>
												 <th>Late Exit Minutes</th>
												 <th>Early Exit Hour</th>
												 <th>Early Exit Minutes</th>
												 </tr>";
							while($row = $result->fetch_assoc()) {
													 echo "<tr>
													 <td> ". $row["username"] ."</td>
													 <td> ". $row["designation"] ."</td>
													 <td> ". $row["en_time"] ."</td>
													 <td> ". $row["late_hour"] ."</td>
													 <td>" . $row["late_minutes"]. "</td>
													 <td>" . $row["early_hour"]. "</td>
													 <td>" . $row["early_minutes"]. "</td>
													 <td>" . $row["ex_time"]. "</td>
													 <td>" . $row["early_lahour"]. "</td>
													 <td>" . $row["early_laminutes"]. "</td>
													 <td>" . $row["exit_hour"]. "</td>
													 <td>" . $row["exit_mitues"]. "</td>
													 </tr>";
							}
							echo "</table>";	
							
							//echo "<br><br><tr><a href="."print.php?username=".$row["username"]."&designation=".$row["designation"]."&en_time=".$row["en_time"]."&late_hour=".$row["late_hour"]."&late_minutes=".$row["late_minutes"]."&early_hour=".$row["early_hour"]."&early_minutes=".$row["early_minutes"]."&ex_time=".$row["ex_time"]."&early_lahour=".$row["early_lahour"]."&early_laminutes=".$row["early_laminutes"]."&exit_hour=".$row["exit_hour"]."&exit_mitues=".$row["exit_mitues"].">Print</a></tr>";
							} 

						   else {
							echo "0 results";
						}
						$connection->close();
						?>	
		</div>
    </div>
</div>


</body>
</html>

