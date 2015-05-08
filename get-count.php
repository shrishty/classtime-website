<?php 
	
	$con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  	$error = 0;

  	if(!$con) {
    	mysqli_error();
  	}

  	mysqli_select_db($con,"db_b110076cs");

	$count = array();
	for($i = 0; $i < sizeof($subjec_and_slot); $i++){
		$sql1 = "SELECT person_id, bunk_count from person_has_subjects where subject_id = $subject_id";
		  $result = mysqli_query($con, $sql1);
		  if (!$result) {
		    die('Invalid query: ' . mysql_error());
		  }
	  	  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		  array_push($count, $row);
		  $count[$i]["subject_id"] = $subject_id;
	}
	echo json_encode($count);
	mysqli_close($con);
 ?>