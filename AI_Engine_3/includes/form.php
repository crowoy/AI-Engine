<div id="note">
	Ask me something you want to know and I'll do my best to answer<br><br>(Just click the mic icon)<br><br>...
</div>

<!-- Check to see whether brower supports speech recognition-->
<script>
	if (document.createElement("input").webkitSpeech === undefined) {
		alert("Speech input is not supported in your browser.");
	}
</script>

<form method="GET" name="form" id="form" action="" target="voiceframe">
    <input name="input" id="input" type="text" onFocus="submitandclear(this);" x-webkit-speech="x-webkit-speech" />
</form>
<iframe width="0px" height="0px" style="border:0px;" src="about:none" name="voiceframe"></iframe>