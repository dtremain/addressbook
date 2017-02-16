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
 <script src="../javascripts/nonscrapcopyaddress.js"></script>
 
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

    // checkForm( ) - This function validates the form's input.

	//If No Contract type is checked. (NEW or MODIFIED)
    if((thisform.contracttype[0].checked == false)&&(thisform.contracttype[1].checked == false) )
    {
      alert("Please choose Non-Trade");
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
		// Transaction Type (Sale, Purchase, or Both) must be selected
		if((thisform.trantype[0].checked == false)&&(thisform.trantype[1].checked == false)&&(thisform.trantype[2].checked == false)){
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
		if(thisform.ContEMail.value==''){
		  alert("Contact E-Mail required");
		  return false;
	  }
	    //validate the e-mail address	
	    if(isEmailValid(thisform.ContEMail.value)==false){
		  alert("Enter a valid Contact e-mail address");
		  return false;
	  }
  }
	
	//validate the Contact e-mail address	
	if((thisform.ContEMail.value != '') && (isEmailValid(thisform.ContEMail.value)==false)){
		alert("Enter a valid Contact e-mail address");
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
			<input type="hidden" name="stype" value="nsnontrade" />
			<fieldset >
				<legend><font size="2" ><b>Non-Trade </b></font></legend>
				<table width="100%" cellpadding="10" cellspacing="0" border="0">
                    <tr>
                        <td width="30%">
                            <input type="radio" name="contracttype" id="new" value="NEW ACCOUNT" /> New Addition<br>
                        </td>
                        <td width="70%">
                            <input type="radio" name="contracttype" id="mod" value="MODIFICATION" /> Modification - Acct #<input type="text" name="acct" /><br>
                        </td>
                    </tr>
                </table>
			</fieldset>
			<br>
				
            <div id="ntt">
                <fieldset>
                    <legend><font size="2"><b>Non-Trade Type </b></font></legend>
                    <table width="100%" cellpadding="10" cellspacing="0" border="0">
                    <tr>
                        <td width="30%">
                            <input type="radio" name="nttype" id="ntt2" value="RELATED OR INTERCOMPANY"> Related or Inter company<br />
                            <input type="radio" name="nttype" id="ntt3" value="EMPLOYEE"> Employee<br />
                        </td>
                        <td width="70%">
                            <input type="radio" name="nttype" id="ntt4" value="JDEE9"> JDE E9 (NEW)<br />
                            <input type="radio" name="nttype" id="ntt5" value="JDEXE"> JDE XE (OLD - RIMAS & Misc Vendor)<br />
                        </td>
                    </tr>
                    </table>
                </fieldset>
                <br />
            </div>

            <fieldset id="ttype">
                <legend><font size="2"><b>Transaction Type </b></font></legend>
                <table width="100%" cellpadding="10" cellspacing="0" border="0">
                    <tr>
                        <td width="30%">
                            <input type="radio" name="trantype" id="purchase" value="PURCHASE" checked="checked"/> Purchase<br>
                        </td>
                        <td width="35%" style="display:none">
                            <input type="radio" name="trantype" id="sale" value="SALE" /> Sale<br>
                        </td>
                        <td width="35%" style="display:none">
                            <input type="radio" name="trantype" id="both" value="PURCHASE/SALE" /> Both<br>
                        </td>
                    </tr>
                </table>
            </fieldset><br>

            <table>
                <tr>
                    <td width=" 100%">NOTE: W9 required for initial set-up.</td>
                </tr>
            </table>
            <table width="100%">
                    <tr><td width="30%"><br></td></tr>

                    <!-- *********************************Mailing Address *************************************************************-->
                    <div id="legaladdress">
                        <tr>
                            <td></td>
                            <td><h2>Legal Address</h2></td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td><input type="text" name="name" id="name" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td><input type="text" name="address" id="address" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" name="address1" id="address1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><input type="text" name="City" id="City" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                        </tr>
                        <tr>
                            <?php $xml = simplexml_load_file("../xml/states.xml");?>
                            <td>State:</td>
                            <td>
                                <select type="text" name="State" id="State">
                                    <option value"000" selected></option>
                                    <?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
                                </select>
                            </td>
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
                            <input type="checkbox" name="remittosame" id="RemitTosame" onClick="same_as_billing('RemitTo')" />Same as Legal
                        </td>
                    </tr>
                    <tr id="RemitToName">
                        <td>Name: </td>
                        <td><input type="text" name="RemitToName" id="RemitToName" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                        <script>

				$("#remittosameas").click(function(){
					$("#RemitToNameText").disabled = $(this).is(":checked");
				});
                        </script>
                    </tr>
                    <tr id="RemitTomailaddress">
                        <td>Address: </td>
                        <td><input type="text" name="RemitToAddress" id="RemitToAddress" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                    </tr>
                    <tr id="RemitTomailaddress1">
                        <td></td>
                        <td><input type="text" name="RemitToAddress1" id="RemitToAddress1" size="50" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                    </tr>
                    <tr id="RemitToCity">
                        <td>City:</td>
                        <td><input type="text" name="RemitToCity" id="RemitToCity" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                    </tr>
                    <tr id="RemitToState">
                        <?php $xml = simplexml_load_file("../xml/states.xml");?>
                        <td>State:</td>
                        <td>
                            <select type="text" name="RemitToState" id="RemitToState">
                                <option value"000" selected></option>
                                <?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
                            </select>
                        </td>
                    </tr>
                    <tr id="RemitToZip">
                        <td>Mail Code:</td>
                        <td><input type="text" name="RemitToZip" id="RemitToZip" size="6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                    </tr>
                    <tr id="RemitToCountry">
                        <?php $xml = simplexml_load_file("../xml/countries.xml");?>
                        <td>Country:</td>
                        <td>
                            <select type="text" name="RemitToCountry" id="RemitToCountry">
                                <option value"000" selected></option>
                                <?php foreach ($xml->children() as $child){echo "<option> " . $child . "</option>" ."<br />";} ?>
                            </select>
                        </td>
                    </tr>
                    <!-- Leave blank line after address section -->
                    <tr id="RemitToTrailer">
                        <td><br /></td>
                    </tr>

                    <tr>
                        <td>Contact:</td>
                        <td><input type="text" name="contact" id="contact" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                    </tr>
                    <tr>
                        <td>Contact Telephone:</td>
                        <td><input type="text" name="Telephone" id="telephone" size="35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                    </tr>
                    <tr>
                        <td>Contact E-Mail:</td>
                        <td><input type="text" name="ContEMail" id="ContEMail" size="35" ></td>
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
                    <tr><td><br></td></tr>
                </table>
            <br />
            <input name="Submit" type="button" id="Submit" onclick="checkForm(this.form)" value="Send" />
            <script>onload=document.myform.reset();</script>
</form>
	</div>
	
	
	<div id="secondarycontent">

	</div>

	<div class="clearit"></div>

</div>

<div id="footer">
	&copy; 2011, 2012, 2017 Omnisource
</div>

</body>
</html>
