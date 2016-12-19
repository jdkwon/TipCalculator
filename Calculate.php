<?php
//define variables
$errorLoc = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($_GET['tipInput'])) {
		if ((float) $_GET['tipInput'] >= 0 ) {
			$tipAmnt = (float)$_GET['tipInput'];
			$tipAmnt /= 100;
		}
		else {
			$tipAmnt = "none";
			$errorLoc = "Tip Error";
		}
	}
	else {
		$tipAmnt = "none";
		$errorLoc = "Tip Error";
	}
	if($_GET['dollar']) {
		if((float)$_GET['dollar'] >= 0) {
			$dollar = (float)$_GET['dollar'];
		}
		else {
			$dollar = "none";
			$errorLoc = "Dollar Error";
		}
	}
	else {
		$dollar = "none";
		"Dollar Error";
	}
	if($tipAmnt == "none" || $dollar == "none") {
		$tipTotal = $errorLoc;
		$calculatedBill = "";
	}
	else {
		$tipTotal = $tipAmnt * $dollar;
		$calculatedBill = $dollar + $tipTotal;
	}
}
else {
	echo "There is something wrong with the server.";
}
function showError($msg) {
	print "<p class=error>There is an error at $msg</p>";
}
$printTip = "<p>Tip: $$tipTotal</p>";
$printBill = "<p>Calculated Bill: $$calculatedBill";

if($errorLoc == "") {
	print($printTip);
	print($printBill);
}
else {
	showError($errorLoc);
}
?>