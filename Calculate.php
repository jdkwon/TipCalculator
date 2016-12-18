<?php
//define variables
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET['tipInput'])) {
			$tipAmnt = (float)$_GET['tipInput'];
			$tipAmnt /= 100;	
	}
	else {
		$tipAmnt = 0.0;
	}
	if($_GET['dollar']) {
		$dollar = (int)$_GET['dollar'];
	}
	else {
		$dollar = 0;
	}
	// Calculations
	// echo "$tipAmnt $dollar";
	$tipTotal = $tipAmnt * $dollar;
	$calculatedBill = $dollar + $tipTotal;
}
else {
	echo "There is something wrong with the server.";
}

$printTip = "<p>Tip: $$tipTotal</p>";
$printBill = "<p>Calculated Bill: $$calculatedBill";

print($printTip);
print($printBill);
?>