<?php
	session_start();
	include('config.php');
	if($_SESSION['auth'] != 1) {
		header("location:login.php");
	}
	else{
?>
<html>
<head>
	<title>CEA Online Quiz</title>
	<link rel="shortcut icon" href="../images/favicon.ico" />
	<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/jquery-ui-1.8.23.custom.css" type="text/css" media="screen">
	<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.8.23.custom.min.js"></script>
	<style>
		body{
			font-family: century gothic;
		}
	</style>
	<script>
		$(document).ready(function(){
			$("#loading_gif").show();
			$.post("home_html.php",{},function(data){
				$("#article").html(data);
				$("#loading_gif").hide();
			});
			$("#home_button").click(function(){
				$("#loading_gif").show();
				$.post("home_html.php",{},function(data){
					$("#article").html(data);
					$("#loading_gif").hide();
				});
			});
			$("#take_quiz_button").click(function(){
				$("#loading_gif").show();
				$.post("take_a_quiz_html.php",{},function(data){
					$("#article").html(data);
					$("#loading_gif").hide();
				});
			});
			$("#past_quiz_button").click(function(){
				$("#loading_gif").show();
				$.post("past_quizzes_html.php",{},function(data){
					$("#article").html(data);
					$("#loading_gif").hide();
				});
			});
			
			$("body").delegate(".start_quiz","click",function(){
				var quiz_id = $(this).attr("id");
				quiz_id = quiz_id.replace(/[^\d.,]+/,"");
				$("#curr_quiz").text(quiz_id);
				$("#popup").dialog({ closeOnEscape: false });
				$("#popup").html('<p>The timer will be started as soon as you press "Yes". Are you ready?</p>').dialog({
					autoOpen: true,
					height: 250,
					width: 400,
					modal: true,
					resizable: false,
					title: "Start quiz",
					show: "fold",
					hide: "fold",
					buttons:{
						"Yes":function(){
							$(this).dialog("close");
							$(this).css("display","none");
							$("#loading_gif").show();
							$.post("quiz_run.php",
								{
									action:"get_questions",
									quiz_id:quiz_id
								},
								function(data){
									html = [];
									html = data.split("----");
									num_questions = html[0];
									quiz_html = html[1];
									$("#loading_gif").hide();
									$("#article").html(quiz_html);
									$("#num_questions").text(num_questions);
									$("#nav_overlay").show();
									//alert(data.quiz_html+"; "+data.num_questions+"; "+data.error);
									start_timer();
								}
							);
						},
						"No":function(){
							$(this).dialog("close");
							$(this).css("display","none");
						},
					},
					close: function() {
						$(this).css("display","none");
					}
				}).parent().each(function(){
					$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
					$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
					$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
					$(this).find(".ui-dialog-titlebar-close").css("display","none");
					//alert("<?php echo $_SESSION['email'];?>");
				});
			});
			
			$("body").delegate(".results, .results2","click",function(){
				$("#loading_gif").show();
				$.post('rank_disp.php',{},function(data){
					$("#article").html(data);
					$("#loading_gif").hide();
				});
			});
			
			$("body").delegate("#previous_question","click",function(){
				var question_margin = $("#questions").css("margin-top");
				question_margin = Number(question_margin.replace(/px/,""));
				//alert(question_margin);
				if(question_margin == 0){
					//question_margin = "0px";
				}
				else{
					question_margin += 370;
					//question_margin += "px";
				}
				$("#questions").css("margin-top",question_margin);
			});
			$("body").delegate("#next_question","click",function(){
				var question_margin = $("#questions").css("margin-top");
				var num_questions = $("#num_questions").text();
				question_margin = Number(question_margin.replace(/px/,""));
				//alert(question_margin);
				if(question_margin == ((num_questions-1)*(-370))){
					
					$("#popup").html("<p>That's all. Do you want to submit?</p>").dialog({
						autoOpen: true,
						height: 250,
						width: 400,
						modal: true,
						resizable: false,
						title: "Submit anwsers",
						show: "fold",
						hide: "fold",
						buttons:{
							"Yes":function(){
								$(this).dialog("close");
								$(this).css("display","none");
								submit_responses();
							},
							"No":function(){
								$(this).dialog("close");
								$(this).css("display","none");
							},
						},
						close: function() {
							$(this).css("display","none");
						}
					}).parent().each(function(){
						$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
						$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
						$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
						$(this).find(".ui-dialog-titlebar-close").css("display","none");
						//alert("<?php echo $_SESSION['email'];?>");
					});
				}
				else{
					question_margin -= 370;
					//question_margin += "px";
				}
				$("#questions").css("margin-top",question_margin);
			});
			
			$("body").delegate("#nav_overlay","click",function(){
						$("#popup").html("<p>You are now allowed to do that now. Do you want to submit or abort?</p>").dialog({
							autoOpen: true,
							height: 250,
							width: 400,
							modal: true,
							resizable: false,
							title: "Not allowed",
							show: "fold",
							hide: "fold",
							buttons:{
								"Submit":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									submit_responses();
								},
								"Abort":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									window.location.replace("index.php");
								},
								"No, go back":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									//window.location.replace("index.php");
								},
							},
							close: function() {
								$(this).css("display","none");
							}
						}).parent().each(function(){
							$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
							$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
							$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
							$(this).find(".ui-dialog-titlebar-close").css("display","none");
							//alert("<?php echo $_SESSION['email'];?>");
						});
			});
			
			$("body").delegate("#submit_quiz","click",function(){
						$("#popup").html("<p>You will no more be able to attend the same quiz. Are you sure you want to submit?</p>").dialog({
							autoOpen: true,
							height: 250,
							width: 400,
							modal: true,
							resizable: false,
							title: "Submit responses",
							show: "fold",
							hide: "fold",
							buttons:{
								"Yes":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									submit_responses();
								},
								"No":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									//window.location.replace("index.php");
								},
							},
							close: function() {
								$(this).css("display","none");
							}
						}).parent().each(function(){
							$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
							$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
							$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
							$(this).find(".ui-dialog-titlebar-close").css("display","none");
							//alert("<?php echo $_SESSION['email'];?>");
						});
			});
			
			$("body").delegate("#abort_quiz","click",function(){
						$("#popup").html('<p>You will no more be able to attend the same quiz. Are you sure you want to abort the quiz?</p>').dialog({
							autoOpen: true,
							height: 250,
							width: 400,
							modal: true,
							resizable: false,
							title: "Abort quiz",
							show: "fold",
							hide: "fold",
							buttons:{
								"Yes":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									$("#loading_gif").show();
									window.location.replace("index.php");
								},
								"No":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									//window.location.replace("index.php");
								},
							},
							close: function() {
								$(this).css("display","none");
							}
						}).parent().each(function(){
							$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
							$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
							$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
							$(this).find(".ui-dialog-titlebar-close").css("display","none");
							//alert("<?php echo $_SESSION['email'];?>");
						});
			});
			
			/*$("body").keydown(function(e){
				if(e.which == 27){
					return false;
				}
			});*/
			
			function submit_responses(){
				var responses = [];
				var num_questions = Number($("#num_questions").text());
				for(var i = 1;i<=num_questions;i++){
					var option_name = "option_content_"+i;
					var selected_option = $('input[name='+option_name+']:checked', '#questions').val();
					if(selected_option){
						selected_option = Number(selected_option.replace(/[^\d.,]+/,""));
						responses.push(selected_option);
					}
				}
				responses = responses.join("-");
				if(responses == ""){
						$("#popup").html('<p>You have not responded to any of the questions. Please respond to at least one.</p>').dialog({
							autoOpen: true,
							height: 250,
							width: 600,
							modal: true,
							resizable: false,
							title: "Please respond to at least one question.",
							show: "fold",
							hide: "fold",
							buttons:{
								"Ok":function(){
									$(this).dialog("close");
									$(this).css("display","none");
								}
							},
							close: function() {
								$(this).css("display","none");
							}
						}).parent().each(function(){
							$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
							$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
							$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
							$(this).find(".ui-dialog-titlebar-close").css("display","none");
							//alert("<?php echo $_SESSION['email'];?>");
						});
				}
				else{
					var time_remained = ((Number($("#hours").text())*3600) + (Number($("#mins").text())*60) + (Number($("#secs").text())*1));
					var quiz_id = $("#curr_quiz").text();
					$.post("calc_marks.php",
						{
							responses:responses,
							time_remained:time_remained,
							quiz_id:quiz_id,
							num_questions:num_questions,
						},
						function(data){
							//alert(data.user_marks+"; "+data.time_remained+"; "+data.error);
							$("#popup").html(data).dialog({
								autoOpen: true,
								height: 200,
								width: 600,
								modal: true,
								resizable: false,
								title: 'Your responses are recorded. Please go to "Quizzes" after the page reloads.',
								show: "fold",
								hide: "fold",
								buttons:{
									"Ok":function(){
										$(this).dialog("close");
										$(this).css("display","none");
										window.location.replace("index.php");
									}
								},
								close: function() {
									$(this).css("display","none");
								}
							}).parent().each(function(){
								$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
								$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
								$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
								$(this).find(".ui-dialog-titlebar-close").css("display","none");
								//alert("<?php echo $_SESSION['email'];?>");
							});
							
						}
					);
				}
			}
			
			
			function start_timer(){
				//var curr_time = new Date();
				$("#hours").text("00");
				$("#mins").text("30");
				$("#secs").text("00");
				intHandle = setInterval(function(){
					if($("#secs").text() == "00"){
						$("#secs").text("59");
						var mins = Number($("#mins").text());
						if(mins <= 10){
							mins = mins-1;
							mins = "0"+String(mins);
						}
						else{
							mins = mins-1;
						}
						$("#mins").text(mins);
					}
					else{
						var secs = Number($("#secs").text());
						if(secs <= 10){
							secs = secs-1;
							secs = "0"+String(secs);
						}
						else{
							secs = secs-1;
						}
						$("#secs").text(secs);
					}
					if(($("#hours").text() == "00") && ($("#mins").text() == "00") && ($("#secs").text() == "00")){
						clearInterval(intHandle);
						$("#popup").html('<p>You have ran out of time. Your quiz has been aborted.</p>').dialog({
							autoOpen: true,
							height: 250,
							width: 400,
							modal: true,
							resizable: false,
							title: "Time's up",
							show: "fold",
							hide: "fold",
							buttons:{
								"Ok":function(){
									$(this).dialog("close");
									$(this).css("display","none");
									//submit_responses();
									window.location.replace("index.php");
								}
							},
							close: function() {
								$(this).css("display","none");
							}
						}).parent().each(function(){
							$(this).find(".ui-dialog-title").css({"text-align":"center","width":"100%","font-family": "palatino-linotype","font-size": "25px"});
							$(this).css({"box-shadow":"0px 0px 50px 30px #000","border":"none"}).fadeTo("slow",0.90);
							$(this).find(".ui-dialog-titlebar").css({"border": "none","box-shadow": "0px 10px 30px 0px #555"});
							$(this).find(".ui-dialog-titlebar-close").css("display","none");
							//alert("<?php echo $_SESSION['email'];?>");
						});
						setTimeout(function(){
							$("#popup").dialog("close");
							window.location.replace("index.php");
						},3000);
					}
				},1000);
				//alert();
			}
			
			$("body").delegate(".quiz_result","click",function(){
				var quiz_id = $(this).attr("id");
				quiz_id = Number(quiz_id.replace(/[^\d.,]+/,""));
				//$("#curr_quiz").text(quiz_id);
				$.post("view_results.php",
					{
						quiz_id:quiz_id,
					},
					function(data){
						
					}
				);
				
			});
			
			
		});
		
		$(function(){
			$("#home_button").addClass("nav_selected");
			$(".nav").click(function(){
				$(".nav").removeClass("nav_selected");
				$(this).addClass("nav_selected");
			});
		});
	</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38758315-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<?php include('header.php'); ?>
	<div id="wrapper">
		<div id="navs">
			<div class="nav" id="home_button">Home</div>
			<div class="nav" id="take_quiz_button">Quizzes</div>
			<!--<div class="nav" id="past_quiz_button">Past Quizzes</div>-->
			<div class="nav"><a href='http://ceaiitm.org' target='_blank'>CEA home</a></div>
			<div class="nav"><a href='logout.php'>Logout</a></div>
		</div>
		<div id="nav_overlay"></div>
		<div id="article">
			
		</div>
		<div id="popup"></div>
		
		<div id="curr_quiz" style="display:none;"></div>
		<div id="num_questions" style="display:none;"></div>
	</div>
	<div id="loading_gif" style="display:none;z-index: 2001; background-color: black; height: 100%; width: 100%; position: fixed; top: 0%; opacity: 0.9; background-position: initial initial; background-repeat: initial initial; left: 0px;" class="broke-endless-pages"><img src="../images/loading_gif.gif" style="width: 60px;top: 48%;  left: 48%;position: fixed;"></div>
	<div id="gototop"><a href="#">Go to top</a></div>
	<?php include('footer.php'); ?>
</body>
</html>
<?php	
	}
?>