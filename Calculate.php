<?php
//define variables
if(isset($_POST['tip'])) {
	if($_POST['tip'] == "custom") {
		$tipAmnt = (float)$_POST['customTip'] / 100;
	}
	else {
		$tipAmnt = $_POST['tip'];	
	}
}
else {
	$tipAmnt = 0.0;
}
if($_POST['dollar']) {
	$dollar = (int)$_POST['dollar'];
}
else {
	$dollar = 0;
}

echo "<p>$tipAmnt, $dollar</p>";

?>