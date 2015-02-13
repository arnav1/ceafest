<?php
	//header('Content-type: application/json');
		include('config.php');
		$q = "SELECT * FROM questions WHERE quiz_id = 1;";
		$r = mysql_query($q);
		//$question_ids = array();
		
		$quiz_html = '<div id="questions_container">';
		$quiz_html .= '<h2>CEA Online Quiz - 1 : Questions and answers</h2>';
		$quiz_html .= '<p>(Note : Correct choices are in blue color.)</p>';
		$quiz_html .= '<form id="questions">';
			$i = 0;
			while($question = mysql_fetch_assoc($r)){
				$i++;
				$question_id = $question['id'];
				$quiz_html .= '<div class="quiz_question" id="question_'.$question_id.'">';
				//array_push($question_ids,$l['id']);
					
					$quiz_html .= '<p>'.$i.'. '.$question['content'].'</p><ul>';
					$q2 = "SELECT * FROM options WHERE question_id=$question_id";
					$r2 = mysql_query($q2);
					while($option = mysql_fetch_assoc($r2)){
						if($question['correct_response'] == $option['id']){
							$option_id = $option['id'];
							$quiz_html .= '<li><div id="option'.$option_id.'" style="color:blue;font-weight:normal;font-size:100%;">'.$option['content'].'</div></li>';
						}
						else{
							$option_id = $option['id'];
							$quiz_html .= '<li><div id="option'.$option_id.'">'.$option['content'].'</div></li>';
						}
						
					}
				$quiz_html .= '</div>';
			}
		$quiz_html .= '</form>';
		$quiz_html .= '</div>';
		
		echo $quiz_html;
		//print json_encode(array('quiz_html' => $quiz_html, 'num_questions' => $i, 'error' => mysql_error()));
	
	
?>