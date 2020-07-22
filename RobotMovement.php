<!DOCTYPE html>
<html>
<head>
<style>
	table {
		margin-left: auto;
		margin-right: auto;
		border-collapse: collapse;
	}
	
	td , th {
		text-align: center;
		vertical-align: middle;
		height: 30px; 
		width: 250px;
		border: 1px solid black;
	} 
	.input-group input {
		height: 30px;
		width: 50%;
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
<form action="RobotControlPanel.php" method="post">

<?php
	require('DBPJ_cn.inc');
	require('DBPJ_db.inc');
	$conn = db_connect(); 

		$sql = "select ro.robot_name, dir.robot_ID, dir.room_ID, dir.dir_step
		        from directions dir, robots ro
				where dir.robot_ID = ro.robot_ID 
                ORDER BY dir.dir_ID DESC LIMIT 1";
		$result = db_do_query($conn, $sql);
		$num = mysql_numrows($result);
?>

<div>
	<h2 class="heading">Where the Robot Will Go</h1>
</div>

<div class="pagecontent">
</br>
	
<table style="">
	<tr>
		<td><label>Robot Name : </label></td>
		<td><label>Last Moved : </label></td>
	</tr>
	<?php
	$i=0;
	while ($i < $num) {
			$robot_name= mysql_result($result, $i, "robot_name");
			$robot_ID= mysql_result($result, $i, "robot_ID");
			$room_ID= mysql_result($result, $i, "room_ID");
			$dir_step= mysql_result($result, $i, "dir_step");
 		// The while loop continues
	?>
	
	<tr>
		<td><?php echo $robot_name; ?></td>
		<td><?php echo $dir_step; ?></td>
	</tr>
	
	<?php
 		$i++;
	} // end while
	?>
</table>
</br>
</br>		
 </div>	
</form>
</body>
</html>



