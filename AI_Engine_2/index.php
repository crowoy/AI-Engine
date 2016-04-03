<?php
require 'includes/urls.php';
//Checking 'input' has been entered
if(isset($_GET['input']) == TRUE && empty($_GET['input']) == FALSE) {

	//Storing query from GET form into variable
    $text = trim(htmlentities($_GET['input']));
		
		//Checking connection to internet
		if (navigator.onLine){
			if (strpos($text, 'hello') !== FALSE || strpos($text, 'hi') !== FALSE) {
				$answer = 'Greetings!';
			}elseif (strpos($text, 'how are you') !== FALSE || strpos($text, 'how do you do') !== FALSE) {
				$answer = 'I\'m a computer ... I just follow the commands of Master Oliver Crow.';
			}elseif (strpos($text, 'what\'s your name') !== FALSE || strpos($text, 'whats your name') !== FALSE) {
				$answer = 'I\'m a computer program. I have no name.  :(';

			//Checking connection to server
			}else{
				if(navigator.onLine){
				// Wolfram-Alpha API

				//Concatenating $text on URL
				$wolframurl .= urlencode($text);
				//echo $wolframurl;
				//Initiating CURL Session
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $wolframurl);
				ob_start();
				curl_exec($ch);
				//Closing CURL Session
				curl_close($ch);
				$contents = ob_get_contents();
				ob_end_clean();
				//echo $contents;
				$obj = new SimpleXMLElement($contents);
				$answer = $obj->pod->subpod->plaintext;

				//Answer
				if(strlen($answer)){
					//If understood, and valid answer retrieved...
				    $answer = $answer;
				}else{
					//If not understood...
				    $answer = 'Sorry, I don\'t understand.';
				}

				}else{
					//ECHOing server connection error
					$error = 'Could not connect to server.';
				}
			}
	}else{
		//ECHOing internet connection error
		$error = 'Could not connect to internet.';
	}

				// Google - Text-to-Speech

				//Concatenating $text on URL
				$texttospeechurl .= urlencode($answer);
				//Initiating CURL Session
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $texttospeechurl);
				ob_start();
				curl_exec($ch);
				//Clsing CURL Session
				curl_close($ch);
				$contents = ob_get_contents();
				ob_end_clean();

				//Changing to Sound
				header('Content-Type: audio/mpeg');
				header('Cache-Control: no-cache');

				//Outputting Answer as Sound
				print $contents;
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
<!doctype html>
<html>
	<?php
	//Requiring Extras...
	require 'includes/head.php';
	require 'includes/urls.php';
	require 'includes/functions.php';
	?>
	<body>
		<div id="indexcontainer">
			<div id="indexleft">
				<?php
					if (isset($_GET['input']) == FALSE || empty($_GET['input']) == TRUE) {
						?>
						<div id="logo">
							<a class="link" href="index.php">AI Engine</a>
						</div>
						<div id="description">
							This is an attempt at an AI Engine.
							<div id="aim">
								<div id="aimtitle">
									The Aim
								</div>
								<div id="aimdesc">
									To keep increasing its possibilities until it can eventually interpret speech, execute a command, and return an answer to a question by speech.
								</div>
							</div>
							<div id="how">
								<div id="howtitle">
									How?
								</div>
								<div id="howdesc">
									The AI Engine is programmed using XHTML/HTML5, CSS, PHP, and JavaScript. It uses a whole load of APIs, combined with proprietary code, to attempt to answer any question you have for it.
								</div>
							</div>
							<div id="use">
								<div id="usetitle">
									Using the Engine
								</div>
								<div id="usedesc">
									It's as simple as thinking of a question, punching it into the input box (located to the right), and clicking "Ask". The engine is best at answering fact based questions right now (e.g.- How tall in the Empire State Building?), but there is no harm in asking it anything (e.g.- How are you?).
								</div>
							</div>
						</div>
				<?php
					}else{
				?>
						<div id="logo1">
							<a class="link" href="index.php">AI Engine</a>
						</div>
				<?php
					}
				?>
			</div>
			<div id="indexright">
				<?php require 'includes/processing.php'; ?>
			</div>
		</div>
	</body>
	<?php require 'includes/footer.php'; ?>
</html>
