<?php 
	for ($i=0; $i < sizeof($person_list); $i++) { 
		# code...
		// var_dump($person_list[$i]["person_name"]);
		echo "<li class=\"list-group-item\">";
		print_r($person_list[$i]["person_name"]);
		echo " ";
		if ($person_list[$i]["person_type"] == 2) {
			# code...
			echo "(teacher)";
		}
		else {
			echo "(student)";
		}
		echo "</li>";
	}

?>