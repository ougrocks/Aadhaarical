<?php

	$connect = mysql_connect('localhost','root','');

	if (!$connect) {

	die('Could not connect to MySQL: ' . mysql_error());

	}

	 

	$cid =mysql_select_db('aadhaaric_licence',$connect);

	// <span class="IL_AD" id="IL_AD5">supply</span> your database name

 
	
	

	// path where your CSV file is located

	 

$csv_file = "upload\RTO.csv"; // Name of your CSV file

	$csvfile = fopen($csv_file, "r");

	$theData = fgets($csvfile);

$i = 0;

	while (!feof($csvfile)) {

	$csv_data[] = fgets($csvfile, 1024);

	$csv_array = explode(",", $csv_data[$i]);

	

	
	$reg = $csv_array[0];
	
	
	$place = $csv_array[1];

	
	$state = $csv_array[2];
	
	

	

	$query = "INSERT INTO rto_list(RegNo,Place,State) VALUES('$reg','$place','$state')" ;

$n=mysql_query($query, $connect);

	$i++;

	}

	fclose($csvfile);

	 

	echo "File data successfully imported to database!!";

	mysql_close($connect);

	?>