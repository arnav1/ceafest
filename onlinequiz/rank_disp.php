<?php
	include('config.php');
	
	$q = "SELECT * FROM users_quizzes WHERE (marks>0 and disqualified=0) ORDER BY rank ASC";
	$r = mysql_query($q);
	
	//echo $total;
	$html = "<html><body><table cellpadding='5' cellspacing='0' border='1' style='font-size:95%;'><tr><td style='font-weight:bold;'>*Rank</td><td style='font-weight:bold;'>Name</td><td style='font-weight:bold;'>Marks</td><td style='font-weight:bold;'>Time taken</td><td style='font-weight:bold;'>Percentile</td></tr>";
	while($result = mysql_fetch_assoc($r)){
		$user_id = $result['user_id'];
		$q2 = "SELECT * FROM users WHERE id=$user_id";
		$r2 = mysql_query($q2);
		$l2 = mysql_fetch_assoc($r2);
		
		$fullname = $l2['fullname'];
		$rank = $result['rank'];
		$marks = $result['marks'];
		$time_taken = $result['time_taken'];
		$percentile = $result['percentile'];
		
		$html .= "<tr><td>$rank</td><td>$fullname</td><td>$marks</td><td>$time_taken</td><td>$percentile</td></tr>";
	}
	$html .= "</table><p style='padding-bottom: 30px;'>*Only the participants with marks greater than zero are ranked.</p></body></html>";
	echo $html;
?>