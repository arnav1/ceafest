<?php
	header('Content-type: application/json');
	session_start();
	include('config.php');
	$user_id = $_SESSION['id'];
	$quiz_id = $_POST['quiz_id'];
	$responses = $_POST['responses'];
	$time_remained = $_POST['time_remained'];
	$num_questions = $_POST['num_questions'];
	
	$responses = explode("-",$responses);
	$user_marks = 0;
	foreach($responses as $response){
		$q = "INSERT INTO users_responses (user_id,option_id) VALUES ($user_id,$response)";
		$r = mysql_query($q);
		if(mysql_affected_rows() > 0){
			
		}
		else{
			
		}
		
		$q2 = "SELECT *,q.id as question_id FROM questions as q JOIN options as o ON (q.id = o.question_id AND o.id=$response)";
		$r2 = mysql_query($q2);
		$l2 = mysql_fetch_assoc($r2);
		$question_id = $l2['question_id'];
		$q3 = "SELECT correct_response FROM questions WHERE id=$question_id";
		$r3 = mysql_query($q3);
		$l3 = mysql_fetch_assoc($r3);
		$correct_response = $l3['correct_response'];
		if($response == $correct_response){
			$user_marks++;
		}
	}
	$user_score = (((float)$user_marks/$num_questions))*10;
	$q4 = "UPDATE users_quizzes SET marks=$user_score,time_remained=$time_remained WHERE (user_id=$user_id AND quiz_id=$quiz_id)";
	$r4 = mysql_query($q4);
	if(mysql_affected_rows() > 0){
		
	}
	else{
		
	}
	print json_encode(array('user_marks' => $user_marks, 'time_remained' => $time_remained, 'error' => mysql_error()));
?>