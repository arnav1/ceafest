<?php
	//header('Content-type: application/json');
	session_start();
	$_SESSION['quiz_run'] = 1;
	include('config.php');
	$action = $_POST['action'];
	$quiz_id = $_POST['quiz_id'];
	$user_id = $_SESSION['id'];
	
	$q = "SELECT * FROM users_quizzes WHERE (user_id=$user_id AND quiz_id=$quiz_id)";
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0){
		$q = "UPDATE users_quizzes SET attempted=1 WHERE (user_id=$user_id AND quiz_id=$quiz_id)";
		$r = mysql_query($q);
	}
	else{
		$q = "INSERT INTO users_quizzes (user_id,quiz_id,registered,attempted) VALUES ($user_id,$quiz_id,1,1)";
		$r = mysql_query($q);
	}
	
	
	
	if($action == "get_questions"){
		
		$q = "SELECT * FROM questions WHERE id > 25 ORDER BY RAND() LIMIT 0,20";
		$r = mysql_query($q);
		//$question_ids = array();
		$quiz_html = '<h3>Online Quiz - '.$quiz_id.'</h3>';
		$quiz_html .= '<div id="timer">Time remaining : <span id="hours">00</span>:<span id="mins">30</span>:<span id="secs">00</span></div>';
		$quiz_html .= '<div id="questions_container">';
		$quiz_html .= '<form id="questions">';
			$i = 0;
			while($question = mysql_fetch_assoc($r)){
				$i++;
				$question_id = $question['id'];
				$quiz_html .= '<div class="quiz_question" id="question_'.$question_id.'">';
				//array_push($question_ids,$l['id']);
					$quiz_html .= '<p>'.$i.'. '.$question['content'].'</p>';
					$q2 = "SELECT * FROM options WHERE question_id=$question_id";
					$r2 = mysql_query($q2);
					while($option = mysql_fetch_assoc($r2)){
						$option_id = $option['id'];
						$quiz_html .= '<div id="option'.$option_id.'"><input type="radio" class="option_content" name="option_content_'.$i.'" value="option'.$option_id.'"/>'.$option['content'].'<br></div>';
					}
				$quiz_html .= '</div>';
			}
		$quiz_html .= '</form>';
		$quiz_html .= '</div>';
		$quiz_html .= '<button class="quiz_ops" id="previous_question">Previous</button><button class="quiz_ops" id="next_question">Next</button><button class="quiz_ops" id="submit_quiz">Submit</button><button class="quiz_ops" id="abort_quiz">Abort</button>';
		echo $i."----".$quiz_html;
		//print json_encode(array('quiz_html' => $quiz_html, 'num_questions' => $i, 'error' => mysql_error()));
	}
	
	
?>