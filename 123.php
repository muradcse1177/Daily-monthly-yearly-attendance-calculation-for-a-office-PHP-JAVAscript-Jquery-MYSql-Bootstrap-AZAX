<?php
session_start();   
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
   }
    
?>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
	  background-color: GRAY;
	  text-align:center;
    }
	        #index h1 {
            color:black;
        }
  </style>
  
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
	table-layout: fixed;
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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Print</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<nav class="navbar navbar-inverse">

	      <div id="index">
            <img src="chlogo.png" alt="Logo" style="width:500px;height:70px;">
          </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
	  
	  <?php
      
						include('connection.php');	

						
						$sql = "SELECT username,designation,TIME(en_time) as Entrance,TIME(ex_time) as ex_time,late_hour,late_minutes,exit_hour,exit_mitues,early_hour,early_minutes,early_lahour,early_laminutes,DATE(en_time) as Date FROM profile1";
						$result = $connection->query($sql);
						echo"<h3>Attendance:</h3>";
						echo" Attendance Of All Employee<br><br><br>" ;
						

						if ($result->num_rows > 0) {
												 echo "<table>
												 <tr>
												 <th>Daily Date</th>
												 <th>Entrance Time</th>
												 <th>Late Entrance </th>
												 <th>Early Entrance </th>
												 <th>Exit Time</th>
												 <th>Late Exit </th>
												 <th>Early Exit </th>
												 </tr>";
							while($row = $result->fetch_assoc()) {
													 echo "<tr>
													 <td> ". $row["Date"] ."</td>
													 <td> ". $row["Entrance"] ."</td>
													 <td> ". $row["late_hour"] ." " . $row["late_minutes"]. "</td>
													 <td>" . $row["early_hour"]. " " . $row["early_minutes"]. "</td>
													 <td>" . $row["ex_time"]. "</td>
													 <td>" . $row["early_lahour"]. " " . $row["early_laminutes"]. "</td>
													 <td>" . $row["exit_hour"]. " " . $row["exit_mitues"]. "</td>
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
    <div class="col-sm-2 sidenav">

    </div>
  </div>
</div>


</body>
</html>

					 DAY:<select id="mySelecty" name="day" class="form-control" style="width:300px">
							  <option value="">Select Day</option>		
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							  <option value="6">6</option>
							  <option value="7">7</option>
							  <option value="8">8</option>
							  <option value="9">9</option>
							  <option value="10">10</option>
							  <option value="11">11</option>
							  <option value="12">12</option>
							  <option value="13">13</option>
							  <option value="14">14</option>
							  <option value="15">15</option>
							  <option value="16">16</option>
							  <option value="17">17</option>
							  <option value="18">18</option>
							  <option value="19">19</option>
							  <option value="20">20</option>
							  <option value="21">21</option>
							  <option value="22">22</option>
							  <option value="23">23</option>
							  <option value="24">24</option>
							  <option value="25">25</option>
							  <option value="26">26</option>
							  <option value="27">27</option>
							  <option value="28">28</option>
							  <option value="29">29</option>
							  <option value="30">30</option>
							  <option value="31">31</option>
							  
					</select>
