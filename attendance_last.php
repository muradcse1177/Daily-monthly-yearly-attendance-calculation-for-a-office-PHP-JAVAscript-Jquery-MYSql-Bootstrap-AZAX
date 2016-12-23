<?php
   session_start();   
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");	  
   }
    date_default_timezone_set('Asia/Dhaka');
	include("connection.php");
						
	$sql = "SELECT * FROM profile1 WHERE username = '{$_SESSION['login_user']}' and designation = '{$_SESSION['designation']}' and DATE(ex_time)=CURDATE() ";					 
	$result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance</title>
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
	h1 {
            color:red;
    } 
    h2{
		color:red;
		text-align:center;
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
      <h1> You have Submitted Sucessfully Don't Try Again!!!</h1><br><br>
	  
	  <form  action="" method="POST" id="attendance_form">
			<div class="form-group">
			    <div class="col-xs-3">
					<label for="ex1">Name:</label>
					<input class="form-control" name="username" id="ex1" type="text" value="<?php echo $_SESSION['login_user'];?>"readonly>
			    </div>
			    <div class="col-xs-3">
					<label for="ex2">Designation</label>
					<input class="form-control" name="designation" id="ex2" type="text" value="<?php echo $_SESSION['designation'];?>"readonly>
			    </div>
			    <div class="col-xs-3">
					<label for="ex3">En.Time</label>
					<?php
					   $name=$_SESSION['login_user'];
					   include('connection.php');
					   $sqli = "SELECT * FROM profile1 where username='$name'";
					   $result = $connection->query($sqli);	
					   $row = $result->fetch_assoc();
					?>
					<input class="form-control" name="en_time" id="ex3" type="text" value="<?php echo  $row['en_time'];?>" readonly>
			    </div>

				<div class="col-xs-3">
					<label for="ex4">Ex.Time</label>
					<input class="form-control" name="ex_time" id="ex4" type="text" value="<?php echo  $row['ex_time'];?>" readonly>
			    </div>  
                    <?php
				   
					 include("connection.php");
						
					 $sql = "SELECT * FROM profile1 WHERE username = '{$_SESSION['login_user']}' and designation = '{$_SESSION['designation']}' and DATE(ex_time)=CURDATE() ";
					 
					 $result = mysqli_query($connection,$sql);
					  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);						  
					  $count = mysqli_num_rows($result);
				  
					  if(($count==1)) {
							?><div class="col-xs-3">
								  <label for="ex5"></label> 
								  <input type="submit" class="form-control" id="ex5"></input>					
							</div><br><br><br><br><br><h2></h2><?php						  
					  } 				  					  					  
				    ?>											  					  								
			</div>
      </form>
	  
    </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">

<?php 

 ?>
  <p>Copyright © Content House Ltd</p>
</footer>

</body>
</html>

