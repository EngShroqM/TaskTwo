<?php
 	function db_connect(){
		
 		// use constants defined in DBPJ_cn.inc
 		$conn = mysql_connect(My_HN, My_UN, My_PW) or die("Could not Connect to Host");
 		@mysql_select_db(My_DB) or die("Could not Connect to Database");
		
 		// Return the connection ID
 		return($conn);
 	}

 	// Execute the query statement; return result as an array of table rows or produce an error message
 	function db_do_query($conn, $statement){
 		$result = mysql_query($statement) or die("Unable to Query Database");
 		return($result);
 	}
?>
