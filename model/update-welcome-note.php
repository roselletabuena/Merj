<?php
	include '../php/connection.php';
	$w_title = $_POST['w_title'];
	$w_note = $_POST['w_note'];
	
	$updateWelcome = "UPDATE welcome_note SET welcome_title = '".$w_title."', welcome_note = '".$w_note."' ";

	if ($dbc->query($updateWelcome) == true) {
	    echo "Updated";
	}

	$date = date('Y-m-d'); 
    $time = date('H:i:s');
    $insertActionLog = "INSERT INTO action_logs (description, data_affected, on_table, date, time) VALUES (?,?,?,?,?)";
    $dbc->prepare($insertActionLog)->execute(['Updated', $w_title, 'None', $date, $time]);
?>