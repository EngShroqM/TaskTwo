<!DOCTYPE html>
<html>
<head>

<style>
	
	.input-group input {
		height: 30px;
		width: 30%;
		padding: 5px 10px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid gray;
	}
	
	.btns{
		height: 35px; 
		width:200px;
		border-radius: 20px;
		background-color: #999; 
	    color: black; 
	    border: 0px solid;
	}
	
	.btns:hover {
	  background-color: #ffffdd;
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
		padding: 5px;
	}

</style>

</head>

<body class="pagebg">
<form action="RobotControlPanel.php" method="post" >
	<div>
		<h2 class="heading">Choose The Following</h1>
	</div>
	
	<div class="pagecontent">

		</br>
		
		<?php
			require('DBPJ_cn.inc');
			require('DBPJ_db.inc');
			$conn = db_connect(); 
				
			$queryRobot="SELECT robot_name, robot_ID from robots;";
			$resultRobot=db_do_query($conn, $queryRobot);
			$numRobot = mysql_numrows($resultRobot);
			
			$queryRoom = "SELECT room_name, room_ID from rooms;";
			$resultRoom = db_do_query($conn, $queryRoom);
			$numRoom = mysql_numrows($resultRoom);
			
			mysql_close();
		?>
		
		<div class="input-group">
			<label>Robot :</label>
			<select required class="input-group" name="robot_ID">
					<option value ="">-- select robot --</option>
				<?php
				$i=0;
				while ($i < $numRobot) {
						$robot_ID= mysql_result($resultRobot, $i, "robot_ID");
						$robot_name= mysql_result($resultRobot, $i, "robot_name");
				?>
					<option value= <?php echo $robot_ID; ?> > <?php echo $robot_name; ?> </option>
				<?php
						$i++;
				} // end while
				?>
			</select>
		</div>	
		
		</br>
		
		<div class="input-group">
			<label>Room :</label>
			<select required class="input-group" name="room_ID">
					<option value ="">-- select room --</option>
				<?php
				$i2=0;
				while ($i2 < $numRoom) {
						$room_ID= mysql_result($resultRoom, $i2, "room_ID");
						$room_name= mysql_result($resultRoom, $i2, "room_name");
				?>
					<option value= <?php echo $room_ID; ?> > <?php echo $room_name; ?> </option>
				<?php
						$i2++;
				} // end while
				?>
			</select>
		</div>
		
		</br>
		</br>
		
		<div>
			<button href="RobotControlPanel.php?room_ID=<?php echo $room_ID; ?>&robot_ID=<?php echo $robot_ID; ?>" class="btns" type="submit" name="send" >Go to Control Panel Page</button>
			
		</div>
		
		</br>
		
	</div>	
</form>
</body>
</html>
