<?php
	header('Content-type: application/json');
	session_start();
	include('config.php');
	
	$quiz_id = $_POST['quiz_id'];
	$user_id = $_SESSION['id'];
	
	$q = "SELECT * FROM users_quizzes WHERE (user_id=$user_id AND quiz_id=$quiz_id)";
	$r = mysql_query($q);
	$l = mysql_fetch_assoc($r);
	$marks = $l['marks'];
	$time_taken = (1800-(int)$l['time_remained']);
	$seconds = $time_taken%60;
	$minutes = (int)($time_taken/60);
	
	print json_encode(array('quiz_html' => $quiz_html, 'num_questions' => $i, 'error' => mysql_error()));
?>