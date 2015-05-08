<?php 


	$con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  	$error = 0;

  	if(!$con) {
    	mysqli_error();
    	$error = 1;
  	}
  	echo "Here";
  	mysqli_select_db($con,"db_b110076cs");

  	if ($error == 0) {
  		$str_json = json_decode(file_get_contents('php://input'), true);
		// print_r($str_json);
		for ($i=0; $i < sizeof($str_json); $i++) { 
			$subject_id = $str_json[$i]["subject_id"];
			$person_id = $str_json[$i]["person_id"];
			$bunk_count = $str_json[$i]["bunk_count"];
			$sql1 = "UPDATE person_has_subjects SET bunk_count=$bunk_count where subject_id = $subject_id AND person_id = $person_id";
			$result = mysqli_query($con, $sql1);
	  			if (!$result) {
	    		die('Invalid query: ' . mysql_error());
	  		}			
		}
  	}
	mysqli_close($con);
 ?>