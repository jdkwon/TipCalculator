<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<title>Tip Calculator</title>
<body>
	<section class="centered">
		<fieldset>
			<legend>Tip Calculator</legend>
			<form id="calculateForm" accept-charset="utf-8">
				Dollar Amount: $<input class="inputField" type="text" id="dollar">
				<br>
				<?php
					echo "<p>Tip Amount: </p>";
					for($i = 10; $i <= 20; $i+=5) {
						echo "<input type=\"radio\" id=\"tip$i\" name=\"tipInput\" value=\"$i\">$i%";
					}
				?>
				<br>
				<input type="radio" name="tipInput" value="custom">Custom Tip %:
				<input type="text" id=customTip name="customTip">
				<br>
				<input type="button" id="calculateBtn" value="Calculate!">
			</form>
			<p id="showTip"></p>
		</fieldset>
	</section>
<script type="text/javascript">
	document.getElementById("calculateBtn").onclick = function() {
		var xhr;
		if (window.XMLHttpRequest) xhr = new XMLHttpRequest(); // all browsers
		else xhr = new ActiveXObject("Microsoft.XMLHTTP"); // for all ie

		var tipID;
		$('input:radio').each(function() {
			if ($(this).is(':checked')) {
				if($(this).val() == "custom") {
					tipID = "customTip";
					return;
				}
				tipID = $(this).attr('id');
			}
		});
		var tipInput = document.getElementById(tipID).value;
		var dollar = document.getElementById("dollar").value;

		var url = "Calculate.php?tipInput=" + tipInput + "&dollar=" + dollar;
		xhr.open('GET', url, false);
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				$('#showTip').html(xhr.responseText);
			}
		}
		xhr.send();
		return false;
	}
</script>
</body>
</html>