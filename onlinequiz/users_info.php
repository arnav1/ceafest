<?php
	include('config.php');
	
	$q = "SELECT *,substr(college,1,20) FROM users";
	$r = mysql_query($q);
	
	$html = "<html><head><title>CEA users</title></head><body><table cellpadding='5' cellspacing='0' border='1' style='font-size:95%;'>";
	//$html .= '<tr><td style="font-weight:bold;">ID</td><td style="font-weight:bold;">Name</td><td style="font-weight:bold;">Email</td><td style="font-weight:bold;">Phone</td><td style="font-weight:bold;width:10%;">College</td><td style="font-weight:bold;">Gender</td><td style="font-weight:bold;">Confirmed</td><td style="font-weight:bold;">Timestamp</td></tr>';
	$html .= '<tr><td style="font-weight:bold;">ID</td><td style="font-weight:bold;">Name</td><td style="font-weight:bold;width:10%;">College</td><td style="font-weight:bold;">Gender</td><td style="font-weight:bold;">Confirmed</td><td style="font-weight:bold;">Timestamp</td></tr>';
	while($user = mysql_fetch_assoc($r)){
		//$html .= '<tr><td>'.$user['id'].'</td><td>'.$user['fullname'].'</td><td>'.$user['email'].'</td><td>'.$user['phone'].'</td><td>'.$user['college'].'</td><td>'.$user['gender'].'</td><td>'.$user['confirmed'].'</td><td>'.$user['timestamp'].'</td></tr>';
		$html .= '<tr><td>'.$user['id'].'</td><td>'.$user['fullname'].'</td><td>'.$user['college'].'</td><td>'.$user['gender'].'</td><td>'.$user['confirmed'].'</td><td>'.$user['timestamp'].'</td></tr>';
	}
	$html .= '</table></body></html>';
	echo $html;
?>