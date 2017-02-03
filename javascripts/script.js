//global variables
var newUserForm;
var modUserForm;
var movUserForm;
var termUserForm;
var frmLocations;
var frmDivisions;
var submittedByFirst = "";
var submittedByLast = "";
var selectedValue = "formNewEmployee";
var passedVars;
var disableSelection;

//onload event


$(document).ready(function(){
	passedVars = getUrlVars();
        if(passedVars['selection'] && passedVars['selection'] == 'disabled'){
            disableSelection = true;
        }
	//download forms and setup page for use
	GetForms();
	
	//set new request form as default on page load
	$('#newRequest').attr('checked', true);
	
	//dialog box setups
	$('#dateDialog').dialog({ autoOpen: false });
	$('#tmwDialog').dialog({ autoOpen: false });
	$('#jdeDialog').dialog({ autoOpen: false });
	$('#maximoDialog').dialog({ autoOpen: false });
	$('#assetDialog').dialog({ autoOpen: false });
	$( "#assetDialog" ).dialog( "option", "width", 450 );
	$('#selfRequestDialog').dialog({ autoOpen: false });
	$('#supRequestDialog').dialog({ autoOpen: false });
	$('#emailSent').dialog({ autoOpen: false });
	$('#notSent').dialog({ autoOpen: false });
	$('#safetyAlert').dialog({ autoOpen: false });
        $('#validError').dialog({ autoOpen: false });
        $('#validError').dialog( "option", "width", 750 );

	//handle form selection
	$('[name=selectForm]').change(function () {
		selectedValue = $(this).val();
		ShowSelectedForm();
	});
});

function ShowSelectedForm(){
	$('[name=selectForm]').attr('disabled', true);
	if (selectedValue == 'formNewEmployee') {
		ShowNewForm();
	}
	if (selectedValue == 'formModifyEmployee') {
		ShowModifyForm();
	}
	if (selectedValue == 'formMoveRequest') {
		ShowMoveForm();
	}
	if (selectedValue == 'formTermination') {
		//ShowTermForm();
                if(window.location.href.indexOf("omni.lan") == -1){
                    window.location = 'http://intranet/employeeaccessformsterm/?form=term';
                }else{
                    window.location = 'http://intranet.omni.lan/employeeaccessformsterm/?form=term';
                }
	}
}

// Read a page's GET URL variables and return them as an associative array.
function getUrlVars(){
  var vars = [], hash;
  var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
   
  for(var i = 0; i < hashes.length; i++){
	  hash = hashes[i].split('=');
	  vars.push(hash[0]);
	  vars[hash[0]] = hash[1];
  }
return vars;
}

function SetFormEvents(){
	
	$('[name=supEmail]').keyup(function() {
		var inputVal = $(this).val();
		var characterReg = /^[\w-\.]+$/;
		if(!characterReg.test(inputVal)) {
			inputVal =  inputVal.replace(/[^\w-\.]/, '');
			$(this).val(inputVal);
		}
	});
	
	$(function() {
		$('#startDate').datepicker({
			onClose: function (dateText, inst) {
				var selectedDate = new Date(dateText);
				var curDate = new Date();
				curDate.setDate(curDate.getDate() + 6);
				if(!(selectedDate > curDate)){
					$('#dateDialog').dialog('open');
				}

			},
			changeYear: true,
			changeMonth: true
		});
	});
	$(function() {
		$('#endDate').datepicker({
			numberOfMonths: 1,
			changeYear: true,
			changeMonth: true
		});
	});
	$(function() {
		$('#moveDate').datepicker({
			numberOfMonths: 1,
			changeYear: true,
			changeMonth: true
		});
	});
	//term form dates
	$(function() {
		$('[name=empHireDate]').datepicker({
			numberOfMonths: 1,
			changeYear: true,
			changeMonth: true
		});
	})
	$(function() {
		$('[name=empLastDay]').datepicker({
			numberOfMonths: 1,
			changeYear: true,
			changeMonth: true
		});
	})
	$(function() {
		$('[name=empTermDate]').datepicker({
			numberOfMonths: 1,
			changeYear: true,
			changeMonth: true
		});
	})

	
	$('#tmw').change(function () {
		$('#tmw').attr('disabled', true);
		if ($("#tmwForm").is(":hidden")) {
			$("#tmwForm").show("slow", function () {toggleDisabled('#tmw')});
		} else {
			$("#tmwForm").slideUp("slow", function () {toggleDisabled('#tmw')});
		}
		
    });
	$('#jde').change(function () {
		$('#jde').attr('disabled', true);
		if ($("#jdeForm").is(":hidden")) {
			$("#jdeForm").show("slow", function () {toggleDisabled('#jde')});
		} else {
			$("#jdeForm").slideUp("slow", function () {toggleDisabled('#jde')});
		}
		
    });
	$('#maximo').change(function () {
		$('#maximo').attr('disabled', true);
		if ($("#maximoForm").is(":hidden")) {
			$("#maximoForm").show("slow", function () {toggleDisabled('#maximo')});
		} else {
			$("#maximoForm").slideUp("slow", function () {toggleDisabled('#maximo')});
		}
		
    });
	$('[name=xatanet]').change(function () {
		$('[name=xatanet]').attr('disabled', true);
		if ($("#xataNetForm").is(":hidden")) {
			$("#xataNetForm").show("slow", function () {toggleDisabled('[name=xatanet]')});
		} else {
			$("#xataNetForm").slideUp("slow", function () {toggleDisabled('[name=xatanet]')});
		}		
    });
	$('[name=rimas]').change(function () {
		$('[name=rimas]').attr('disabled', true);
		if ($("#rimasForm").is(":hidden")) {
			$("#rimasForm").show("slow", function () {toggleDisabled('[name=rimas]')});
		} else {
			$("#rimasForm").slideUp("slow", function () {toggleDisabled('[name=rimas]')});
		}		
    });
	$('[name=oldExtention]').change(function () {
		$('[name=oldExtention]').attr('disabled', true);
		if($('[name=oldExtention]:checked').val() == 'yes'){
			$("#spnOldExt").show("fast", function () {toggleDisabled('[name=oldExtention]')});
		} else {
			$("#spnOldExt").slideUp("fast", function () {toggleDisabled('[name=oldExtention]')});
		}
		
    });
	$('[name=compAccess]').change(function () {
		$('[name=compAccess]').attr('disabled', true);
		if($('[name=compAccess]:checked').val() == 'yes'){
			$("#computerForm").show("fast", function () {toggleDisabled('[name=compAccess]')});
		} else {
			$("#computerForm").slideUp("fast", function () {toggleDisabled('[name=compAccess]')});
		}
		
    });
	$('[name=empStatus]').change(function () {
		$('[name=empStatus]').attr('disabled', true);
		if($('[name=empStatus]').val() != 'Full Time' && $('[name=empStatus]').val() != 'Part Time' && $('[name=empStatus]').val() != '0'){
			$("#spnEndDate").show("fast", function () {toggleDisabled('[name=empStatus]')});
		} else {
			$("#spnEndDate").slideUp("fast", function () {toggleDisabled('[name=empStatus]')});
		}
    });
	$('[name=mobileTraining]').change(function () {
		$('[name=mobileTraining]').attr('disabled', true);
		if($('[name=mobileTraining]:checked').val() == 'yes'){
			$("#safteyDiv").show("fast", function () {toggleDisabled('[name=mobileTraining]')});
		} else {
			$("#safteyDiv").slideUp("fast", function () {toggleDisabled('[name=mobileTraining]')});
		}
		
    });
	$('[name=needComputer]').change(function () {
		$('[name=needComputer]').attr('disabled', true);
		if($('[name=needComputer]:checked').val() == 'yes'){
			$("#spnNewComp").show("fast", function () {toggleDisabled('[name=needComputer]')});
			$('[name=existingComputer][value=no]').attr('checked', true);
			$("#existingCompDiv").slideUp("fast");
		} else {
			$("#spnNewComp").slideUp("fast", function () {toggleDisabled('[name=needComputer]')});
			$('[name=existingComputer][value=yes]').attr('checked', true);
			$("#existingCompDiv").show("fast");
			$("#spnExistingComputer").show("fast");
			$("#newCompDiv").slideUp("fast");
		}
    });
	$('[name=existingComputer]').change(function () {
		$('[name=existingComputer]').attr('disabled', true);
		if($('[name=existingComputer]:checked').val() == 'yes'){
			$("#spnExistingComputer").show("fast", function () {toggleDisabled('[name=existingComputer]')});
			$('[name=needComputer][value=no]').attr('checked', true);
			$("#newCompDiv").slideUp("fast");
		} else {
			$("#spnExistingComputer").slideUp("fast", function () {toggleDisabled('[name=existingComputer]')});
			$('[name=needComputer][value=yes]').attr('checked', true);
			$("#newCompDiv").show("fast");
			$("#spnNewComp").show("fast");
			$("#existingCompDiv").slideUp("fast");
		}
    });
	
	
	$('[name=lastName]').blur(function () {
		if(!(submittedByLast == "")){
			if((this).value.toLowerCase() == submittedByLast.toLowerCase()){
				$('#selfRequestDialog').dialog('open');
			}
		}
	});
	$('[name=supLastName]').blur(function () {
		if(!(submittedByLast == "") && !((this).value == "") && !(selectedValue == 'formTermination')){
			if(!((this).value.toLowerCase() == submittedByLast.toLowerCase())){
				$('#supRequestDialog').dialog('open');
			}
		}
	});
	
	$('[type=reset]').click(function () {
		ShowSelectedForm();
	});
	
	$('#assetQ').click(function () {
		$('#assetDialog').dialog('open');
	});
	//hide extra form fields
	$("#tmwForm").hide();
	$("#xataNetForm").hide();
	$("#rimasForm").hide();
	$("#jdeForm").hide();
	$("#maximoForm").hide();
	$("#spnOldExt").hide();
	$("#spnEndDate").hide();
	$("#spnNewComp").hide();
	$("#spnExistingComputer").hide();
	$("#computerForm").hide();
	$("#safteyDiv").hide();
	
}

function toggleDisabled(strSelect){
	if( $(strSelect).attr('disabled') == true){ 
		$(strSelect).attr('disabled', false);
	}else{
		$(strSelect).attr('disabled', true);
	}
}


function ShowNewForm(){
	$('#pageTitle').html('New Employee Request Form');
	if ($("#formContainer").not(":hidden")) {
		$("#formContainer").fadeOut("slow", function() {
			$('#formContainer').html(newUserForm);
			$('#divLocation').html(frmLocations);
			if(!(submittedByLast == "")){
				$('[name=submittedBy]').val(submittedByLast + ", " + submittedByFirst);
			}
			SetFormEvents();
			NewValidate();
			$("#formContainer").fadeIn("slow", function () {
                            if(!disableSelection){
                                toggleDisabled('[name=selectForm]');
                            }else{ $('strong').empty().remove(); }
                        });
		});
	}
}

function ShowTermForm(){
	$('#pageTitle').html('Employee Termination Form');
	if ($("#formContainer").not(":hidden")) {
		$("#formContainer").fadeOut("slow", function() {
			$('#formContainer').html(termUserForm);
			$('#divLocation').html(frmDivisions);
			if(!(submittedByLast == "")){
				$('[name=submittedBy]').val(submittedByLast + ", " + submittedByFirst);
			}
			SetFormEvents();
			TermValidate();
			$("#formContainer").fadeIn("slow", function () {
                            if(!disableSelection){
                                toggleDisabled('[name=selectForm]');
                            }else{ $('strong').empty().remove(); }
                        });
		});
	}
}

function ShowModifyForm(){
	$('#pageTitle').html('Modify Employee Request Form');
	if ($("#formContainer").not(":hidden")) {
		$("#formContainer").fadeOut("slow", function() {
			$('#formContainer').html(modUserForm);
			$('#divLocation').html(frmLocations);
			if(!(submittedByLast == "")){
				$('[name=submittedBy]').val(submittedByLast + ", " + submittedByFirst);
			}
			SetFormEvents();
			ModifyValidate();
			$("#formContainer").fadeIn("slow", function () {
                            if(!disableSelection){
                                toggleDisabled('[name=selectForm]');
                            }else{ $('strong').empty().remove(); }
                        });
		});
	}
}

function ShowMoveForm(){
	$('#pageTitle').html('Employee Move Request Form');
	if ($("#formContainer").not(":hidden")) {
		$("#formContainer").fadeOut("slow", function() {
			$('#formContainer').html(movUserForm);
			//build locations dropdown from database
			$('#curLocation').html(frmLocations);
			$('#curLocation').html($('#curLocation').html().replace(/Employee Location:/,""));
			$('#curLocation select').attr('id', 'curLocationSelect');
			$('#curLocation select').attr('name', 'curLocationSelect');
			$('#newLocation').html(frmLocations);
			$('#newLocation').html($('#newLocation').html().replace(/Employee Location:/,""));
			$('#newLocation select').attr('id', 'newLocationSelect');
			$('#newLocation select').attr('name', 'newLocationSelect');
			if(!(submittedByLast == "")){
				$('[name=submittedBy]').val(submittedByLast + ", " + submittedByFirst);
			}
			SetFormEvents();
			MoveValidate();
			$("#formContainer").fadeIn("slow", function () {
                            if(!disableSelection){
                                toggleDisabled('[name=selectForm]');
                            }else{ $('strong').empty().remove(); }
                        });
		});
	}
}

function NewValidate(){
	//custom validate methods
	jQuery.validator.addMethod( 
	"selectNone", 
	function(value, element) { 
			if (element.value == "0") { 
				return false; 
			} else { return true; }
		}, 
		"Please select an option." 
	);
	
	jQuery.validator.addMethod( 
	"subSame", 
	function(value, element) { 
			if(submittedByLast == "") { return true; }
			if (element.value.toLowerCase() == submittedByLast.toLowerCase()) { 
				return true; 
			} else { return false; }
		}, 
		"Last name not same as requester." 
	);
	
	jQuery.validator.addMethod( 
	"subDif", 
	function(value, element) { 
			if(submittedByLast == "") { return true; }
			if (!(element.value.toLowerCase() == submittedByLast.toLowerCase())) { 
				return true; 
			} else { return false; }
		}, 
		"Last name not different from requester." 
	);
	
	jQuery.validator.addMethod( 
	"checkTMW", 
	function(value, element) { 
			if (element.checked) { 
				counter = 0;
				$('[name=tmwOptions[]]').each(function(){
					if((this).checked){
						counter++;
					}
				});
				if(counter == 0){ $('#tmwDialog').dialog('open'); return false; }
				if($('[name=tmwSecurity]').val() == "0"){ $('#tmwDialog').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"checkSafety", 
	function(value, element) { 
			if ($('[name=mobileTraining]:checked').val() == "yes") { 
				counter = 0;
				$('[name=safetyOptions[]]').each(function(){
					if((this).checked){
						counter++;
					}
				});
				if(counter == 0){ $('#safetyAlert').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"checkJDE", 
	function(value, element) { 
			if (element.checked) { 
				if($('[name=jdeReqs]').val() == ""){ $('#jdeDialog').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"checkTemp", 
	function(value, element) { 
			if ($('[name=temp]:checked').val() == "yes") { 
				if($('[name=endDate]').val() == ""){ return false; }
				return true;
			} else { return true; }
		}, 
		"* No date supplied." 
	);
	
	jQuery.validator.addMethod( 
	"checkExt", 
	function(value, element) { 
			if ($('[name=oldExtention]:checked').val() == "yes") { 
				if($('[name=oldExtValue]').val() == ""){ return false; }
				return true;
			} else { return true; }
		}, 
		"* No extention supplied." 
	);
	
	jQuery.validator.addMethod( 
	"checkAssetID", 
	function(value, element) { 
			if ($('[name=existingComputer]:checked').val() == "yes") { 
				if($('[name=assetID]').val() == ""){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"checkDevice", 
	function(value, element) {
			var found = false;
			if ($('[name=needComputer]:checked').val() == "yes") {
				$('[name=newDevice]').each(function(){
				   if($(this).is(':checked') == true) { found = true; }
				});
				if(found) { return true; } else { return false; }
			} else { return true; }
		}, 
		"* No computer specified." 
	);
	
	jQuery.validator.addMethod( 
	"checkMaximo", 
	function(value, element) { 
			if (element.checked) { 
				if($('[name=maximoDescription]').val() == "0"){ $('#maximoDialog').dialog('open'); return false; }
				if($('[name=maximoJob]').val() == "0"){ $('#maximoDialog').dialog('open'); return false; }
				if($('[name=maximoPRLimit]').val() == ""){ $('#maximoDialog').dialog('open'); return false; }
				if($('[name=maximoPRLimit]').val() == ""){ $('#maximoDialog').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);

	jQuery.validator.addMethod( 
	"needPhoneVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=needPhone]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);

	jQuery.validator.addMethod( 
	"needComputerVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=needComputer]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"existingComputerVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=existingComputer]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"oldExtentionVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=oldExtention]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);

	$("#myForm").validate({ 
		rules: { 
			lastName: {
				required: true,
				subDif: true
			},
			firstName: 'required',
			supFirstName: 'required',
			mobileTraining: {
				required: true,
				checkSafety: true
			},
			supLastName: {
				required: true,
				subSame: true
			},
			supEmail: 'required',
			needPhone: { needPhoneVal: true },
			location: {
				selectNone: true
			},
			rimasReqs: {
				required: "[name=rimas]:checked"
			},
			startDate: {
				required: true,
				date: true
			},
			jobTitle: 'required',
			empStatus: {
				selectNone: true
			},
			oldExtention: { oldExtentionVal: true },
			tmw: {
				checkTMW: true
			},
			jde: {
				checkJDE: true
			},
			maximo: {
				checkMaximo: true
			},
			oldExtValue: {
				checkExt: true
			},
			endDate: {
				checkTemp: true
			},
			newDevice: {
				checkDevice: true
			},
			needComputer: {  needComputerVal: true },
			existingComputer: { existingComputerVal: true },
			assetID: { checkAssetID: true },
			compAccess: 'required'
		},
		messages: {
			firstName: '*',
			jobTitle: '*',
			lastName: '*',
			supFirstName: '*',
			supLastName: '*',
			supEmail: '*',
			startDate: ' Required: Needs to be a date.',
			needPhone: '*',
			oldExtention: '*',
			empStatus: '*',
			location: ' Please select a location.',
			needComputer: '*',
			existingComputer: '*',
			mobileTraining: '*',
			compAccess: '*',
			rimasReqs: '*'
		},
		submitHandler: function(form) {
			toggleDisabled('[name=submittedBy]');
			$('#myForm').ajaxSubmit({
				success: function(msg){
					if(msg.indexOf("sent") != -1){
						$('#emailSent').dialog('open');
						ShowNewForm();
						toggleDisabled('[name=selectForm]');
					}else{
						$('#notSent').dialog('open');
						toggleDisabled('[name=submittedBy]');
					}
				},
				error: function(msg){
					$('#notSent').dialog('open');
					toggleDisabled('[name=submittedBy]');
				}
			});
			return false;
		},
                invalidHandler : function(form, validator) {
			$('#validError').dialog('open');
			return false;
		}
	}); 
}

function ModifyValidate(){
	//custom validate methods
	jQuery.validator.addMethod( 
	"selectNone", 
	function(value, element) { 
			if (element.value == "0") { 
				return false; 
			} else { return true; }
		}, 
		"Please select a location." 
	);
	jQuery.validator.addMethod( 
	"checkTMW", 
	function(value, element) { 
			if (element.checked) { 
				counter = 0;
				$('[name=tmwOptions[]]').each(function(){
					if((this).checked){
						counter++;
					}
				});
				if(counter == 0){ $('#tmwDialog').dialog('open'); return false; }
				if($('[name=tmwSecurity]').val() == "0"){ $('#tmwDialog').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	jQuery.validator.addMethod( 
	"checkJDE", 
	function(value, element) { 
			if (element.checked) { 
				if($('[name=jdeReqs]').val() == ""){ $('#jdeDialog').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	jQuery.validator.addMethod( 
	"checkMaximo", 
	function(value, element) { 
			if (element.checked) { 
				if($('[name=maximoDescription]').val() == "0"){ $('#maximoDialog').dialog('open'); return false; }
				if($('[name=maximoJob]').val() == "0"){ $('#maximoDialog').dialog('open'); return false; }
				if($('[name=maximoPRLimit]').val() == ""){ $('#maximoDialog').dialog('open'); return false; }
				if($('[name=maximoPRLimit]').val() == ""){ $('#maximoDialog').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);

        jQuery.validator.addMethod(
	"subSame",
	function(value, element) {
			if(submittedByLast == "") { return true; }
			if (element.value.toLowerCase() == submittedByLast.toLowerCase()) {
				return true;
			} else { return false; }
		},
		"Last name not same as requester."
	);

	jQuery.validator.addMethod(
	"subDif",
	function(value, element) {
			if(submittedByLast == "") { return true; }
			if (!(element.value.toLowerCase() == submittedByLast.toLowerCase())) {
				return true;
			} else { return false; }
		},
		"Last name not different from requester."
	);

	$("#myForm").validate({ 
		rules: {
                        lastName: {
				required: true,
				subDif: true
			},
			supLastName: {
				required: true,
				subSame: true
			},
			firstName: 'required',
			supFirstName: 'required',
			supEmail: 'required',
			location: {
				selectNone: true
			},
			tmw: {
				checkTMW: true
			},
			jde: {
				checkJDE: true
			},
			maximo: {
				checkMaximo: true
			}
		},
		messages: {
			firstName: '*',
			lastName: '*',
			supFirstName: '*',
			supLastName: '*',
			supEmail: '*'
		},
		submitHandler: function(form) {
			toggleDisabled('[name=submittedBy]');
			$('#myForm').ajaxSubmit({
				success: function(msg){
					if(msg.indexOf("sent") != -1){
						$('#emailSent').dialog('open');
						ShowModifyForm();
						toggleDisabled('[name=selectForm]');
					}else{
						$('#notSent').dialog('open');
						toggleDisabled('[name=submittedBy]');
					}
				},
				error: function(msg){
					$('#notSent').dialog('open');
					toggleDisabled('[name=submittedBy]');
				}
			});
			return false;
		},
                invalidHandler : function(form, validator) {
			$('#validError').dialog('open');
			return false;
		}
	}); 
}


function TermValidate(){
	//custom validate methods
	jQuery.validator.addMethod(
	"selectNone",
	function(value, element) {
			if (element.value == "0") {
				return false;
			} else { return true; }
		},
		"Please select a location."
	);

        jQuery.validator.addMethod(
	"resonSelected",
	function(value, element) {
			if($('input[@name=empTermination[]]:checked').size() > 1 || $('input[@name=empResignation[]]:checked').size() > 1 || $('input[@name=empTransfer[]]:checked').size() > 1){
                            return true;
                        }
                        return false;
		},
		"*"
	);

	$("#myForm").validate({
		rules: {
			firstName: 'required',
			lastName: 'required',
			empTitle: 'required',
			location: {
				selectNone: true
			},
			empLastDay: 'required',
			empRehire: 'required',
			empHandbookFollowed: 'required',
			supFirstName: 'required',
			empNeedEmail: 'required',
			empNeedIDrive: 'required',
			empNeedVoicemail: 'required',
			supLastName: 'required',
                        reasonVal: {
                            resonSelected: true
                        }
		},
		messages: {
			firstName: '*',
			lastName: '*',
			empTitle: '*',
			empLastDay: '*',
			supFirstName: '*',
			empRehire: '*',
			empHandbookFollowed: '*',
			empNeedEmail: '*',
			empNeedIDrive: '*',
			empNeedVoicemail: '*',
			supLastName: '*'
		},
		submitHandler: function(form) {
			toggleDisabled('[name=submittedBy]');
			$('#myForm').ajaxSubmit({
				success: function(msg){
					if(msg.indexOf("sent") != -1){
						$('#emailSent').dialog('open');
						ShowTermForm();
						toggleDisabled('[name=selectForm]');
					}else{
						$('#notSent').dialog('open');
						toggleDisabled('[name=submittedBy]');
					}
				},
				error: function(msg){
					$('#notSent').dialog('open');
					toggleDisabled('[name=submittedBy]');
				}
			});
			return false;
		},
                invalidHandler : function(form, validator) {
			$('#validError').dialog('open');
			return false;
		}
	});
}

function MoveValidate(){
	//custom validate methods
	
	
        jQuery.validator.addMethod( 
	"needPhoneVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=needPhone]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
        

	jQuery.validator.addMethod( 
	"checkExt", 
	function(value, element) { 
			if ($('[name=oldExtention]:checked').val() == "yes") { 
				if($('[name=oldExtValue]').val() == ""){ return false; }
				return true;
			} else { return true; }
		}, 
		"* No extention supplied." 
	);
	
	jQuery.validator.addMethod( 
	"oldExtentionVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=oldExtention]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"selectNone", 
	function(value, element) { 
			if (element.value == "0") { 
				return false; 
			} else { return true; }
		}, 
		"Please select an option." 
	);
	
	jQuery.validator.addMethod( 
	"checkAssetID", 
	function(value, element) { 
			if ($('[name=existingComputer]:checked').val() == "yes") { 
				if($('[name=assetID]').val() == ""){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"checkDevice", 
	function(value, element) {
			var found = false;
			if ($('[name=needComputer]:checked').val() == "yes") {
				$('[name=newDevice]').each(function(){
				   if($(this).is(':checked') == true) { found = true; }
				});
				if(found) { return true; } else { return false; }
			} else { return true; }
		}, 
		"* No computer specified." 
	);

	jQuery.validator.addMethod( 
	"needComputerVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=needComputer]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);
	
	jQuery.validator.addMethod( 
	"checkSafety", 
	function(value, element) { 
			if ($('[name=mobileTraining]:checked').val() == "yes") { 
				counter = 0;
				$('[name=safetyOptions[]]').each(function(){
					if((this).checked){
						counter++;
					}
				});
				if(counter == 0){ $('#safetyAlert').dialog('open'); return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);

	jQuery.validator.addMethod( 
	"existingComputerVal", 
	function(value, element) { 
			if ($('[name=compAccess]:checked').val() == "yes") { 
				if(!$('[name=existingComputer]:checked').val()){ return false; }
				return true;
			} else { return true; }
		}, 
		"*" 
	);

	$("#myForm").validate({ 
		rules: { 
			firstName: 'required',
			lastName: 'required',
			supFirstName: 'required',
			supLastName: 'required',
			supEmail: 'required',
			oldExtention: { oldExtentionVal: true },
			needPhone: { needPhoneVal: true },
			oldExtValue: { checkExt: true},
			movePhoneNumber: 'required',
			newManager: 'required',
			mobileTraining: {
				required: true,
				checkSafety: true
			},
			curLocationSelect: {
				selectNone: true
			},
			newLocationSelect: {
				selectNone: true
			},
			newDevice: {
				checkDevice: true
			},
			needComputer: { needComputerVal: true },
			existingComputer: { existingComputerVal: true },
			assetID: {
				checkAssetID: true
			},
			moveDate: {
				required: true,
				date: true
			},
			compAccess: 'required'
		},
		messages: {
			firstName: '*',
			lastName: '*',
			oldExtention: '*',
			needPhone: '*',
			oldExtValue: '*',
			supFirstName: '*',
			supLastName: '*',
			supEmail: '*',
			movePhoneNumber: '*',
			curLocationSelect: '*',
			newLocationSelect: '*',
			newManager: '*',
			moveDate: '*',
			mobileTraining: '*',
			compAccess: '*'
		},
		submitHandler: function(form) {
			toggleDisabled('[name=submittedBy]');
			$('#myForm').ajaxSubmit({
				success: function(msg){
					if(msg.indexOf("sent") != -1){
						$('#emailSent').dialog('open');
						ShowMoveForm();
						toggleDisabled('[name=selectForm]');
					}else{
						$('#notSent').dialog('open');
						toggleDisabled('[name=submittedBy]');
					}
				},
				error: function(msg){
					$('#notSent').dialog('open');
					toggleDisabled('[name=submittedBy]');
				}
			});
			return false;
		},
                invalidHandler : function(form, validator) {
			$('#validError').dialog('open');
			return false;
		}
	}); 
}

function GetForms(){
	$('[name=selectForm]').attr('disabled', true);
	$.get("submittedBy.php", function(data){
		if(!(data == "0")){
			split = data.split("|");
			submittedByFirst = split[1];
			submittedByLast = split[0];
		}
		$.get("New.html", function(data){
			newUserForm = data;
			$.get("Modify.html", function(data){
				modUserForm = data;
				$.get("Move.html", function(data){
					movUserForm = data;
                                    //    $.get("Term.html", function(data){
                                    //      termUserForm = data;
                                    //        $.get("returnDivisions.php", function(data){
                                    //            frmDivisions = data;
                                                $.get("returnLocations.php", function(data){
                                                    frmLocations = data;
                                                    if(passedVars['form']){
                                                            switch(passedVars['form']){
                                                            case "modify":
                                                                    ShowModifyForm();
                                                                    $('input[value=formModifyEmployee]').attr('checked', 'checked');
                                                                    break;
                                                            case "move":
                                                                    ShowMoveForm();
                                                                    $('input[value=formMoveRequest]').attr('checked', 'checked');
                                                                    break;
                                                            case "term":
                                                                    ShowTermForm();
                                                                    $('input[value=formTermination]').attr('checked', 'checked');
                                                                    break;
                                                            default:
                                                                    ShowNewForm();
                                                            }
                                                    }else{
                                                            ShowNewForm();
                                                    }
                                        //    });
                                       //     });
                                       });
				});
			});
		});
	});
}