<?php 
  ini_set('display_errors', 1);
  $con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  $error = 0;

  $rollno = $_SESSION["person_rollno"];

  if(!$con) {
    mysql_error();
  }

  $db = mysqli_select_db($con, "classtime");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_id = $_POST["type"];
  }

  mysqli_select_db($con,"db_b110076cs");
  $sql1 = "SELECT person_id from person_has_subjects where subject_id=$subject_id";
  $result = mysqli_query($con, $sql1);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }
  
  $person_list = array();
  while ($row = $result->fetch_assoc()) {
	array_push($person_list, $row);
 }
 // print_r($person_list);

 $subj_list = array();
 foreach ($person_list as $key => $value) {
 	$person_id = $value["person_id"];
 	$sql1 = "SELECT subject_id from person_has_subjects where person_id=$person_id";
 	//echo "$sql1";
 	$result = mysqli_query($con, $sql1);
  	if (!$result) {
    	die('Invalid query: ' . mysql_error());
  	}
  	while ($row = $result->fetch_assoc()) {
		array_push($subj_list, $row["subject_id"]);
 	}
 }
 $subj_list1 = array_unique($subj_list);
 // print_r($subj_list1);

 $slot_list = array();
 foreach ($subj_list1 as $key => $value) {
 	$sql1 = "SELECT subject_slot from subjects where subject_id=$value";
 	$result = mysqli_query($con, $sql1);
  	if (!$result) {
    	die('Invalid query: ' . mysql_error());
  	}
  	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  	array_push($slot_list, $row["subject_slot"]);
 }

 $slot_list = array_unique($slot_list);
 // print_r($slot_list);

 $all_slots = array("A", "B", "C", "D", "E", "F", "G", "H", "P", "Q", "R", "S", "T");
 $free_slots = array_diff($all_slots, $slot_list);
 // print_r($free_slots);
 $_SESSION["free_slots"] = $free_slots;
 // print_r($_SESSION);
 mysqli_close($con);
 //header("location:index.php");
  
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


 ?>