<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<title>TipCalculator</title>
<body>
	<section class="centered">
		<fieldset>
			<legend>Tip Calculator</legend>
			<form action="Calculate.php" method="post" accept-charset="utf-8">
		Dollar Amount: <input class="inputField" type="text" name="dollar">
		<br>
		<?php
			$fmt = new NumberFormatter('en_US', NumberFormatter::PERCENT);
			echo "<p>Tip Amount: </p>";
			for($i = .10; $i <= .2; $i+=.05) {
				echo "<input type=\"radio\" name=\"tip\" value=\"$i\">";
				echo $fmt->format($i);
			}
		?>
		<br>
		<input type="radio" name="tip" value="custom">Custom Tip %:
		<input type="text" name="customTip">
		<br>
		<input type="submit" name="calculateBtn" value="Calculate!">
		</form>
		</fieldset>
	</section>
	<section class="displayTip" style="display: none;">
		<iframe name="displayTip"></iframe>
	</section>
</body>
</html>