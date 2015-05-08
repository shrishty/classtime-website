<?php
	//ini_set('display_errors', 1);
	$con = mysqli_connect("athena.nitc.ac.in", "b110076cs", "b110076cs");
	mysqli_select_db($con,"db_b110076cs");
	$error = 0;


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    if (!empty($_POST["rollno"])) {
	      $rollno = test_input($_POST["rollno"]);
	    }
	    else {
	      echo "<p> Roll Number is required </p>";
	      $error = 1;
	    }
	    if (!empty($_POST["password"])) {
	    	# code...
	    	$password = test_input($_POST["password"]);
	    } else {
	    	echo "<p> Password required </p>";
	    	$error = 1;
	    }
	}
  	
  	if ($error == 0) {
  		# code...

		$sql1 = "SELECT person_password from person where person_rollno = \"$rollno\"";
	  	$result = mysqli_query($con, $sql1);
	  	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	  	var_dump($result);
	  	var_dump($row);
	  	if (!$result) {
	    	die('Invalid query: ' . mysql_error());
	  	}

	  	if (strcmp($row["person_password"], $password) == 0) {
	  		# code...
	  		session_start();
			$_SESSION['sid']=session_id();
			$_SESSION['person_rollno'] = $rollno;
			header("location:securepage.php");
	  	} else {
	  		header("Location:login.php");
	  	}
  	}

  	mysqli_close($con);

  	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}


?>