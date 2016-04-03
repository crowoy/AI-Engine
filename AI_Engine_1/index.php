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