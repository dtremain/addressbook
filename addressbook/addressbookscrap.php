<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "XHTML1-s.dtd">

<html>
<head>
<title>Contracts</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
 <script src="../javascripts/isEmailValid.js"></script>
 <script type="text/javascript" src="ie5.js"></script>
 <script type="text/javascript" src="../javascripts/XulMenu.js"></script>
 <script src="../javascripts/jquery.js"></script>
 <script src="../javascripts/copyaddress.js"></script>
 
	<script type="text/javascript">

		function stopRKey(evt) {
		  var evt = (evt) ? evt : ((event) ? event : null);
		  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
		  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
		}

		document.onkeypress = stopRKey;

	</script>

<script language="JavaScript" type="text/JavaScript">

function checkForm(thisform)
{
	//If No Contract type is checked. (NEW or MODIFIED)
  if((thisform.contracttype[0].checked == false)&&(thisform.contracttype[1].checked == false)){
    alert("Please choose a Request Type.");
    return false;
  }

	//If Modification is Checked, account number is required
	if(thisform.contracttype[1].checked == true){
		if(thisform.acct.value == ''){
			alert("Acct # Required.");
			return false;
		}
		if( isEmailValid(thisform.from.value)==false ){
			  alert("Enter a valid e-mail address");
			  return false;
		}
	}

	//If NEW ACCOUNT is checked.
	if(thisform.contracttype[0].checked == true){
		// Transaction Type (Sale or Purchase) must be selected
		if((thisform.trantype[0].checked == false)&&(thisform.trantype[1].checked == false)){
		  alert("Please Choose a Transaction Type.");
		  return false;
		}
		if(thisform.name.value==''){
		  alert("Legal Address Name required");
		  return false;
		}
		if(thisform.address.value==''){
		  alert("Legal Address Address required");
		  return false;
		}
		if(thisform.City.value==''){
		  alert("Legal Address City required");
		  return false;
	  }
		if(thisform.State.selectedIndex == 0){
		  alert("Legal Address State required");
		  return false;
	  }
		if(thisform.zip.value==''){
		  alert("Legal Address Zip required");
		  return false;
	  }
		if(thisform.contact.value==''){
		  alert("Contact required");
		  return false;
	  }
		if(thisform.Telephone.value==''){
		  alert("Telephone Number required");
		  return false;
	  }
		if(thisform.atype.selectedIndex == 0){
		  alert("Please choose Account Type");
		  return false;
	  }
		//If Purchase is chosen.
		if(thisform.trantype[0].checked == true){
			if(thisform.pctype.selectedIndex == 0){
			  alert("Please choose Customer Type");
			  return false;
		  }
			if(thisform.fetrader.selectedIndex == 0){
			  alert("Please choose Ferrous Trader");
			  return false;
		  }
			if(thisform.nftrader.selectedIndex == 0){
			  alert("Please choose Non-Ferrous Trader");
			  return false;
		  }
			if(thisform.fterms.selectedIndex == 0){
			  alert("Please choose Final Terms");
			  return false;
		  }
			if(thisform.original.selectedIndex == 0){
			  alert("Please choose Original Terms");
			  return false;
		  }
			if(thisform.shiprequired.selectedIndex == 0){
			  alert("Please choose if Ship is required");
			  return false;
		  }
		}

		//If Sale is chosen.
		if(thisform.trantype[1].checked == true){
			if(thisform.sctype.selectedIndex == 0){
			  alert("Please choose Customer Type");
			  return false;
		  }
			if(thisform.trader.selectedIndex == 0){
			  alert("Please choose Trader");
			  return false;
		  }
			if(thisform.original.selectedIndex == 0){
			  alert("Please choose Original Terms");
			  return false;
		  }
			if(thisform.pinvoice.selectedIndex == 0){
			  alert("Please choose if Print Invoice");
			  return false;
			}
		}
		if( isEmailValid(thisform.from.value)==false ){
		  alert("Enter a valid e-mail address");
		  return false;
		}
	}
	
  //if all is OK submit the form
  thisform.submit();
}
</script>


</head>
<body onload="document.addressform.reset();">

<div id="header">
	<img src="../images/top.jpg" />
	<h1>Address Book Form</h1>
</div>

<div id="bar">
  <table  id="menu1" class="XulMenu">
    <tr>
      <td><a class="button" href="/addressbook/addressbook.php">Address book</a></td>			
			<td><a class="button" href="/NFContracts.php">NF Contracts</a></td>			
			<td><a class="button" href="/FEContracts.php">FE Contracts</a></td>			
			<td><a class="button" href="/NFChangeOrders.php">NF Change Order</a></td>			
    </tr>
  </table>
</div>
	
<script type="text/javascript">
  var menu1 = new XulMenu("menu1");
  
  menu1.init();
</script>

<div id="container">
	<div id="primarycontainer">
	  <form  name="addressform" id="myform" method="POST" action="addressbookemail.php">
			<input type="hidden" name="stype" value="scrap" />
			<fieldset >
				<legend><font size="2" ><b>Request Type </b></font></legend>
				<table width="100%" cellpadding="10" cellspacing="0" border="0">
				<tr>
					<td width="25%">
						<input type="radio" name="contracttype" id="new" value="NEW ACCOUNT" /> New Acct<br>
					</td>
					<td width="40%">
						<input type="radio" name="contracttype" id="mod" value="MODIFICATION"/> Modification - Acct # <input type="text" name="acct" /><br>
					</td>
				</tr>
				</table>
			</fieldset>
			<br>
				
				<fieldset id="ttype">
				<legend><font size="2" ><b>Transaction Type </b></font></legend>
				<table width="100%" cellpadding="10" cellspacing="0" border="0">
				<tr>
					<td width="25%">
						<input type="radio" name="trantype"  id="purchase" value="PURCHASE" /> Purchase<br>
					</td>
					<td width="27%">
						<input type="radio" name="trantype"  id="sale" value="SALE"/> Sale<br>
					</td>
				</tr>
				</table>
				</fieldset>
				
		<!-- For addresses, the title is the first row of a division - e.g. LEGAL ADDRESS -->
		<table>
			<!-- This provides two blank lines before LEGAL ADDRESS, and establishes the width -->
			<!-- of columns 1 & 2 -->
			<tr>
				<td width="30%"><br /></td>
				<td width="27%"></td>
			</tr>
			<tr><td><br /></td></tr>
			
	<!-- *********************************Mailing Address *************************************************************-->		
		<div id="legaladdress">
			<tr>
				<td></td>
				<td><h2>Legal Address</h2></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><input type="text" name="name"  id="name" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><input type="text" name="address"   id="address" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="address1"  id="address1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr>
				<td>City:</td>
				<td><input type="text" name="City" id="City" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr>
				<?php $xml = simplexml_load_file("../xml/states.xml");?>
				<td>State:</td>
				<td><select type="text" name="State" id="State">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
			</tr>
			<tr>
				<td>Mail Code:</td> 
				<td><input type="text" name="zip" id="zip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>	
			<tr>
				<?php $xml = simplexml_load_file("../xml/countries.xml");?>
				<td>Country:</td>
				<td>
					<select type="text" name="country" id="country">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select>
				</td>
			</tr>
			<!-- Leave blank line after address section -->
			<tr><td><br /></td></tr>
		</div>
			

		<!-- ********************************* Remit To Address *************************************************************-->		
		<tr id="RemitTo">
			<td></td>
			<td><h2>Remit To Address</h2></td>
			<td>
				<input type="checkbox" name="remittosame" id="RemitTosame" onClick="same_as_billing('RemitTo')" />Same as Legal</td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitTo").hide();							
						else
							$("#RemitTo").show();
					});
				</script>
		</tr>
		<tr id="RemitToName">
			<td>Name: </td>
			<td><input type="text" name="RemitToName" id="RemitToName" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitToName").hide();							
						else
							$("#RemitToName").show();							
					});
				</script>
				<script>			   
				$("#remittosameas").click(function(){
					$("#RemitToNameText").disabled = $(this).is(":checked");
				});
				</script>
		</tr>
		<tr id="RemitTomailaddress">
			<td>Address: </td>
			<td><input type="text" name="RemitToAddress" id="RemitToAddress" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitTomailaddress").hide();							
						else
							$("#RemitTomailaddress").show();							
					});
				</script>
		</tr>
		<tr id="RemitTomailaddress1">
			<td></td>
			<td><input type="text" name="RemitToAddress1"  id="RemitToAddress1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitTomailaddress1").hide();							
						else
							$("#RemitTomailaddress1").show();							
					});
				</script>
		</tr>
		<tr id="RemitToCity">
			<td>City:</td>
			<td><input type="text" name="RemitToCity" id="RemitToCity" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitToCity").hide();							
						else
							$("#RemitToCity").show();							
					});
				</script>
		</tr>
		<tr id="RemitToState">
			<?php $xml = simplexml_load_file("../xml/states.xml");?>
			<td>State:</td>
			<td><select type="text" name="RemitToState" id="RemitToState">
				<option value"000" selected></option>
				<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
				</select></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitToState").hide();							
						else
							$("#RemitToState").show();							
					});
				</script>
		</tr>
		<tr id="RemitToZip">
			<td>Mail Code:</td>
			<td><input type="text" name="RemitToZip" id="RemitToZip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitToZip").hide();							
						else
							$("#RemitToZip").show();							
					});
				</script>	
		</tr>
		<tr id="RemitToCountry">
			<?php $xml = simplexml_load_file("../xml/countries.xml");?>
			<td>Country:</td>
			<td><select type="text" name="RemitToCountry" id="RemitToCountry">
				<option value"000" selected></option>
				<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
			</select></td>
			<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitToCountry").hide();							
						else
							$("#RemitToCountry").show();							
					});
			</script>
		</tr>
		<!-- Leave blank line after address section -->
		<tr id="RemitToTrailer">
			<td><br /></td>
			<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#RemitToTrailer").hide();							
						else
							$("#RemitToTrailer").show();							
					});
			</script>
		</tr>
			
		<!-- ********************************* Bill To Address *************************************************************-->		
		<tr id="BillTo">
			<td></td>
			<td><h2>Bill To Address</h2></td>
			<td><input type="checkbox" name="billtosame" id="BillTosame" onClick="same_as_billing('BillTo')"/>Same as Legal</td>
				<script>
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#BillTo").hide();							
						else
							$("#BillTo").show();							
					});
				</script>
		</tr>
		<tr id="BillToName">
			<td>Name: </td>
			<td><input type="text" name="BillToName" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#BillToName").hide();							
						else
							$("#BillToName").show();							
					});
				</script>
		</tr>
		<tr id="BillTomailaddress">
			<td>Address: </td>
			<td><input type="text" name="BillToAddress" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#BillTomailaddress").hide();							
						else
							$("#BillTomailaddress").show();							
					});
				</script>
		</tr>
		<tr id="BillTomailaddress1">
			<td></td>
			<td><input type="text" name="BillToAddress1" id="BillToAddress1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#BillTomailaddress1").hide();							
						else
							$("#BillTomailaddress1").show();							
					});
				</script>
		</tr>
		<tr id="BillToCity">
			<td>City:</td>
			<td><input type="text" name="BillToCity" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#BillToCity").hide();							
						else
							$("#BillToCity").show();							
					});
				</script>
		</tr>
		<tr id="BillToState">
			<?php $xml = simplexml_load_file("../xml/states.xml");?>
			<td>State:</td>
			<td><select type="text" name="BillToState">
				<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
				</select></td>
				<script>
					$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#BillToState").hide();							
						else
							$("#BillToState").show();							
					});
				</script>
		</tr>
		<tr id="BillToZip">
				<td>Mail Code:</td>
				<td><input type="text" name="BillToZip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
					<script>
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#BillToZip").hide();							
							else
								$("#BillToZip").show();							
						});
					</script>	
		</tr>
		<tr id="BillToCountry">
			<?php $xml = simplexml_load_file("../xml/countries.xml");?>
			<td>Country:</td>
			<td><select type="text" name="BillToCountry">
				<option value"000" selected></option>
				<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
			</select></td>
					<script>
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#BillToCountry").hide();							
							else
								$("#BillToCountry").show();							
						});
				</script>
		</tr>
		<!-- Leave blank line after address section -->
		<tr id="BillToTrailer">
			<td><br /></td>
			<script>
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#BillToTrailer").hide();							
							else
								$("#BillToTrailer").show();							
						});
			</script>
		</tr>
		
		<!-- ********************************* Ship To Address *************************************************************-->		
		<tr id="ShipTo">
			<td></td>
			<td><h2>Ship To Address</h2></td>
			<td><input type="checkbox" name="shiptosameas" id="ShipTosame" onClick="same_as_billing('ShipTo')"/>Same as Legal</td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#ShipTo").hide();							
						else
							$("#ShipTo").show();							
					});
				</script>
		</tr>
		<tr id="ShipToName">
			<td>Name: </td>
			<td><input type="text" name="ShipToName" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#ShipToName").hide();							
						else
							$("#ShipToName").show();							
					});
				</script>
		</tr>
		<tr id="ShipTomailaddress">
			<td>Address: </td>
			<td><input type="text" name="ShipToAddress" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#ShipTomailaddress").hide();							
						else
							$("#ShipTomailaddress").show();							
					});
				</script>
		</tr>
		<tr id="ShipTomailaddress1">
			<td></td>
			<td><input type="text" name="ShipToAddress1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#ShipTomailaddress1").hide();							
						else
							$("#ShipTomailaddress1").show();							
					});
				</script>
		</tr>
		<tr id="ShipToCity">
			<td>City:</td>
			<td><input type="text" name="ShipToCity" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#ShipToCity").hide();							
						else
							$("#ShipToCity").show();							
					});
				</script>
		</tr>
		<tr id="ShipToState">
			<?php $xml = simplexml_load_file("../xml/states.xml");?>
			<td>State:</td>
			<td><select type="text" name="ShipToState">
				<option value"000" selected></option>
			<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
				<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#ShipToState").hide();							
							else
								$("#ShipToState").show();							
						});
				</script>
		</tr>
		<tr id="ShipToZip">
			<td>Mail Code:</td>
			<td><input type="text" name="ShipToZip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#ShipToZip").hide();							
						else
							$("#ShipToZip").show();							
					});
				</script>	
		</tr>
		<tr id="ShipToCountry">
			<?php $xml = simplexml_load_file("../xml/countries.xml");?>
			<td>Country:</td>
			<td><select type="text" name="ShipToCountry">
				<option value"000" selected></option>
				<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
			</td>
				<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#ShipToCountry").hide();							
							else
								$("#ShipToCountry").show();							
						});
				</script>
		</tr>
		<!-- Leave blank line after address section -->
		<tr id="ShipToTrailer">
			<td><br /></td>
			<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#ShipToTrailer").hide();							
						else
							$("#ShipToTrailer").show();							
					});
			</script>
		</tr>
		
		<!-- ********************************* Additional Ship To Address *************************************************************-->		
		<tr id="addShipTo">
			<td></td>
			<td><h2>Additional Ship To</h2></td> 
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#addShipTo").hide();							
						else
							$("#addShipTo").show();							
					});
				</script>
		</tr>
		<tr id="addShipToName">
			<td>Name: </td>
			<td><input type="text" name="addShipToName" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#addShipToName").hide();							
						else
							$("#addShipToName").show();							
					});
				</script>
		</tr>
		<tr id="addShipTomailaddress">
			<td>Address: </td>
			<td><input type="text" name="addShipToAddress" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			<script>			   
			$("#purchase, #sale").click(function(){
					if (this.id == "purchase")
						$("#addShipTomailaddress").hide();							
					else
						$("#addShipTomailaddress").show();							
				});
			</script>
		</tr>
		<tr id="addShipTomailaddress1">
			<td></td>
			<td><input type="text" name="addShipToAddress1" id="addShipToAddress1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#addShipTomailaddress1").hide();							
						else
							$("#addShipTomailaddress1").show();							
					});
				</script>
		</tr>
		<tr id="addShipToCity">
			<td>City:</td>
			<td><input type="text" name="addShipToCity" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#addShipToCity").hide();							
						else
							$("#addShipToCity").show();							
					});
				</script>
		</tr>
		<tr id="addShipToState">
			<?php $xml = simplexml_load_file("../xml/states.xml");?>
			<td>State:</td>
			<td><select type="text" name="addShipToState" >
				<option value"000" selected></option>
			<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#addShipToState").hide();							
							else
								$("#addShipToState").show();							
						});
					</script>
		</tr>
		<tr id="addShipToZip">
				<td>Mail Code:</td>
				<td><input type="text" name="addShipToZip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#addShipToZip").hide();							
							else
								$("#addShipToZip").show();							
						});
					</script>	
		</tr>
		<tr id="addShipToCountry">
			<?php $xml = simplexml_load_file("../xml/countries.xml");?>
			<td>Country:</td>
			<td><select type="text" name="addShipToCountry">
				<option value"000" selected></option>
				<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
			</td>
				<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
								$("#addShipToCountry").hide();							
							else
								$("#addShipToCountry").show();							
						});
				</script>
		</tr>
		<tr id="addShipToTrailer">
			<td><br /></td>
			<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#addShipToTrailer").hide();							
						else
							$("#addShipToTrailer").show();							
					});
			</script>
		</tr>
				
		<!-- ********************************* Ship From *************************************************************-->		
		<tr id="ShipFrom">
			<td></td>
			<td><h2>Ship From Address</h2></td>
			<td><input type="checkbox" name="shipfromsameas" id="ShipFromsame" onClick="same_as_billing('ShipFrom')"/>Same as Legal</td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFrom").hide();							
						else
							$("#ShipFrom").show();							
					});
				</script>
		</tr>
		<tr id="ShipFromName">
			<td>Name: </td>
			<td><input type="text" name="ShipFromName" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFromName").hide();							
						else
							$("#ShipFromName").show();							
					});
				</script>
		</tr>
		<tr id="ShipFrommailaddress">
			<td>Address: </td>
			<td><input type="text" name="ShipFromAddress" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFrommailaddress").hide();							
						else
							$("#ShipFrommailaddress").show();							
					});
				</script>
		</tr>
		<tr id="ShipFrommailaddress1">
			<td></td>
			<td><input type="text" name="ShipFromAddress1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFrommailaddress1").hide();							
						else
							$("#ShipFrommailaddress1").show();							
					});
				</script>
		</tr>
		<tr id="ShipFromCity">
			<td>City:</td>
			<td><input type="text" name="ShipFromCity" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFromCity").hide();							
						else
							$("#ShipFromCity").show();							
					});
				</script>
		</tr>
		<tr id="ShipFromState">
			<?php $xml = simplexml_load_file("../xml/states.xml");?>
			<td>State:</td>
			<td><select type="text" name="ShipFromState">
				<option value"000" selected></option>
				<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
				</select></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFromState").hide();							
						else
							$("#ShipFromState").show();							
					});
				</script>
		</tr>
		<tr id="ShipFromZip">
				<td>Mail Code:</td>
				<td><input type="text" name="ShipFromZip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFromZip").hide();							
						else
							$("#ShipFromZip").show();							
					});
				</script>	
		</tr>
		<tr id="ShipFromCountry">
			<?php $xml = simplexml_load_file("../xml/countries.xml");?>
			<td>Country:</td>
			<td><select type="text" name="ShipFromCountry">
				<option></option>
				<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
				</select></td>
				<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#ShipFromCountry").hide();							
							else
								$("#ShipFromCountry").show();							
						});
				</script>
		</tr>
		<tr id="ShipFromTrailer">
			<td><br /></td>
			<script>			   
				$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#ShipFromTrailer").hide();							
						else
							$("#ShipFromTrailer").show();							
					});
			</script>
		</tr>
		
	<!-- ********************************* Additional Ship From *************************************************************-->		
			<tr id="addShipFrom">
				<td></td>
				<td><h2>Additional Ship From</h2></td> 
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#addShipFrom").hide();							
							else
								$("#addShipFrom").show();							
						});
					</script>
			</tr>
			<tr id="addShipFromName">
				<td>Name: </td>
				<td><input type="text" name="addShipFromName" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#addShipFromName").hide();							
							else
								$("#addShipFromName").show();							
						});
					</script>
			</tr>
			<tr id="addShipFrommailaddress">
				<td>Address: </td>
				<td><input type="text" name="addShipFromAddress" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#addShipFrommailaddress").hide();							
							else
								$("#addShipFrommailaddress").show();							
						});
					</script>
			</tr>
			<tr id="addShipFrommailaddress1">
				<td></td>
				<td><input type="text" name="addShipFromAddress1" id="addShipFromAddress1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#addShipFrommailaddress1").hide();							
							else
								$("#addShipFrommailaddress1").show();							
						});
					</script>
			</tr>
			<tr id="addShipFromCity">
				<td>City:</td>
				<td><input type="text" name="addShipFromCity" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#addShipFromCity").hide();							
							else
								$("#addShipFromCity").show();							
						});
					</script>
			</tr>
			<tr id="addShipFromState">
				<?php $xml = simplexml_load_file("../xml/states.xml");?>
				<td>State:</td>
				<td><select type="text" name="addShipFromState">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#addShipFromState").hide();							
							else
								$("#addShipFromState").show();							
						});
					</script>
			</tr>
			<tr id="addShipFromZip">
				<td>Mail Code:</td>
				<td><input type="text" name="addShipFromZip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#addShipFromZip").hide();							
							else
								$("#addShipFromZip").show();							
						});
					</script>	
			</tr>
			<tr id="addShipFromCountry">
				<?php $xml = simplexml_load_file("../xml/countries.xml");?>
				<td>Country:</td>
				<td><select type="text" name="addShipFromCountry">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
					<script>			   
							$("#purchase, #sale").click(function(){
									if (this.id == "sale")
										$("#addShipFromCountry").hide();							
									else
										$("#addShipFromCountry").show();							
								});
					</script>
			</tr>
			<tr><td><br /></td></tr>
			<tr><td><br /></td></tr>
			<tr><td><br /></td></tr>
			<tr>
				<td>Contact:</td>
				<td><input type="text" name="contact" id="contact" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr>
				<td>Contact Telephone:</td>
				<td><input type="text" name="Telephone" id="telephone" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr>
				<?php $xml = simplexml_load_file("../xml/accttype.xml");?>
				<td>Account Type:</td>
				<td><select type="text" name ="atype" id="atype">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
			</tr>
			<tr id="purchaseCtype">
				<?php $xml = simplexml_load_file("../xml/ctypepurchase.xml");?>
				<td>Customer Type:</td>
				<td><select type="text" name ="pctype" id="pctype">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "sale")
								$("#purchaseCtype").hide();							
							else
								$("#purchaseCtype").show();							
						});
					</script>
			</tr>
			<tr id="saleCtype">
				<?php $xml = simplexml_load_file("../xml/ctypesale.xml");?>
				<td>Customer Type:</td>
				<td><select type="text" name ="sctype" id="sctype">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
					<script>			   
					$("#purchase, #sale").click(function(){
							if (this.id == "purchase")
                                $("#saleCtype").hide();
							else
								$("#saleCtype").show();							
						});
					</script>
			</tr>
            <?php $topt = "";?>
            <?php foreach ($xml->children() as $child); $top.="<option> " . $child . "</option>" ."<br />"; ?>
            <tr id="strader">
                <?php $xml = simplexml_load_file("../xml/traders.xml");?>
                <td>Trader:</td>
                <td>
                    <select type="text" name="trader">
                        <option value"000" selected></option>
                        <?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
                    </select>
                </td>
                <script>
                $("#purchase, #sale").click(function(){
                    if (this.id == "purchase")
                        $("#strader").hide();
                    else
                        $("#strader").show();
                });
                </script>
                <?php $xml->rewind; ?>
            </tr>
            <tr id="pfetrader">
                <td>Ferrous Trader:</td>
                <td>
                    <select type="text" name="fetrader">
                        <option value"000" selected></option>
                        <?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
                    </select>
                </td>
                <script>
                $("#purchase, #sale").click(function(){
                    if (this.id == "sale")
                        $("#pfetrader").hide();
                    else
                        $("#pfetrader").show();
                });
                </script>
                <?php $xml->rewind; ?>
            </tr>
            <tr id="pnftrader">
                <td>Non-Ferrous Trader:</td>
                <td>
                    <select type="text" name="nftrader">
                        <option value"000" selected></option>
                        <?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
                    </select>
                </td>
                <script>
                $("#purchase, #sale").click(function(){
                    if (this.id == "purchase")
                        $("#pnftrader").show();
                    else
                        $("#pnftrader").hide();
                });
                </script>
            </tr>
            <tr id="penvcert">
                <td>Environmental Certificate on File:</td>
                <td><input type="checkbox" name="envcert" id="cbecert"</td>
                <script>

					$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#penvcert").show();
						else
							$("#penvcert").hide();
						});
                </script>
            </tr>
			<tr id="spinvoice" >
				<td>Print Invoice:</td>
                <td><input type="checkbox" name="pinvoice" id="cbpinv"</td>
				<script>					
					$("#purchase, #sale").click(function(){
						if (this.id == "purchase")
							$("#spinvoice").hide();						
						else
							$("#spinvoice").show();							
						});
				</script>
			</tr>
			<tr id="mySelect">
				<?php $xml = simplexml_load_file("../xml/terms.xml");?>
			  <td>Final terms:</td>
				<td><select name="fterms">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
				<script>					
					$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#mySelect").hide();						
						else
							$("#mySelect").show();							
						});
				</script>
			</tr>
			<tr>
				<?php $xml = simplexml_load_file("../xml/terms.xml");?>
				<td>Original Terms:</td>
				<td><select type="text" name ="original">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
			</tr>
			<tr id="mySelect2">
				<td>Shipper Inv Required:</td>
                <td><input type="checkbox" name="shiprequired" id="cbsinvreq"</td>
				<script>					
					$("#purchase, #sale").click(function(){
						if (this.id == "sale")
							$("#mySelect2").hide();						
						else
							$("#mySelect2").show();							
						});
				</script>
			</tr>
			<tr>
				<td>Comments: </td>
				<td><textarea rows="5" cols="30" name="comments" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea></td>
			</tr>
			<tr><td><br /></td></tr>
			<tr>
				<td>Your E-Mail:</td>
				<td><input type="text" name="from" size="35"></td>
				<td>ex: someone@omnisource.com</td>
			</tr>
		</table>
		<br />
		<input name="Submit" type="button" id="Submit" onclick="checkForm(this.form)" value="Send" />
			<script>onload= document.myform.reset();</script> 
	</form>
	</div>
	
	
	<div id="secondarycontent">

	</div>

	<div class="clearit"></div>

</div>

<div id="footer">
	&copy; 2011, 2012 Omnisource. 
</div>

</body>
</html>
