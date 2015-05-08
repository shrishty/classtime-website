<?php
	$con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  	$error = 0;


  	if(!$con) {
    	mysqli_error();
  	}

  	mysqli_select_db($con,"db_b110076cs");

	if ($error == 0) { 
	  $sql1 = "SELECT subject_id, subject_name, subject_code, subject_slot from subjects";
	  $result = mysqli_query($con, $sql1);
	  if (!$result) {
	    die('Invalid query: ' . mysql_error());
	  }
	  // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	  $subject_list = array();
	  while ($row = $result->fetch_assoc()) {
	  	array_push($subject_list, $row);
	  	echo "<input type=\"checkbox\" class=\"checkbox\" name=\"$row[subject_id]\">$row[subject_name] ($row[subject_slot] - Slot)</input> <br>";
	 }
	}

	mysqli_close($con);
?>