<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "XHTML1-s.dtd">

<html>
<head>
<title>Contracts</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="./css/style.css" />
 <script type="text/javascript" src="ie5.js"></script>
 <script type="text/javascript" src="./javascripts/XulMenu.js"></script>
</head>
<body>

<div id="header">
	<img src="./images/top.jpg" />
	<h1>Contracts</h1>
	

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
	
	<p> Form Data </P>
	
	<form enctype="text/plain" method="POST" action="mailto:dslone@omnisource.com?subject=Address Book Form">
Your First Name: <input type="text" name="first_name"><br>
Your Last Name: <input type="text" name="last_name"><br>
Comments: <textarea rows="5" cols="30" name="comments"></textarea>
<input type="submit" value="Send">
</form>
	
	</div>

	

<div class="clearit"></div>
</div>

<div id="footer">
	&copy; 2011 Omnisource. 
</div>


</body>
</html>
