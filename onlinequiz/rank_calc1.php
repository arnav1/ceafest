<?php
	include('config.php');
	
	$q = "SELECT COUNT(*) as total FROM users_quizzes WHERE (attempted=1 and disqualified=0 and quiz_id=1) ORDER BY marks, time_remained LIMIT 0,400;";
	$r = mysql_query($q);
	$l = mysql_fetch_assoc($r);
	$total = $l['total'];
	
	$q = "SELECT * FROM users_quizzes WHERE (attempted=1 and disqualified=0 and quiz_id=1) ORDER BY marks, time_remained LIMIT 0,400;";
	$r = mysql_query($q);
	
	$i = $total;
	//echo $total;
	$html = "<html><body><table><tr><td>Rank</td><td>Name</td><td>Marks</td><td>Time taken</td><td>Percentile</td></tr>";
	while($result = mysql_fetch_assoc($r)){
		
		//Time taken calc
		$time_taken = (1800-(int)$result['time_remained']);
		$score = $result['marks'];
		$seconds = $time_taken%60;
		$minutes = (int)($time_taken/60);
		$time_taken = $minutes." min ".$seconds." sec";
		
		$rank = $i;
		$percentile = (100-((float)($total-($total-$rank+1))/$total)*100);
		
		$user_quiz_id = $result['id'];
		$q3 = "UPDATE users_quizzes SET rank=$rank,percentile=$percentile,time_taken='$time_taken' WHERE id = $user_quiz_id";
		$r3 = mysql_query($q3);
		
		$user_id = $result['user_id'];
		$q2 = "SELECT * FROM users WHERE id=$user_id";
		$r2 = mysql_query($q2);
		$l2= mysql_fetch_assoc($r2);
		
		$fullname = $l2['fullname'];
		$marks = $result['marks'];
		$i--;
		
		if($result['marks']==0){
			continue;
		}
		$html .= "<tr><td>$rank</td><td>$fullname</td><td>$marks</td><td>$time_taken</td><td>$percentile</td></tr>";
	}
	$html .= "</table></body></html>";
	echo $html;
?>