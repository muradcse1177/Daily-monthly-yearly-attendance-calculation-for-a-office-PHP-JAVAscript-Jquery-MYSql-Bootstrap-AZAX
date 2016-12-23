
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
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
	    table-layout: fixed;
        width: 120%;
	}
	 
	td, th {
		border: 1px solid #000000;
		text-align: left;
		padding: 1px;
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
</nav>
  
<div class="container-fluid text-center">    
	<div class="row content">
		<div class="col-sm-2 sidenav">
			<div class="btn-group-vertical">
				<button onclick="window.location.href='attendance.php'" type="button" class="btn btn-primary">Daily Attendance</button>			
			        <?php
			        if ($_SESSION['catagory']==1){
				    ?>
				   <button onclick="window.location.href='show.php'" type="button" class="btn btn-primary">Show Attendance</button>
				  <?php
			      }
			     else{
				 ?>
				   <button onclick="window.location.href='show_hr.php'" type="button" class="btn btn-primary">Show Attendance</button>
				  <?php
			     }
			    ?>
		  </div>
		</div>

		<div class="col-sm-8 text-left">
			    <h1> Attendance Sheet</h1>

					


				<?php
      
						include('connection.php');	
						$username=$_SESSION['name'];
						$year=$_SESSION['year'];
						$month=$_SESSION['montha'];
						$day=$_SESSION['day'];						
						
						if($_SESSION['day'] == "faka"){
							echo"<h3>Attendance:</h3>";
							echo"<b>Name:&nbsp&nbsp".$_SESSION['name']."</b>"."&nbsp&nbsp&nbsp&nbsp" ;
							echo"<b>Designation:&nbsp&nbsp".$_SESSION['desig']."</b>"."&nbsp&nbsp&nbsp&nbsp";
							echo"<b>Year:&nbsp&nbsp".$_SESSION['year']."</b>"."&nbsp&nbsp&nbsp&nbsp";
							echo"<b>Month:&nbsp&nbsp".$_SESSION['month']."</b>"."<br><br>";
							$sql = "SELECT username,designation,TIME(en_time) as Entrance,TIME(ex_time) as ex_time,late_hour,late_minutes,exit_hour,exit_mitues,early_hour,early_minutes,early_lahour,early_laminutes,DATE(en_time) as Date FROM profile1 where username='$username' and YEAR(en_time)='$year' and MONTH(en_time)='$month'";
							$result = $connection->query($sql); 
					    }
					   else if($_SESSION['name'] == "faka"){
							echo"<h3>Attendance For ALL:</h3>";
							echo"<b>Year:&nbsp&nbsp".$_SESSION['year']."</b>"."&nbsp&nbsp&nbsp&nbsp";
							echo"<b>Month:&nbsp&nbsp".$_SESSION['month']."</b>"."&nbsp&nbsp&nbsp&nbsp";
							echo"<b>Date:&nbsp&nbsp".$_SESSION['day']."</b>"."<br><br>";
							$sql = "SELECT username,designation,TIME(en_time) as Entrance,TIME(ex_time) as ex_time,late_hour,late_minutes,exit_hour,exit_mitues,early_hour,early_minutes,early_lahour,early_laminutes,DATE(en_time) as Date FROM profile1 where YEAR(en_time)='$year' and MONTH(en_time)='$month' and DAY(en_time)='$day'";
							$result = $connection->query($sql);
							 
					   }

						if ($result->num_rows > 0) {
							echo "<table>";
							 if($username == "faka"){
							 echo"<tr> 
								<th>Name</th>
								<th>Designation</th>";
							 }
							 echo "
							
							 <th>Date</th>
							 <th>Entrance Time</th>
							 <th>Early Entrance </th>
							 <th>Late Entrance </th>							 
							 <th>Exit Time</th>
							 <th>Early Exit </th>
							 <th>Late Exit (OT)</th>							 
							 </tr>";
							while($row = $result->fetch_assoc()) {
								 
								 if($username == "faka"){ 
								 echo "<tr>
									<td> ". $row["username"] ."</td>
									<td> ". $row["designation"] ."</td>";
								 }
								echo "
								 <td> ". $row["Date"] ."</td>
								 <td> ". $row["Entrance"] ."</td> 								 
								 <td>" . $row["early_hour"]. " " . $row["early_minutes"]. "</td>
								 <td> ". $row["late_hour"] ." " . $row["late_minutes"]. "</td>
								 <td>" . $row["ex_time"]. "</td>
								 <td>" . $row["exit_hour"]. "&nbsp&nbsphour&nbsp&nbsp" . $row["exit_mitues"]. "&nbsp&nbspminutes&nbsp&nbsp"."</td>
								 <td>" . $row["early_lahour"]. "&nbsp&nbsphour&nbsp&nbsp " . $row["early_laminutes"]."&nbsp&nbspminutes&nbsp&nbsp". "</td>								 
								 </tr>";
								 }
						echo "</table>";
						if($_SESSION['day'] == "faka"){
							$sql = "SELECT SUM(early_lahour) as hours,SUM(early_laminutes) as minutes FROM profile1 where username='$username' ";
							$result = $connection->query($sql);
							$row = $result->fetch_assoc();
							if($row["minutes"]<60){
								$row["minutes"]=$row["minutes"];
								$row["hours"]=$row["hours"];
							}else{
								$row["hours"]=$row["hours"]+$row["minutes"]/60;
								$row["minutes"]=$row["minutes"]%60;
							} 
													
							?><table>
								<tr >
								  <td style="text-align:right" colspan="6" >Total =</td>
								  <td style="text-align:left" colspan="1" ><?php echo $row["hours"]. "&nbsp&nbsphour&nbsp&nbsp" .$row["minutes"]."&nbsp&nbspminutes&nbsp&nbsp"?></td>
								</tr>
							</table><?php
						}
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



</body>
</html>
