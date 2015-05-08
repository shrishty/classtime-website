<?php 
  ini_set('display_errors', 1);
  $name = $rollno = $password1 = $password2 = $phoneno = $emailid  = $type = $semester = "";
  $con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
  $error = 0;

  if(!$con) {
    mysqli_error();
  }

  $db = mysqli_select_db($con, "classtime");
  echo "I am shrishty";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    if (!empty($_POST["rollno"])) {
      $rollno = test_input($_POST["rollno"]);
      echo "$rollno";
    }
    else {
      echo "<p> Roll Number is required </p>";
      $error = 1;
    }
    if (!empty($_POST["name"])) {
      # code...
      $name = test_input($_POST["name"]);
      echo "$name";
    }
    else {
      echo "<p> Name is required </p>";
      $error = 1;
  }
  if (!empty($_POST["password1"])){
    $password1 = test_input($_POST["password1"]);
  } else {
    echo "<p> Please enter password </p>";
    $error = 1;
  }
  if (!empty($_POST["password2"])) {
    # code...
    $password2 = test_input($_POST["password2"]);
  } else {
    echo "<p> Please re-enter password </p>";
    $error = 1;
  }
  if(strcmp($password1, $password2)) {
    echo "<p> Passwords dont match </p>";
    $error = 1;
  }
  if (!empty($_POST["phoneno"])) {
    # code...
    $phoneno = test_input($_POST["phoneno"]);
  } else {
    echo "<p> enter Phone Number </p>";
    $error = 1; 
  }
  if (!empty($_POST["emailid"])) {
    $emailid = test_input($_POST["emailid"]);
  } else {
    echo "<p> Enter email id </p>";
    $error = 1;
  }
  if (!empty($_POST["type"])) {
    # code...
    $type = intval(test_input($_POST["type"]));
  } else {
    echo "<p> Enter user type </p>";
    $error = 1;
  }
  if (!empty($_POST["semester"])) {
    # code...
    $semester = intval(test_input($_POST["semester"]));
  } else {
    # code...
    echo "<p> Semester not entered </p>";
    $error = 1;
  }  
}

echo "$error";
$verified = 0;
mysqli_select_db($con,"db_b110076cs");

if ($error == 0) {
  # code...

  // echo "<p>here</p>;
  $sql1 = "INSERT into person (person_name, person_rollno, person_phoneno, person_type, person_password, person_semester, person_email, person_verified) values (\"$name\", \"$rollno\", \"$phoneno\", $type, \"$password1\", $semester, \"$emailid\", $verified)";
  // echo "$sql1";
  $result = mysqli_query($con, $sql1);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }

    header("location:login.php");
  } 
    else {
    header("location:create.php");
}

mysqli_close($con);

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>

