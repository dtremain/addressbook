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
 <script type="text/javascript" src="../javascripts/gen_validatorv31.js"></script> 
 
	<script type="text/javascript">

		function stopRKey(evt) {
		  var evt = (evt) ? evt : ((event) ? event : null);
		  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
		  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
		}

		document.onkeypress = stopRKey;

	</script>

<script language="JavaScript" type="text/JavaScript">

function checkForm(thisform){
	//If No Contract type is checked. (NEW, MODIFIED, or INSTANTPAY)
  if((thisform.contracttype[0].checked == false)&&(thisform.contracttype[1].checked == false)&&(thisform.contracttype[2].checked == false)){
    alert("Please choose a Request Type.");
    return false;
  }

	//If INSTANT PAY is checked.
	if(thisform.contracttype[2].checked == true){
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
		if(thisform.pctype.selectedIndex == 0){
		  alert("Please choose Customer Type");
		  return false;
	  }
		if(thisform.trader.selectedIndex == 0){
		  alert("Please choose Trader");
		  return false;
	  }
		if(thisform.pclass.selectedIndex == 0){
		  alert("Please choose Price Class");
		  return false;
	  }

		//validate the e-mail address	
		if(isEmailValid(thisform.from.value)==false){
			  alert("Enter a valid e-mail address");
			  return false;
		}

	  //if all is OK submit the form
	  thisform.submit();
	}
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
      <td><a class="button" href="addressbook.php">Address book</a></td>			
			<td><a class="button" href="NFContracts.php">NF Contracts</a></td>			
			<td><a class="button" href="FEContracts.php">FE Contracts</a></td>			
			<td><a class="button" href="NFChangeOrders.php">NF Change Order</a></td>			
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
				<legend><font size="2" ><b>Request Type - Instant Pay</b></font></legend>
				<table width="100%" cellpadding="10" cellspacing="0" border="0">
				<tr>
					<td width="25%">
						<input type="radio" name="contracttype" id="new" value="NEW ACCOUNT" /> New Acct<br>
					</td>
					<td width="40%">
						<input type="radio" name="contracttype" id="mod" value="MODIFICATION"/> Modification - Acct # <input type="text" name="acct" /><br>
					</td>
					<td width="35%">
						<input type="radio" name="contracttype" id="instantpay" value="INSTANT PAY" checked /> Pay @ Scale<br>
					</td>
				</tr>

				<script>
					$("#new, #mod").click(
						function(){
							if (this.id == "new")
								window.location.href = 'addressbookscrap.php';
							else (this.id =="mod")
								window.location.href = 'addressbookscrap.php';
						}
					);
				</script>
				</table>
			</fieldset>
			<br>
				
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
			

		
			<tr>
				<td>Contact:</td>
				<td><input type="text" name="contact" id="contact" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr>
				<td>Contact Telephone:</td>
				<td><input type="text" name="Telephone" id="telephone" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			
			<input type="hidden" name ="atype" value="SUPPLIER"/>
			
			<tr>
				<?php $xml = simplexml_load_file("../xml/ctypeinstant.xml");?>
				<td>Customer Type:</td>
				<td><select type="text" name ="pctype">
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
			</tr>
			<tr>
				<?php $xml = simplexml_load_file("../xml/traders.xml");?>
				<td>Trader:</td>
				<td><select type="text" name="trader" >
					<option value"000" selected></option>
					<?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
					</select></td>
			</tr>
			<tr>
				<td>Price Class:</td>
				<td><select type="text" name ="pclass" />
					<option value"000" selected></option>
					<option>None-Field</option>
					<option>D</option>
					<option>W</option>
					<option>P</option>
					</select></td>
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
	&copy; 2011, 2012, 2015 Omnisource. 
</div>

</body>
</html>
