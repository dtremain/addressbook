<?php

$from = $_POST["from"];
$headers = "From:" . $from;
$headers .= "\r\nBcc:" . $from . "\r\n\r\n";

if($_POST["stype"] == "scrap"){
$message = "			Address Book Contract (Scrap Form)  \n\n\n";
if($_POST["contracttype"] == "MODIFICATION"){
	$message .= "Request Type:     " . $_POST["contracttype"]. ": " . "Acct# " . $_POST["acct"]. "\n\n";}
if($_POST["contracttype"] == "NEW ACCOUNT"){
	$message .= "Request Type:     " . $_POST["contracttype"]. "\n\n";}
if(isset($_POST["trantype"]) && $_POST["trantype"]!= null){
$message .= "Transaction Type: " . $_POST["trantype"]."\n\n";
}

$message .= "_________" . "\n\n\n\n";
}

else if ($_POST["stype"] == "nonscrap"){
$message = "			Address Book Contract (Non-Scrap - Transport Carrier Form) \n\n\n";
	if($_POST["contracttype"] == "MODIFICATION"){
		$message .= "Request Type:     " . $_POST["contracttype"]. ": " . "Acct# " . $_POST["acct"]. "\n\n";}
	if($_POST["contracttype"] == "NEW ACCOUNT"){
		$message .= "Request Type:     " . $_POST["contracttype"]. "\n\n";}
	if($_POST["insexpdate"] != null){
	$message .= "Insurance Exp Date :   " . $_POST["insexpdate"]. "\n\n";}
	if($_POST["taxid"] != null){
	$message .= "Tax ID or SS# :        " . $_POST["taxid"]. "\n\n";}
	if($_POST["terms"] != null){
	$message .= "Terms :                " . $_POST["terms"]. "\n\n";}
	if(isset($_POST["tranmode"]) && $_POST["tranmode"]!= null){
	$message .= "Transportation Mode :  " . $_POST["tranmode"] ."\n\n";}
	if(isset($_POST["processor"]) && $_POST["processor"]!= null){
	$message .= "Processor :            " . $_POST["processor"] ."\n\n";}

  $message .= "_________" . "\n\n\n\n";}

else if ($_POST["stype"] == "nsnontrade"){
	$message = "			Address Book Contract (Non-Scrap - Non-Trade Form) \n\n\n";
	if($_POST["contracttype"] == "MODIFICATION"){
		$message .= "Request Type:     " . $_POST["contracttype"]. ": " . "Acct# " . $_POST["acct"]. "\n\n";}
	if($_POST["contracttype"] == "NEW ACCOUNT"){
		$message .= "Request Type:     " . $_POST["contracttype"]. "\n\n";}

	if(isset($_POST["nttype"]) && $_POST["nttype"] != null){
	$message .= "Non-Trade Type :       " . $_POST["nttype"] . "\n\n";
	}
	$message .= "Transaction Type:      " . $_POST["trantype"]. "\n\n";

	$message .= "_________" . "\n\n\n\n";}


$message .= "                  Mailing Address     \n\n";
$message .= "Name :            " . $_POST["name"]. "\n";
$message .= "Address :         " . $_POST["address"]. "\n";
if(isset($_POST["address1"]) && $_POST["address1"]!= null){
	$message .= "                  " . $_POST["address1"] ."\n";}
	$message .= "                  " . $_POST["City"]. ", ". $_POST["State"] . " " . $_POST["zip"] . "\n";
if(isset($_POST["country"]) && $_POST["country"]!= null){
	$message .= "                  " . $_POST["country"] ."\n\n";
}


if(			$_POST["RemitToName"] != null || $_POST["RemitToAddress"]	!= null
		||	$_POST["RemitToCity"] != null || $_POST["RemitToState"]		!= null
		||	$_POST["RemitToZip"]  != null || $_POST["RemitToCountry"]	!= null ){
		$message .= "\n\n                  Remit To Address     \n\n";
		$message .= "Name:             " . $_POST["RemitToName"]. "\n";
		$message .= "Address:          " . $_POST["RemitToAddress"]. "\n";
		if(isset($_POST["RemitToAddress1"]) && $_POST["RemitToAddress1"]!= null){
			$message .= "                  " . $_POST["RemitToAddress1"] ."\n";}
		$message .= "                  " . $_POST["RemitToCity"]. ", ". $_POST["RemitToState"] . " " . $_POST["RemitToZip"] . "\n";
		if(isset($_POST["RemitToCountry"]) && $_POST["RemitToCountry"]!= null){
			$message .= "                  " . $_POST["RemitToCountry"] ."\n";}
}

if(			$_POST["BillToName"] != null || $_POST["BillToAddress"]	!= null
		||	$_POST["BillToCity"] != null || $_POST["BillToState"]		!= null
		||	$_POST["BillToZip"]  != null || $_POST["BillToCountry"]	!= null ){
		$message .= "\n\n                  Bill To Address     \n\n";
		$message .= "Name:             " . $_POST["BillToName"]. "\n";
		$message .= "Address:          " . $_POST["BillToAddress"]. "\n";
		if(isset($_POST["BillToAddress1"]) && $_POST["BillToAddress1"]!= null){
			$message .= "                  " . $_POST["BillToAddress1"] ."\n";}
		$message .= "                  " . $_POST["BillToCity"]. ", ". $_POST["BillToState"] . " " . $_POST["BillToZip"] . "\n";
		if(isset($_POST["BillToCountry"]) && $_POST["BillToCountry"]!= null){
			$message .= "                  " . $_POST["BillToCountry"] ."\n";}
}

if(			$_POST["ShipFromName"] != null || $_POST["ShipFromAddress"]	!= null
		||	$_POST["ShipFromCity"] != null || $_POST["ShipFromState"]		!= null
		||	$_POST["ShipFromZip"]  != null || $_POST["ShipFromCountry"]	!= null ){
		$message .= "\n\n                  Ship From Address     \n\n";
		$message .= "Name:             " . $_POST["ShipFromName"]. "\n";
		$message .= "Address:          " . $_POST["ShipFromAddress"]. "\n";
		if(isset($_POST["ShipFromAddress1"]) && $_POST["ShipFromAddress1"]!= null){
			$message .= "                  " . $_POST["ShipFromAddress1"] ."\n";}
		$message .= "                  " . $_POST["ShipFromCity"]. ", ". $_POST["ShipFromState"] . " " . $_POST["ShipFromZip"] . "\n";
		if(isset($_POST["ShipFromCountry"]) && $_POST["ShipFromCountry"]!= null){
			$message .= "                  " . $_POST["ShipFromCountry"] ."\n";}
}

if(			$_POST["addShipFromName"] != null || $_POST["addShipFromAddress"]	!= null
		||	$_POST["addShipFromCity"] != null || $_POST["addShipFromState"]		!= null
		||	$_POST["addShipFromZip"]  != null || $_POST["addShipFromCountry"]	!= null ){
		$message .= "\n\n                  Additional Ship From Address     \n\n";
		$message .= "Name:             " . $_POST["addShipFromName"]. "\n";
		$message .= "Address:          " . $_POST["addShipFromAddress"]. "\n";
		if(isset($_POST["addShipFromAddress1"]) && $_POST["addShipFromAddress1"]!= null){
			$message .= "                  " . $_POST["addShipFromAddress1"] ."\n";}
		$message .= "                  " . $_POST["addShipFromCity"]. ", ". $_POST["addShipFromState"] . " " . $_POST["addShipFromZip"] . "\n";
		if(isset($_POST["addShipFromCountry"]) && $_POST["addShipFromCountry"]!= null){
			$message .= "                  " . $_POST["addShipFromCountry"] ."\n";}
}

if(			$_POST["ShipToName"] != null || $_POST["ShipToAddress"]	!= null
		||	$_POST["ShipToCity"] != null || $_POST["ShipToState"]		!= null
		||	$_POST["ShipToZip"]  != null || $_POST["ShipToCountry"]	!= null ){
		$message .= "\n\n                  Ship To Address     \n\n";
		$message .= "Name:             " . $_POST["ShipToName"]. "\n";
		$message .= "Address:          " . $_POST["ShipToAddress"]. "\n";
		if(isset($_POST["ShipToAddress1"]) && $_POST["ShipToAddress1"]!= null){
			$message .= "                  " . $_POST["ShipToAddress1"] ."\n";}
		$message .= "                  " . $_POST["ShipToCity"]. ", ". $_POST["ShipToState"] . " " . $_POST["ShipToZip"] . "\n";
		if(isset($_POST["ShipToCountry"]) && $_POST["ShipToCountry"]!= null){
			$message .= "                  " . $_POST["ShipToCountry"] ."\n";}
}

if(			$_POST["addShipToName"] != null || $_POST["addShipToAddress"]	!= null
		||	$_POST["addShipToCity"] != null || $_POST["addShipToState"]		!= null
		||	$_POST["addShipToZip"]  != null || $_POST["addShipToCountry"]	!= null ){
		$message .= "\n\n                  Additional Ship To Address     \n\n";
		$message .= "Name:             " . $_POST["addShipToName"]. "\n";
		$message .= "Address:          " . $_POST["addShipToAddress"]. "\n";
		if(isset($_POST["addShipToAddress1"]) && $_POST["addShipToAddress1"]!= null){
			$message .= "                  " . $_POST["addShipToAddress1"] ."\n";}
		$message .= "                  " . $_POST["addShipToCity"]. ", ". $_POST["addShipToState"] . " " . $_POST["addShipToZip"] . "\n";
		if(isset($_POST["addShipToCountry"]) && $_POST["addShipToCountry"]!= null){
			$message .= "                  " . $_POST["addShipToCountry"] ."\n";}
}

$message .= "_________" . "\n\n";
$message .= "Contact:             " . $_POST["contact"]. "\n\n";
$message .= "Contact Phone:       " . $_POST["Telephone"]. "\n\n";
if(isset($_POST["ContEMail"]) && $_POST["ContEMail"]!= null){
    $message .= "Contact EMail:       " . $_POST["ContEMail"]. "\n\n";
}
if(isset($_POST["pctype"]) && $_POST["pctype"]!= null){
$message .= "Customer Type:       " . $_POST["pctype"]. "\n\n";
}
if(isset($_POST["sctype"]) && $_POST["sctype"]!= null){
$message .= "Customer Type:       " . $_POST["sctype"]. "\n\n";
}
if(isset($_POST["atype"]) && $_POST["atype"]!= null){
$message .= "Account Type:        " . $_POST["atype"]. "\n\n";
}
if(isset($_POST["trader"]) && $_POST["trader"]!= null){
$message .= "Trader:              " . $_POST["trader"]. "\n\n";
}
if(isset($_POST["fetrader"]) && $_POST["fetrader"]!= null){
$message .= "Ferrous Trader:      " . $_POST["fetrader"]. "\n\n";
}
if(isset($_POST["nftrader"]) && $_POST["nftrader"]!= null){
$message .= "Non-Ferrous Trader:  " . $_POST["trader"]. "\n\n";
}
if(!empty("envcert")){
    $message .= "Environmental Cert On File:       " . "YES\n\n";} else {
    $message .= "Environmental Cert On File:       " . "NO\n\n";
}
if(!empty("pinvoice")){
$message .= "Print Invoice:       " . "YES\n\n";} else {
$message .= "Print Invoice:       " . "NO\n\n";
}
if(isset($_POST["original"]) && $_POST["original"]!= null){
$message .= "Original Terms:      " . $_POST["original"]. "\n\n";
}


if(isset($_POST["fterms"]) && $_POST["fterms"]!= null){
$message .= "Final Terms:         " . $_POST["fterms"]. "\n\n";
}
if(isset($_POST["shiprequired"]) && $_POST["shiprequired"]!= null){
$message .= "Shipper Invoice Required:      " . $_POST["shiprequired"]. "\n\n";
}
$message .= "Comments:         \n" . $_POST["comments"]. "\n\n";

$to = "abook@omnisource.com";
$subject = "Address Book Contract";
$to = "dtremain@omnisource.com";

echo $to;
echo $subject;
echo $message;
echo $headers;

$mail_sent = @mail($to,$subject,$message, $headers);
if($mail_sent){
?>  <script type="text/javascript">
		<!--

		alert ("Address Book sent successfully")
		window.location="../index.html"

		// -->
		</script> <?php
}
else {
                  ?>  <script type="text/javascript">
			<!--
            alert("Address Book Not Sent");
			window.location="addressbookscrap.php"

			// -->
			</script> <?php
}

?>
