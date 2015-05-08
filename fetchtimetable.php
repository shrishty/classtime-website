<?php
  // ini_set('display_errors', 1);
  // include 'checklogin.php';
  $slot_table = array (
  	"Mon" => array("A", "F", "D", "B", "G", "E+", "P", "P", "H"),
  	"Tue" => array("B", "G", "E", "C", "A+", "F+", "Q", "Q", "H"),
  	"Wed" => array("C", "A", "F", "D", "H", "G+", "R", "R", "E@"),
  	"Thu" => array("D", "B", "G", "E", "NIL", "C+", "S", "S", "G@"),
  	"Fri" => array("E", "C", "A", "F", "H+", "B+", "T", "T", "D+"),
  	"Sat" => array("NIL", "NIL", "NIL", "NIL", "NIL", "NIL", "NIL", "NIL", "NIL"),
  	"Sun" => array("NIL", "NIL", "NIL", "NIL", "NIL", "NIL", "NIL", "NIL", "NIL")
  	);
  	// var_dump($slot_table);

  	$time_array = array( "8:00 am", "9:00 am", "10:15 am", "11:15 am", "1:00 pm", "2:00 pm", "3:00 pm", "4:00 pm", "5:00 pm");

  	$con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  	$error = 0;
  	$rollno = $_SESSION['person_rollno'];

  	if(!$con) {
    	mysqli_error();
    	$error = 1;
  	}

  	mysqli_select_db($con,"db_b110076cs");

	if ($error == 0) { 
	  $sql1 = "SELECT person_id, person_name from person where person_rollno = \"$rollno\"";
	  // echo "$sql1";
	  $result = mysqli_query($con, $sql1);
	  if (!$result) {
	    die('Invalid query: ' . mysql_error());
	  }
	  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	  $person_id = $row["person_id"];
	  $person_name = $row["person_name"];
	  // echo "<p>$person_id</p>";

	  $sql1 = "SELECT subject_id from person_has_subjects where person_id = $person_id";
	  $result = mysqli_query($con, $sql1);
	  if (!$result) {
	    die('Invalid query: ' . mysql_error());
	  }

	  $subjec_and_slot = array();
	  while ($row = $result->fetch_assoc()) {
    	// do what you need.
    	// print_r($row);
    	$subject_id = $row["subject_id"];
    	$sql = "SELECT subject_code, subject_slot from subjects where subject_id = $subject_id";
	  	$result1 = mysqli_query($con, $sql);
	  	if (!$result) {
	    	die('Invalid query: ' . mysql_error());
	  	}
	  	$r1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	  	$r1["subject_id"] = $subject_id;
	  	// var_dump($r1);
	  	array_push($subjec_and_slot, $r1);
	 }
	 // print_r($subjec_and_slot);

	 $student_timetable = array();
	 $i = 0;

	 foreach ($slot_table as $key => $value) {
	 	# code...
	 	$student_timetable[$key] = array();
	 	for ($i=0; $i < 9; $i++) {
	  		$subject_code = search_slot($value[$i], $subjec_and_slot);
	 		$student_timetable[$key][$i] = $subject_code;
	 	}
	 }
	 // print_r($student_timetable);
	}

	$present_time = date('H:i:s');
  	$firstclass_time = 8;

  	$upcoming_class_index = ($present_time - $firstclass_time + 1) % 9;
  	$day = date('D');	

  	if ($upcoming_class_index > 9) {
  		// echo "here";
  		$datetime = new DateTime();
		$datetime->modify('+1 day');
  		$day = $datetime->format('D');
  		$upcoming_class_index = 0;
  	}

  	if ($upcoming_class_index < 0) {
  		$upcoming_class_index = 0;
  	}

  	$upcoming_class = $student_timetable[$day][$upcoming_class_index];
  	$datetime = new DateTime();
  	$count_iter = 0;
  	while (strcmp($upcoming_class, "-") == 0 && $count_iter < 63) {
  		// echo "$upcoming_class_index";
  		$count_iter = $count_iter + 1;
  		$upcoming_class_index = ($upcoming_class_index + 1);
  		if ($upcoming_class_index >= 9) {
			$datetime->modify('+1 day');
  			$day = $datetime->format('D');
  			$upcoming_class_index = 0;
  			// echo "$day";
  		}
  		$upcoming_class = $student_timetable[$day][$upcoming_class_index];
  	}
  	$upcoming_class_time_string = $time_array[$upcoming_class_index];

	function search_slot($slot, $subject_and_slot)
	{
		$i = 0;
		for ($i = 0; $i < sizeof($subject_and_slot); $i++) { 
			# code...
			if(strcmp($subject_and_slot[$i]["subject_slot"], $slot[0]) == 0){
				if (strlen($slot) > 1) {
					return $subject_and_slot[$i]["subject_code"].$slot[1];
				}
				return $subject_and_slot[$i]["subject_code"];
			}
		}
		return "-";
	}

	mysqli_close($con);

?>