<?php 

	$con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  	$error = 0;

  	if(!$con) {
    	mysqli_error();
  	}

  	mysqli_select_db($con,"db_b110076cs");

	$count = array();
	for($i = 0; $i < sizeof($subjec_and_slot); $i++){
		$subject_id = $subjec_and_slot[$i]["subject_id"];
		$sql1 = "SELECT person_id, bunk_count from person_has_subjects where subject_id = $subject_id";
		  $result = mysqli_query($con, $sql1);
		  if (!$result) {
		    die('Invalid query: ' . mysql_error());
		  }
	  	  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		  array_push($count, $row);
		  $count[$i]["subject_id"] = $subject_id;
	}
	mysqli_close($con);

	for ($i=0; $i < sizeof($subjec_and_slot); $i++) { 
		# code...
		// var_dump($person_list[$i]["person_name"]);
		echo "<li class=\"list-group-item\">";
		print_r($subjec_and_slot[$i]["subject_code"]);
		echo "<button type=\"button\" class=\"btn btn-info btn-xs pull-right\" id=\"bunk_count_plus\" onclick=\"onBunkCountPlus(";
			print_r($count[$i]["subject_id"]);
			echo ",";
			print_r($count[$i]["bunk_count"]);
			echo ",";
			print_r($count[$i]["person_id"]);
			echo ",";
			print_r($i);
			echo ")\">+</button>";
		echo "<button type=\"button\" class=\"btn btn-default btn-xs pull-right\" id=\"bunk_count$i\">";
		print_r($count[$i]["bunk_count"]);
		echo "</button>";
		echo "<button type=\"button\" class=\"btn btn-info btn-xs pull-right\" id=\"bunk_count_minus\" onclick=\"onBunkCountMinus(";
			print_r($count[$i]["subject_id"]);
			echo ",";
			print_r($count[$i]["bunk_count"]);
			echo ",";
			print_r($count[$i]["person_id"]);
			echo ",";
			print_r($i);
			echo ")\">-</button>";
		echo "</li>";
	}

?>