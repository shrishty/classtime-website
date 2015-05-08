<?php 
  ini_set('display_errors', 1);
  session_start();
  $con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  $error = 0;

  $rollno = $_SESSION["person_rollno"];

  if(!$con) {
    mysql_error();
  }

  $db = mysqli_select_db($con, "classtime");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    $subj_array = array();
    foreach ($_POST as $key => $value) {
        if (strcmp($value, "on") == 0) {
           array_push($subj_array, $key);
        }
    }
    print_r($subj_array);   
  }

  mysqli_select_db($con,"db_b110076cs");
  $sql1 = "SELECT person_id from person where person_rollno=\"$rollno\"";
  $result = mysqli_query($con, $sql1);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $person_id = $row["person_id"];
  $sql1 = "DELETE FROM person_has_subjects where person_id = $person_id";
  $result = mysqli_query($con, $sql1);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }

  foreach ($subj_array as $key => $value) {
    echo "$key, $value";
    $sql1 = "INSERT INTO person_has_subjects(subject_id, person_id) VALUES ($value, $person_id)";
    $result = mysqli_query($con, $sql1);
    if (!$result) {
      die('Invalid query: ' . mysql_error());
    }
  }
  mysqli_close($con);
  header("location:index.php");
  
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>

