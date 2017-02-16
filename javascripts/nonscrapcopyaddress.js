

function same_as_billing(name1)
{
	
	var RemitTo_checkbox_status = document.addressform.elements['RemitTosame'].checked
	
	
	if ( !RemitTo_checkbox_status )
	{
		
		document.addressform.elements['RemitTosame'].checked = RemitTo_checkbox_status
		document.addressform.elements['RemitToName'].value = ''
		document.addressform.elements['RemitToAddress'].value = ''
		document.addressform.elements['RemitToAddress1'].value = ''
		document.addressform.elements['RemitToCity'].value = ''
		document.addressform.elements['RemitToState'].value = ''
		document.addressform.elements['RemitToZip'].value = ''
		document.addressform.elements['RemitToCountry'].value = ''
	
	}
	else 
	{
		
		
		
		document.addressform.elements['RemitTosame'].checked = RemitTo_checkbox_status
		document.addressform.elements['RemitToName'].value = document.addressform.elements['name'].value
		document.addressform.elements['RemitToAddress'].value = document.addressform.elements['address'].value
		document.addressform.elements['RemitToAddress1'].value = document.addressform.elements['address1'].value
		document.addressform.elements['RemitToCity'].value = document.addressform.elements['City'].value
		for(i=document.addressform.State.options.length-1;i>=0;i--)
		{
		if(document.addressform.State.options[i].selected)
		document.addressform.RemitToState.options[i].selected=true;
		}
		document.addressform.elements['RemitToZip'].value = document.addressform.elements['zip'].value
		for(i=document.addressform.country.options.length-1;i>=0;i--)
		{
		if(document.addressform.country.options[i].selected)
		document.addressform.RemitToCountry.options[i].selected=true;
		}
		
	
	}
	
	

}


