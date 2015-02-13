<?php
	session_start();
	include('config.php');
	$user_id = $_SESSION['id'];
	$q = "SELECT *,q.id as quiz_id FROM quizzes as q JOIN users_quizzes as uq ON (q.id=uq.quiz_id AND uq.user_id =$user_id AND uq.attempted=1)";
	$r = mysql_query($q);
	//$attempted_quiz_ids = array();
	//$take_quiz_html = "<table cellspacing='2' border='1'><tr><td>Quiz title</td><td>Start date</td><td>End date</td><td>Score(out of 10)</td><td>Time taken</td><td>View result</td></tr>";
	$take_quiz_html = "<table cellpadding='5' cellspacing='0' border='1' style='font-size:95%;'><tr><td style='font-weight:bold;'>Quiz title</td><td style='font-weight:bold;'>Start date</td><td style='font-weight:bold;'>End date</td><td style='font-weight:bold;'>Score(out of 10)</td><td style='font-weight:bold;'>Time taken</td></tr>";
	$i = 0;
	while($l = mysql_fetch_assoc($r)){
		$time_taken = (1800-(int)$l['time_remained']);
		$score = $l['marks'];
		$seconds = $time_taken%60;
		$minutes = (int)($time_taken/60);
		$time_taken = $minutes." min ".$seconds." sec";
		//$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['quiz_id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].'</div></td><td><div class="end_date">'.$l['end_date'].'</div></td><td><div class="score">'.$score.'</div></td><td><div class="time_taken">'.$time_taken.'</div></td><td><div class="quiz_result" id="quiz_result_'.$l['quiz_id'].'">View result</div></td></tr>';
		$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['quiz_id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td><div class="score">'.$score.'</div></td><td><div class="time_taken">'.$time_taken.'</div></td></tr>';
		$i++;
	}
	if($i == 0){
		//$take_quiz_html .= "<tr><td>No past quiz</td><td>-</td><td>-</td><td>-</td></tr>";
		$take_quiz_html .= "<tr><td>No past quiz</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
	}
	$take_quiz_html .= "</table>";
	echo $take_quiz_html.mysql_error();
?>