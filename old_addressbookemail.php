<?php


$Karen = "
$from = $_POST["from"];
$headers = "From:" . $from;
$headers .= "\r\nBcc:" . $from . "\r\n\r\n";

if($_POST["stype"] == "scrap"){
$message = "			Address Book Contract (Scrap Form)  \n\n\n";
if($_POST["contracttype"] == "MODIFICATION"){
	$message .= "Request Type:     " . $_POST["contracttype"]. ": " . "Acct# " . $_POST["acct"]. "\n\n";
	
if($_POST["contracttype"] == "NEW ACCOUNT"){
	$message .= "Request Type:     " . $_POST["contracttype"]. "\n\n";}
if($_POST["contracttype"] == "INSTANT PAY"){
	$message .= "Request Type:     " . $_POST["contracttype"]. "\n\n";}
if(isset($_POST["trantype"]) && $_POST["trantype"]!= null){
$message .= "Transaction Type: " . $_POST["trantype"]."\n\n";
}
if(isset($_POST["exporttype"]) && $_POST["exporttype"]!= null){
$message .= "Export  :         " . $_POST["exporttype"]. "\n\n";
}

$message .= "_________" . "\n\n\n\n";
}

else{
$message = "			Address Book Contract (Non-Scrap Form) \n\n\n";

	if($_POST["Tcarrier"] == "Insurance Exp Date"){
	$message .= "Transport Carrier:     " . $_POST["Tcarrier"]. ": " . $_POST["insexpdate"]. "\n\n";}
	else if($_POST["Tcarrier"] == "Terms"){
	$message .= "Transport Carrier:     " . $_POST["Tcarrier"]. ": " . $_POST["terms"]. "\n\n";}
	else{
	$message .= "Transport Carrier:     " . $_POST["Tcarrier"]. "\n\n";}

	if($_POST["nontrade"] == "Canadian GST/HST Registration Number"){
	$message .= "Non-Trade:             " . $_POST["nontrade"]. ": " . $_POST["regnumber"]. "\n\n";}
	else{
	$message .= "Non-Trade:       " . $_POST["nontrade"]. "\n\n";}

	if($_POST["nontradeTOS"] == "Other"){
	$message .= "Non-Trade - TOS:       " . $_POST["nontradeTOS"]. ": " . $_POST["other"]. "\n\n";}
	else{
	$message .= "Non-Trade - TOS:       " . $_POST["nontradeTOS"]. "\n\n";}
	
	
$message .= "Transaction Type:      " . $_POST["trantype"]. "\n\n";
$message .= "Export/NonExport:         " . $_POST["exporttype"]. "\n\n";
$message .= "_________" . "\n\n\n\n";}




$message .= "                  Mailing Address     \n\n";
$message .= "Name:             " . $_POST["name"]. "\n";
$message .= "Address:          " . $_POST["address"]. "\n";
if(isset($_POST["address1"]) && $_POST["address1"]!= null){
    $message .= "                " . $_POST["address1"] ."\n";
}

$message .= "                          " . $_POST["City"]. ", ". $_POST["State"] . " " . $_POST["zip"] . "\n\n";

if(isset($_POST["country"]) && $_POST["country"]!= null){
$message .= "                          " . $_POST["country"] ."\n\n";
}


if($_POST["RemitToName"] || $_POST["BillToName"] ||  $_POST["ShipFromName"] ||  $_POST["ShipToName"] || $_POST["addShipToName"] || $_POST["addShipFromName"]){
			if($_POST["RemitToName"] != null ){
					$message .= "\n\n                  Remit To Address     \n\n";
					$message .= "Name:             " . $_POST["RemitToName"]. "\n";
					$message .= "Address:          " . $_POST["RemitToAddress"]. "\n";
					if(isset($_POST["RemitToAddress1"]) && $_POST["RemitToAddress1"]!= null){
						$message .= "                " . $_POST["RemitToAddress1"] ."\n";
					}

					$message .= "                          " . $_POST["RemitToCity"]. ", ". $_POST["RemitToState"] . " " . $_POST["RemitToZip"] . "\n";

					if(isset($_POST["RemitToCountry"]) && $_POST["RemitToCountry"]!= null){
					$message .= "                          " . $_POST["RemitToCountry"] ."\n";
					}
			}
			
			if($_POST["BillToName"] != null){
					$message .= "\n\n                  Bill To Address     \n\n";
					$message .= "Name:             " . $_POST["BillToName"]. "\n";
					$message .= "Address:          " . $_POST["BillToAddress"]. "\n";
					if(isset($_POST["BillToAddress1"]) && $_POST["BillToAddress1"]!= null){
						$message .= "                " . $_POST["BillToAddress1"] ."\n";
					}

					$message .= "                          " . $_POST["BillToCity"]. ", ". $_POST["BillToState"] . " " . $_POST["BillToZip"] . "\n";

					if(isset($_POST["BillToCountry"]) && $_POST["BillToCountry"]!= null){
					$message .= "                          " . $_POST["BillToCountry"] ."\n";
					}
		
			}
			
			if($_POST["ShipFromName"] != null){
					$message .= "\n\n                  Ship From Address     \n\n";
					$message .= "Name:             " . $_POST["ShipFromName"]. "\n";
					$message .= "Address:          " . $_POST["ShipFromAddress"]. "\n";
					if(isset($_POST["ShipFromAddress1"]) && $_POST["ShipFromAddress1"]!= null){
						$message .= "                " . $_POST["ShipFromAddress1"] ."\n";
					}

					$message .= "                          " . $_POST["ShipFromCity"]. ", ". $_POST["ShipFromState"] . " " . $_POST["ShipFromZip"] . "\n";

					if(isset($_POST["ShipFromCountry"]) && $_POST["ShipFromCountry"]!= null){
					$message .= "                          " . $_POST["ShipFromCountry"] ."\n";
					}
			}
			
			if($_POST["addShipFromName"] != null){
					$message .= "\n\n                  Additional Ship From Address     \n\n";
					$message .= "Name:             " . $_POST["addShipFromName"]. "\n";
					$message .= "Address:          " . $_POST["addShipFromAddress"]. "\n";
					if(isset($_POST["addShipFromAddress1"]) && $_POST["addShipFromAddress1"]!= null){
						$message .= "                " . $_POST["addShipFromAddress1"] ."\n";
					}

					$message .= "                          " . $_POST["addShipFromCity"]. ", ". $_POST["addShipFromState"] . " " . $_POST["addShipFromZip"] . "\n";

					if(isset($_POST["addShipFromCountry"]) && $_POST["addShipFromCountry"]!= null){
					$message .= "                          " . $_POST["addShipFromCountry"] ."\n";
					}
			}
			
			if($_POST["ShipToName"] != null){
					$message .= "\n\n                  Ship To Address     \n\n";
					$message .= "Name:             " . $_POST["ShipToName"]. "\n";
					$message .= "Address:          " . $_POST["ShipToAddress"]. "\n";
					if(isset($_POST["ShipToaddress1"]) && $_POST["ShipToAddress1"]!= null){
						$message .= "                " . $_POST["ShipToAddress1"] ."\n";
					}

					$message .= "                          " . $_POST["ShipToCity"]. ", ". $_POST["ShipToState"] . " " . $_POST["ShipToZip"] . "\n";

					if(isset($_POST["ShipToCountry"]) && $_POST["ShipToCountry"]!= null){
					$message .= "                          " . $_POST["ShipToCountry"] ."\n";
					}
			}
			
			if($_POST["addShipToName"] != null){
					$message .= "\n\n                  Additional Ship To Address     \n\n";
					$message .= "Name:             " . $_POST["addShipToName"]. "\n";
					$message .= "Address:          " . $_POST["addShipToAddress"]. "\n";
					if(isset($_POST["addShipToaddress1"]) && $_POST["addShipToAddress1"]!= null){
						$message .= "                " . $_POST["addShipToAddress1"] ."\n";
					}

					$message .= "                          " . $_POST["addShipToCity"]. ", ". $_POST["addShipToState"] . " " . $_POST["addShipToZip"] . "\n";

					if(isset($_POST["addShipToCountry"]) && $_POST["addShipToCountry"]!= null){
					$message .= "                          " . $_POST["addShipToCountry"] ."\n";
					}
			}
			
			
}

$message .= "_________" . "\n\n";
$message .= "\n\n" . "Contact:          " . $_POST["contact"]. "\n\n";
$message .= "Contact Phone:    " . $_POST["Telephone"]. "\n\n";
$message .= "Customer Type:    " . $_POST["ctype"]. "\n\n";
$message .= "Account Type:     " . $_POST["atype"]. "\n\n";
$message .= "Trader:           " . $_POST["trader"]. "\n\n";
if(isset($_POST["pclass"]) && $_POST["pclass"]!= null){
$message .= "Price Class:    " . $_POST["pclass"]. "\n\n";
}
if(isset($_POST["pinvoice"]) && $_POST["pinvoice"]!= null){
$message .= "Print Invoice:    " . $_POST["pinvoice"]. "\n\n";
}
if(isset($_POST["original"]) && $_POST["original"]!= null){
$message .= "Original Terms:   " . $_POST["original"]. "\n\n";
}


if(isset($_POST["fterms"]) && $_POST["fterms"]!= null){
$message .= "Final Terms:      " . $_POST["fterms"]. "\n\n";
}
if(isset($_POST["shiprequired"]) && $_POST["shiprequired"]!= null){
$message .= "Shipper Invoice Required:      " . $_POST["shiprequired"]. "\n\n";
}
$message .= "Comments:         " . $_POST["comments"]. "\n\n";

if($_POST["controller"] != null && $_POST["contracttype"] == "INSTANT PAY"){
$to = $_POST["controller"];
$subject = "Instant Pay Approval";
}
else{
$to = "abook@omnisource.com";
$subject = "Address Book Contract";
}

$mail_sent = @mail($to,$subject,$message, $headers);
if($mail_sent){
	?>  <script type="text/javascript">
		<!--

		alert ("Address Book sent succussfully")
		window.location="../index.html"

		// -->
		</script> <?php
}
else {
		?>  <script type="text/javascript">
			<!--

			alert ("Address Book Not sent")
			window.location="addressbookscrap.php"

			// -->
			</script> <?php
}

?>
