<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "XHTML1-s.dtd">

<html>
<head>
<title>NF Contracts</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="./css/style.css" />
 <script type="text/javascript" src="ie5.js"></script>
 <script type="text/javascript" src="./javascripts/XulMenu.js"></script>
</head>
<body>

<div id="header">
	<img src="./images/top.jpg" />
	<h1>NF Contract Form</h1>
	

</div>

<div id="bar">

        <table  id="menu1" class="XulMenu">
        <tr>
            <td>
                <a class="button" href="addressbook.php">Address book</a>
                
            </td>
			
			<td>
                <a class="button" href="NFContracts.php">NF Contracts</a>
                
            </td>
			
			<td>
                <a class="button" href="FEContracts.php">FE Contracts</a>
                
            </td>
			
			<td>
                <a class="button" href="NFChangeOrders.php">NF Change Order</a>
                
            </td>
			
			
        </tr>
        </table>


    </div>
	
 <script type="text/javascript">
    var menu1 = new XulMenu("menu1");
    
    menu1.init();
    </script>


<div id="container">

	<div id="primarycontainer">
	
	<p> Welcome to the OmniSource corporation Contract Forms. </P>
	
	    <form name="input_form"><pre>
       Name: <input name="username" type="text">
    Comment: <input name="comment"  type="text">
    </pre></form>

    <script>
    function update_message_body ()
    {
    	var username = document . input_form . username . value;
    	var comment  = document . input_form . comment  . value;

    	document . proxy_form . message_body . value =
    		"Greetings.\n"
    	+	"\n"
    	+	"I have a comment for you.  It is:\n"
    	+	"\n"
    	+	"\t" + comment + "\n"
    	+	"\n"
    	+	"Sincerely,\n"
    	+	username + "\n";

    	return true;
    }
    </script>

    <form name    ="proxy_form"
          method  ="post"
          enctype ="multipart/form-data"
          action  ="mailto:dslone@omnisource.com?subject=NF Contract"
          onSubmit="return update_message_body ();">
    <input type=hidden name="message_body">
    <input type=submit value="send mail">
    </form>

	
		
	</div>

	<div id="secondarycontent">

		
	
		

		

	</div>

	<div class="clearit"></div>

</div>

<div id="footer">
	&copy; 2011 Omnisource. 
</div>


</body>
</html>
