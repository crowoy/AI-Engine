<script type="text/javascript" charset="utf-8">
	function redirect(){
		window.location = 'index.php';
	}
</script>
<?php
// Wolfram Alpha API
$wolframurl .= urlencode($text);
//echo $wolframurl;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wolframurl);
ob_start();
curl_exec($ch);
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
	?>
	<a href="index.php">
		<div class="askagain">
			<div id="askagain1">
				Ask another question
			</div>
		</div>
	</a>
	<?php
}else{
	//If not understood...
    $answer = '<strong>Output</strong><br><br>Sorry, I don\'t understand.';
	?>
	<a href="index.php">
		<div class="askagain">
			<div id="askagain2">
				Ask again
			</div>
		</div>
	</a>
	<?php
}

//Still trying to get this working (Does not work yet)...

// Google Text to Speech

$texttospeechurl .= urlencode($answer);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $texttospeechurl);
ob_start();
curl_exec($ch);
curl_close($ch);
$contents = ob_get_contents();
ob_end_clean();
//header('Content-Disposition: attachment; filename="response.mp3"');
//header("Content-Transfer-Encoding: binary"); 
//header("Content-Type: audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3");
header('Content-Type: audio/mpeg');
header('Cache-Control: no-cache');
print $contents;


?>