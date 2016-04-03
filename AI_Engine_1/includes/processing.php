<?php
//Checking 'input' has been entered
if(isset($_GET['input']) == TRUE && empty($_GET['input']) == FALSE) {

	//Storing query from GET form into variable
    $text = trim(htmlentities($_GET['input']));

		//Checking connection to internet
		if (navigator.onLine){
			if (strpos($text, 'hello') !== FALSE || strpos($text, 'hi') !== FALSE) {
				$answer = 'Greetings!';
				?>
				<div id="output">
					<div id="input">
						<?php echo '<strong>Input:</strong><br><br>'.$text; ?>
					</div>
					<div id="answer">
						<?php echo '<strong>Output</strong><br><br>'.$answer; ?>
					</div>
				</div>
				<a href="index.php">
					<div class="askagain">
						<div id="askagain1">
							Ask another question
						</div>
					</div>
				</a>
				<?php
			}elseif (strpos($text, 'how are you') !== FALSE || strpos($text, 'how do you do') !== FALSE) {
				$answer = 'I\'m a computer ... I just follow the commands of Master Oliver Crow.';
				?>
				<div id="output">
					<div id="input">
						<?php echo '<strong>Input:</strong><br><br>'.$text; ?>
					</div>
					<div id="answer">
						<?php echo '<strong>Output</strong><br><br>'.$answer; ?>
					</div>
				</div>
				<a href="index.php">
					<div class="askagain">
						<div id="askagain1">
							Ask another question
						</div>
					</div>
				</a>
				<?php
			}elseif (strpos($text, 'what\'s your name') !== FALSE || strpos($text, 'whats your name') !== FALSE) {
				$answer = 'I\'m a computer program. I have no name.  :(';
				?>
				<div id="output">
					<div id="input">
						<?php echo '<strong>Input:</strong><br><br>'.$text; ?>
					</div>
					<div id="answer">
						<?php echo '<strong>Output</strong><br><br>'.$answer; ?>
					</div>
				</div>
				<a href="index.php">
					<div class="askagain">
						<div id="askagain1">
							Ask another question
						</div>
					</div>
				</a>
				<?php
			//Checking connection to server
			}else{
				if(navigator.onLine){

				//Data Processing File
				require 'includes/data.php';

				//Outputting Answer
				?>
				<div id="output">
					<div id="input">
						<?php echo '<strong>Input:</strong><br><br>'.$text; ?>
					</div>
					<div id="answer">
						<?php echo $answer; ?>
					</div>
				</div>
				<?php

				}else{
					//ECHOing server connection error
					$error = 'Could not connect to server.';
				}
			}
	}else{
		//ECHOing internet connection error
		$error = 'Could not connect to internet.';
	}
}else{
	//Calling Form
	include 'includes/form.php';
}

if(empty($error) == FALSE) {
	//Outputting Errors
	?>
	<div id="error">
		<?php echo '<strong>Error:</strong><br><br>'.$error; ?>
	</div>
	<?php
}

?>
