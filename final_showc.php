
<?php
session_start();
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
   }
   
?>
<style>
table{
	border:0px;
}

</style>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style> 
    .navbar {
            margin-bottom: 0;
            border-radius: 0;
            padding: 15px;
				  background-color: GRAY;
	  text-align:center;
    }
	#index h1 {
            color:red;
    }   
    .row.content {height: 450px}
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    footer {
            background-color: gray;
            color: white;
            padding: 2%;
    }
	th, td {
          border:2px solid black;
        }
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
 
td, th {
    border: 1px solid #000000;
    text-align: left;
    padding: 8px;
}
 
tr:nth-child(odd) {
    background-color: #F2F6ED;
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
	      <div id="index">
            <img src="chlogo.png" alt="Logo" style="width:500px;height:70px;">
          </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
		<div class="col-sm-2 sidenav">
		   <div class="btn-group-vertical">
				<button onclick="window.location.href='attendance.php'" type="button" class="btn btn-primary">Daily Attendance</button>
				<button onclick="window.location.href='show_hr.php'" type="button" class="btn btn-primary">Show Attendance</button>
			
		   </div>
		</div>

			<div class="col-sm-8 text-left">
				 					
			
					 <?php
					    echo"<h3>Attendance:</h3>";
						echo"Name:".$_SESSION['name']."&nbsp&nbsp&nbsp&nbsp" ;
						echo"Designation:".$_SESSION['desig']."&nbsp&nbsp&nbsp&nbsp";
						echo"Year:".$_SESSION['year']."&nbsp&nbsp&nbsp&nbsp";
						echo"Month:".$_SESSION['month']."<br><br>";
	                  ?>



<?php
include('connection.php');

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
        include('connection.php');	
		$_SESSION['name'] =$_GET['username'];
		$username=$_GET['username'];
		$_SESSION['year']=$_GET['year'];
		$year=$_GET['year'];
		$_SESSION['month']=$_GET['month'];
		$month=$_GET['month'];

$sql = "SELECT * FROM profile1 where username='$username' and YEAR(en_time)='$year' and MONTH(en_time)='$month'";
$result = $connection->query($sql);

						if ($result->num_rows > 0) {
												 echo "<table>
												 <tr>
												 <th>Entrance Time</th>
												 <th>Late Entrance </th>
												 <th>Early Entrance </th>
												 <th>Exit Time</th>
												 <th>Late Exit </th>
												 <th>Early Exit </th>
												 </tr>";
							while($row = $result->fetch_assoc()) {
													 echo "<tr>
													 <td> ". $row["en_time"] ."</td>
													 <td> ". $row["late_hour"] ." " . $row["late_minutes"]. "</td>
													 <td>" . $row["early_hour"]. "" . $row["early_minutes"]. "</td>
													 <td>" . $row["ex_time"]. "</td>
													 <td>" . $row["early_lahour"]. "" . $row["early_laminutes"]. "</td>
													 <td>" . $row["exit_hour"]. "" . $row["exit_mitues"]. "</td>

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


               <br><br>
			   <div class="btn-group-vertical">
                  		<button onclick="window.location.href='print.php'" type="button" class="btn btn-primary">Print</button>	   
			   </div>			
				

			
			<div>
		    <div class="col-sm-8 text-left">  			
		  
		</div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Copyright © Content House Ltd</p>
</footer>

</body>
</html>
