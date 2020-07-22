<!DOCTYPE html>
<html>
<head>
<title>Robot Controller Page</title>
<style>
	table {
		margin-left: auto;
		margin-right: auto;
	}
	
	td {
		text-align: center;
		vertical-align: middle;
		height: 10px; 
		width: 10px;
	}
	
	.btns{
		height: 35px; 
		width:80px;
		border-radius: 20px;
		background-color: #999; 
	    color: black; 
	    border: 0px solid;
	}
	
	.btns:hover {
	  background-color: #ffffdd;
	}
	
	.stopbtn{
		background-color: #d3de32;
	}
	
	.pagecontent{
		margin: auto;
		background: white;
		padding: 10px;
		text-align: center;
	}
	
	.pagebg {
		background: #d3de32;
	}
	
	.heading {
		background-color: #006a71;
		color: white;
		text-align: center;
		padding: 10px;
	}

</style>
</head>
<body class="pagebg">
		
		<?php
			require('DBPJ_cn.inc');
			require('DBPJ_db.inc');
			$conn = db_connect(); 
			
			$robot_ID = $_POST['robot_ID'];
			$room_ID = $_POST['room_ID'];
			
			if (isset($_POST['L'])) {
				$Lbtn = $_POST['L'];
				$query1 = "INSERT INTO directions (robot_ID, room_ID, dir_step) VALUES ($robot_ID,$room_ID ,'$Lbtn')";
				$result1 = db_do_query($conn, $query1);
				header("Location:RobotMovement.php");
			}
			else if (isset($_POST['R'])) {
				$Rbtn = $_POST['R'];
				$query1 = "INSERT INTO directions (robot_ID, room_ID, dir_step) VALUES ($robot_ID,$room_ID ,'$Rbtn')";
				$result2 = db_do_query($conn, $query1);
				header("Location:RobotMovement.php");
			}
			else if (isset($_POST['F'])) {
				$Fbtn = $_POST['F'];
				$query1 = "INSERT INTO directions (robot_ID, room_ID, dir_step) VALUES ($robot_ID,$room_ID ,'$Fbtn')";
				$result3 = db_do_query($conn, $query1);
				header("Location:RobotMovement.php");
			}
			else if (isset($_POST['B'])) {
				$Bbtn = $_POST['B'];
				$query1 = "INSERT INTO directions (robot_ID, room_ID, dir_step) VALUES ($robot_ID,$room_ID ,'$Bbtn')";
				$result4 = db_do_query($conn, $query1);
				header("Location:RobotMovement.php");
			}
			else if (isset($_POST['S'])) {
				$Sbtn = $_POST['S'];
				$query1 = "INSERT INTO directions (robot_ID, room_ID, dir_step) VALUES ($robot_ID,$room_ID ,'$Sbtn')";
				$result5 = db_do_query($conn, $query1);
				header("Location:RobotMovement.php");
			}
			
			mysql_close();
		?>
		
	<div>
		<h2 class="heading">Control the Robot by Clicking the Following Buttons</h1>
	</div>
	<form method="post" action="RobotControlPanel.php" target="_blank">
	<div class="pagecontent">
		<table style="">
		  <tr>
			<td></td>
			<td><button class="btns" name="F" type="sumbit" value="F">Forward</button></button></td>
			<td></td>
		  </tr>
		  <tr>
			<td><button class="btns" name="L" type="sumbit" value="L">Left</button></td>
			<td><button class="btns stopbtn" name="S" type="sumbit" value="S">Stop</button></button></td>
			<td><button class="btns" name="R" type="sumbit" value="R">Right</button></button></td>
		  </tr>
		  <tr>
			<td></td>
			<td><button class="btns" name="B" type="sumbit" value="B">Backward</button></button></td>
			<td></td>
		  </tr>
		</table>
	</div>
	
	<div>
		<input type="hidden" id = "robot_ID" value = "<?php  echo $_POST['robot_ID']; ?>"  name = "robot_ID" >
		<input type="hidden" id = "room_ID" value = "<?php  echo $_POST['room_ID']; ?>"  name = "room_ID" >
	</div>
	
</form>
</body>
</html>