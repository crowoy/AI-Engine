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
    $answer = '<strong>Here\'s what I found:</strong><br><br>'.$answer;
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
?>
