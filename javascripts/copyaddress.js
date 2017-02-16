
function same_as_billing(name1)
{
	var RemitTo_checkbox_status  = document.addressform.elements['RemitTosame'].checked
	var BillTo_checkbox_status   = document.addressform.elements['BillTosame'].checked
	var ShipTo_checkbox_status   = document.addressform.elements['ShipTosame'].checked
	var ShipFrom_checkbox_status = document.addressform.elements['ShipFromsame'].checked
	
	if(RemitTo_checkbox_status != null ||  BillTo_checkbox_status != null || ShipTo_checkbox_status != null || 	ShipFrom_checkbox_status != null || addShipTo_checkbox_status != null || addShipFrom_checkbox_status != null){
		
		if ( name1 == 'RemitTo' ){
			if ( !RemitTo_checkbox_status && name1 == 'RemitTo')
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
				for(i=document.addressform.State.options.length-1;i>=0;i--){
					if(document.addressform.State.options[i].selected)
						document.addressform.RemitToState.options[i].selected=true;
				}
				document.addressform.elements['RemitToZip'].value = document.addressform.elements['zip'].value
				for(i=document.addressform.country.options.length-1;i>=0;i--){
					if(document.addressform.country.options[i].selected)
						document.addressform.RemitToCountry.options[i].selected=true;
				}
			}
		}
		else if ( name1 == 'BillTo' ){
			//Bill To *****************************************************************************************************
			if ( !BillTo_checkbox_status )
			{
				document.addressform.elements['BillTosame'].checked = BillTo_checkbox_status
				document.addressform.elements['BillToName'].value = ''
				document.addressform.elements['BillToAddress'].value = ''
				document.addressform.elements['BillToAddress1'].value = ''
				document.addressform.elements['BillToCity'].value = ''
				document.addressform.elements['BillToState'].value = ''
				document.addressform.elements['BillToZip'].value = ''
				document.addressform.elements['BillToCountry'].value = ''
			}
			else 
			{
				document.addressform.elements['BillTosame'].checked = BillTo_checkbox_status
				document.addressform.elements['BillToName'].value = document.addressform.elements['name'].value
				document.addressform.elements['BillToAddress'].value = document.addressform.elements['address'].value
				document.addressform.elements['BillToAddress1'].value = document.addressform.elements['address1'].value
				document.addressform.elements['BillToCity'].value = document.addressform.elements['City'].value
				for(i=document.addressform.State.options.length-1;i>=0;i--){
					if(document.addressform.State.options[i].selected)
						document.addressform.BillToState.options[i].selected=true;
				}
				document.addressform.elements['BillToZip'].value = document.addressform.elements['zip'].value
				for(i=document.addressform.country.options.length-1;i>=0;i--){
					if(document.addressform.country.options[i].selected)
						document.addressform.BillToCountry.options[i].selected=true;
				}
			}
		}
		else if ( name1 == 'ShipTo' ){
			
			//Ship To *****************************************************************************************************
			if ( !ShipTo_checkbox_status )
			{
				document.addressform.elements['ShipTosame'].checked = ShipTo_checkbox_status
				document.addressform.elements['ShipToName'].value = ''
				document.addressform.elements['ShipToAddress'].value = ''
				document.addressform.elements['ShipToAddress1'].value = ''
				document.addressform.elements['ShipToCity'].value = ''
				document.addressform.elements['ShipToState'].value = ''
				document.addressform.elements['ShipToZip'].value = ''
				document.addressform.elements['ShipToCountry'].value = ''
			}
			else 
			{
				document.addressform.elements['ShipTosame'].checked = ShipTo_checkbox_status
				document.addressform.elements['ShipToName'].value = document.addressform.elements['name'].value
				document.addressform.elements['ShipToAddress'].value = document.addressform.elements['address'].value
				document.addressform.elements['ShipToAddress1'].value = document.addressform.elements['address1'].value
				document.addressform.elements['ShipToCity'].value = document.addressform.elements['City'].value
				for(i=document.addressform.State.options.length-1;i>=0;i--){
					if(document.addressform.State.options[i].selected)
						document.addressform.ShipToState.options[i].selected=true;
				}
				document.addressform.elements['ShipToZip'].value = document.addressform.elements['zip'].value
				for(i=document.addressform.country.options.length-1;i>=0;i--){
					if(document.addressform.country.options[i].selected)
						document.addressform.ShipToCountry.options[i].selected=true;
				}
			}
		}
		else if ( name1 == 'ShipFrom' ){
			
			//Ship From *****************************************************************************************************
			if ( !ShipFrom_checkbox_status )
			{
				document.addressform.elements['ShipFromsame'].checked = ShipFrom_checkbox_status
				document.addressform.elements['ShipFromName'].value = ''
				document.addressform.elements['ShipFromAddress'].value = ''
				document.addressform.elements['ShipFromAddress1'].value = ''
				document.addressform.elements['ShipFromCity'].value = ''
				document.addressform.elements['ShipFromState'].value = ''
				document.addressform.elements['ShipFromZip'].value = ''
				document.addressform.elements['ShipFromCountry'].value = ''
			}
			else 
			{
				document.addressform.elements['ShipFromsame'].checked = ShipFrom_checkbox_status
				document.addressform.elements['ShipFromName'].value = document.addressform.elements['name'].value
				document.addressform.elements['ShipFromAddress'].value = document.addressform.elements['address'].value
				document.addressform.elements['ShipFromAddress1'].value = document.addressform.elements['address1'].value
				document.addressform.elements['ShipFromCity'].value = document.addressform.elements['City'].value
				for(i=document.addressform.State.options.length-1;i>=0;i--){
					if(document.addressform.State.options[i].selected)
						document.addressform.ShipFromState.options[i].selected=true;
				}
				document.addressform.elements['ShipFromZip'].value = document.addressform.elements['zip'].value
				for(i=document.addressform.country.options.length-1;i>=0;i--){
					if(document.addressform.country.options[i].selected)
						document.addressform.ShipFromCountry.options[i].selected=true;
				}
			}
		}
	}
}


