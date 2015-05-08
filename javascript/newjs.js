$('.checkbox').checkbox();

function reqListener () {
      console.log(this.responseText);
}

function onBunkCountPlus (subject_id,bunk_count,student_id, index) {
	console.log(count_array[index]);
	count_array[index]['bunk_count'] = parseInt(count_array[index]["bunk_count"]) + 1;
	var http = new XMLHttpRequest();
	var url = "http://127.0.0.1/site/get-updated-count.php";
	var str_json = JSON.stringify(count_array);
	http.open("POST", url, true);

	//Send the proper header information along with the request
	// http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// http.setRequestHeader("Content-length", count_array.length);
	// http.setRequestHeader("Connection", "close");

	// http.setRequestHeader("Content-type", "application/json");
	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
	        // alert(http.responseText);
	    }
	}
	http.send(str_json);

	var x=document.getElementById("bunk_count" + index);
  	x.innerHTML = count_array[index]['bunk_count'];
}

function onBunkCountMinus (subject_id,bunk_count,student_id, index) {
	console.log(count_array[index]);
	count_array[index]['bunk_count'] = parseInt(count_array[index]["bunk_count"]) - 1;
	var http = new XMLHttpRequest();
	var url = "http://127.0.0.1/site/get-updated-count.php";
	var str_json = JSON.stringify(count_array);
	http.open("POST", url, true);

	//Send the proper header information along with the request
	// http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// http.setRequestHeader("Content-length", count_array.length);
	// http.setRequestHeader("Connection", "close");

	// http.setRequestHeader("Content-type", "application/json");
	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
	        // alert(http.responseText);
	    }
	}
	http.send(str_json);

	var x=document.getElementById("bunk_count" + index);
  	x.innerHTML = count_array[index]['bunk_count'];
}
