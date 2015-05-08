<?php
  // ini_set('display_errors', 1);
  	$con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  	$error = 0;

  	if(!$con) {
    	mysqli_error();
  	}

  	mysqli_select_db($con,"db_b110076cs");

	if ($error == 0) { 
	  $query = substr($upcoming_class, 0, strlen($upcoming_class) - 1);
	  if ($upcoming_class[strlen($upcoming_class) - 1] == '@' || $upcoming_class[strlen($upcoming_class) - 1] == '+') {
	  	# code...
	  	$sql1 = "SELECT subject_id from subjects where subject_code = \"$query\"";
	  } else {
	  	# code...
	  	$sql1 = "SELECT subject_id from subjects where subject_code = \"$upcoming_class\"";
	  }
	  $result = mysqli_query($con, $sql1);
	  if (!$result) {
	    die('Invalid query: ' . mysql_error());
	  }
	  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	  $subject_id = $row["subject_id"];

	  if($subject_id != NULL){
		  $sql1 = "SELECT person_id from person_has_subjects where subject_id = $subject_id";
		  $result = mysqli_query($con, $sql1);
		  if (!$result) {
		    die('Invalid query: ' . mysql_error());
		  }
		}

	  $person_list = array();
	  while ($row = $result->fetch_assoc()) {
    	$person_id = $row["person_id"];
    	$sql = "SELECT person_name, person_type from person where person_id = $person_id";
	  	$result1 = mysqli_query($con, $sql);
	  	if (!$result) {
	    	die('Invalid query: ' . mysql_error());
	  	}
	  	$r1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	  	// var_dump($r1);
	  	array_push($person_list, $r1);
	 }
	}

	mysqli_close($con);

?>
