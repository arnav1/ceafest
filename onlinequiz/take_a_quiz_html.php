<?php
	session_start();
	include('config.php');
	
	$user_id = $_SESSION['id'];
	/*$q = "SELECT quiz_id FROM users_quizzes WHERE (user_id =$user_id AND attempted=1)";
	$r = mysql_query($q);
	$attempted_quiz_ids = array();
	while($l = mysql_fetch_assoc($r)){
		array_push($attempted_quiz_ids,$l['quiz_id']);
	}*/
	
	$q = "SELECT * FROM quizzes WHERE 1";
	$r = mysql_query($q);
	
	$take_quiz_html = "<table cellpadding='5' cellspacing='0' border='1' style='font-size:95%;'><tr><td style='font-weight:bold;'>Quiz title</td><td style='font-weight:bold;'>Starts</td><td style='font-weight:bold;'>Ends</td><td style='font-weight:bold;'>Rank</td><td style='font-weight:bold;'>Percentile</td><td style='font-weight:bold;'>Score(out of 10)</td><td style='font-weight:bold;'>Time taken</td><td style='font-weight:bold;'>Start quiz</td></tr>";
	
	//$i = 0;
	
	while($l = mysql_fetch_assoc($r)){
		if($l['new'] == 0){
			$quiz_id = $l['id'];
			$q2 = "SELECT * FROM users_quizzes WHERE (user_id =$user_id AND attempted=1 AND quiz_id=$quiz_id)";
			$r2 = mysql_query($q2);
			
			if(mysql_num_rows($r2) > 0){
				$l2 = mysql_fetch_assoc($r2);
				
				//Time taken calc
				$time_taken = (1800-(int)$l2['time_remained']);
				$score = $result['marks'];
				$seconds = $time_taken%60;
				$minutes = (int)($time_taken/60);
				$time_taken = $minutes." min ".$seconds." sec";
				
				if($l2['disqualified'] == 1){
					$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td style="font-weight:bold;">Disqualified due to multiple accounts</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td><div class="" id="'.$l['id'].'">Quiz is over</div></td></tr>';
					//$i++;
				}
				else if($l2['disqualified'] == 0){
					$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td style="font-weight:bold;">'.$l2['rank'].'</td><td style="font-weight:bold;">'.$l2['percentile'].'</td><td style="font-weight:bold;">'.$l2['marks'].'</td><td style="font-weight:bold;">'.$time_taken.'</td><td><div class="" id="'.$l['id'].'">Quiz is over</div></td></tr>';
					//$i++;
				}
			}
			else{
				$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td style="font-weight:bold;">You missed.</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td><div class="" id="'.$l['id'].'">Quiz is over</div></td></tr>';
			}
			/**/
			//$i++;
		}
		else if($l['new'] == 1){
			$quiz_id = $l['id'];
			$q2 = "SELECT * FROM users_quizzes WHERE (user_id =$user_id AND attempted=1 AND quiz_id=$quiz_id)";
			$r2 = mysql_query($q2);
			
			if(mysql_num_rows($r2) > 0){
				$l2 = mysql_fetch_assoc($r2);
				
				//Time taken calc
				$time_taken = (1800-(int)$l2['time_remained']);
				$score = $result['marks'];
				$seconds = $time_taken%60;
				$minutes = (int)($time_taken/60);
				$time_taken = $minutes." min ".$seconds." sec";
				
				if($l2['disqualified'] == 1){
					$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td style="font-weight:bold;">Disqualified due to multiple accounts</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td><div class="" id="'.$l['id'].'">Quiz is over</div></td></tr>';
					//$i++;
				}
				else if($l2['disqualified'] == 0){
					$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">'.$l2['marks'].'</td><td style="font-weight:bold;">'.$time_taken.'</td><td><div class="" id="'.$l['id'].'">Attempted</div></td></tr>';
					//$i++;
				}
			}
			else{
				$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td style="font-weight:bold;">-</td><td><div class="start_quiz" id="'.$l['id'].'">Start quiz</div></td></tr>';
			}
			
			//$i++;
		}
		/*if(in_array($l['id'],$attempted_quiz_ids)){
			continue;
		}
		else{
			$take_quiz_html .= '<tr><td><div class="quiz" id="quiz'.$l['id'].'">'.$l['name'].'</div></td><td><div class="start_date">'.$l['start_date'].' hrs</div></td><td><div class="end_date">'.$l['end_date'].' hrs</div></td><td><div class="" id="'.$l['id'].'">Quiz is over</div></td></tr>';
			$i++;
		}*/
		//$i++;
	}
	/*if($i == 0){
		$take_quiz_html .= "<tr><td>No new quiz</td><td>-</td><td>-</td><td>-</td></tr>";
	}*/
	$take_quiz_html .= "</table>";
	echo $take_quiz_html;
?>