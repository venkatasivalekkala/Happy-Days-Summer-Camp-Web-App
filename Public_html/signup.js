
//PARSER FOR DOB TO GET AGE
function getAge(dateString) {
	var date_arr = dateString.split("/");
    var today = new Date();
    var birthDate = new Date(date_arr[2], date_arr[0],date_arr[1]);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}
// SUBMIT BUTTON invokes validate_form()
function validate_form() {
	$( ".error" ).remove(); //removes existing error messages on the page

	var checked_programs = $("#personal_info_form li input[type='checkbox']:checked");
	var error_msg_chkbx = $("#personal_info_form li p.error");
	var valid = true;
	if (checked_programs.length < 1) {
		$("#personal_info_form div:first").append("<p class='error'>Please select at least 1 program.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_chkbx.remove();}

	var parent_first_name = $("#personal_info_form input[type='text'][name='parent_fname']");
	var error_msg_pfn = $("#personal_info_form li p.error");
    if (parent_first_name.val().length < 1){
		parent_first_name.parent().append("<p class='error'>First Name Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_pfn.remove();}

	var parent_last_name = $("#personal_info_form input[type='text'][name='parent_lname']");
	var error_msg_pln = $("#personal_info_form li p.error");
	if (parent_last_name.val().length < 1){
		parent_last_name.parent().append("<p class='error'>Last Name Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_pln.remove();}

	var chosen_relationship = $('#parent_relation').val();;
	var error_msg_relationship = $("#personal_info_form li p.error");
	var valid = true;
	if (chosen_relationship =="default") {
		$('#relationship').parent().append("<p class='error'>Please select relationship.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_relationship.remove();}

	var parent_address = $("#personal_info_form input[type='text'][name='parent_address']");
	var error_msg_pa = $("#personal_info_form li p.error");
	if (parent_address.val().length < 1){
		parent_address.parent().append("<p class='error'>Address Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_pa.remove();}

	var parent_city = $("#personal_info_form input[type='text'][name='parent_city']");
	var error_msg_pc = $("#personal_info_form li p.error");
	if (parent_city.val().length < 1){
		parent_city.parent().append("<p class='error'>City Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_pc.remove();}

	var chosen_state = $('#parent_state').val();
	var error_msg_state = $("#personal_info_form li p.error");
	var valid = true;
	if (chosen_state =="default") {
		$('#state').parent().append("<p class='error'>Please select a state.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_state.remove();}

	var regex_zip = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
	var parent_zip = $("#personal_info_form input[type='text'][name='parent_zip']");
	var error_msg_pz = $("#personal_info_form li p.error");
	if ((parent_zip.val().length < 5) || !(regex_zip.test(parent_zip.val()))){
		parent_zip.parent().append("<p class='error'>Valid Zipcode Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_pz.remove();}

	var regex_numeric = /^\d+$/;
	var parent_h_area_code = $("#personal_info_form input[type='text'][name='parent_home_area_phone']");
	var parent_h_prefix_code = $("#personal_info_form input[type='text'][name='parent_home_prefix_phone']");
	var parent_h_phone_parent = $("#personal_info_form input[type='text'][name='parent_h_phone']");

	var error_msg_phone = $("#personal_info_form li p.error");
	if (((parent_h_area_code.val().length < 3) || (parent_h_prefix_code.val().length < 3) || (parent_h_phone_parent.val().length < 4))
		|| (!(regex_numeric.test(parent_h_area_code.val())) || !(regex_numeric.test(parent_h_prefix_code.val())) || !(regex_numeric.test(parent_h_phone_parent.val())))){
		parent_h_area_code.parent().append("<p class='error'>Valid Home Phone Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_phone.remove();}

	var parent_c_area_code = $("#personal_info_form input[type='text'][name='parent_cell_area_phone']");
	var parent_c_prefix_code = $("#personal_info_form input[type='text'][name='parent_cell_prefix_phone']");
	var parent_c_phone_parent = $("#personal_info_form input[type='text'][name='parent_c_phone']");
	var error_msg_phone = $("#personal_info_form li p.error");
	if (((parent_c_area_code.val().length < 3) || (parent_c_prefix_code.val().length < 3) || (parent_c_phone_parent.val().length < 4))
		|| (!(regex_numeric.test(parent_c_area_code.val())) || !(regex_numeric.test(parent_c_prefix_code.val())) || !(regex_numeric.test(parent_c_phone_parent.val())))){
		parent_c_area_code.parent().append("<p class='error'>Valid Cell Phone Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_phone.remove();}

	var parent_email = $("#personal_info_form input[type='text'][name='parent_email']");
	var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var error_msg_email = $("#personal_info_form li p.error");
	if (!(regex_email.test(parent_email.val()))){
		parent_email.parent().append("<p class='error'>Valid Email Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_email.remove();}

// CHILD 
	var child_first_name = $("#personal_info_form input[type='text'][name='child_fname']");
	var error_msg_cfn = $("#personal_info_form li p.error");
	if (child_first_name.val().length < 1){
		child_first_name.parent().append("<p class='error'>First Name Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_cfn.remove();}

	var child_last_name = $("#personal_info_form input[type='text'][name='child_lname']");
	var error_msg_cln = $("#personal_info_form li p.error");
	if (child_last_name.val().length < 1){
		child_last_name.parent().append("<p class='error'>Last Name Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_cln.remove();}

	var programs_gender = $("#personal_info_form li input[name='gender']:checked");
	var error_msg_gender = $("#personal_info_form li p.error");
	var valid = true;
	if (programs_gender.length < 1) {
		$("#personal_info_form #gender").append("<p class='error'>Please select gender.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_gender.remove();}

	var dob = $("#datepicker").val();
	var age = getAge(dob);
	var error_msg_dob = $("#personal_info_form li p.error");
	if (dob==""){
		$('#datepicker').parent().append("<p class='error'>Please select DOB.</p>")
		valid = false;
		return valid;
	}
	else if ((age >16) ||(age <7)) {
		$('#datepicker').parent().append("<p class='error'>Child must be between ages 7-16 to be in our program.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_dob.remove();}

//EMERGENCY
	var emergency_first_name = $("#personal_info_form input[type='text'][name='emergency_fname']");
	var error_msg_efn = $("#personal_info_form li p.error");
	if (emergency_first_name.val().length < 1){
		emergency_first_name.parent().append("<p class='error'>First Name Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_efn.remove();}

	var emergency_last_name = $("#personal_info_form input[type='text'][name='emergency_lname']");
	var error_msg_eln = $("#personal_info_form li p.error");
	if (emergency_last_name.val().length < 1){
		emergency_last_name.parent().append("<p class='error'>Last Name Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_eln.remove();}

	var emergency_area_code = $("#personal_info_form input[type='text'][name='emergency_area_phone']");
	var emergency_prefix_code = $("#personal_info_form input[type='text'][name='emergency_prefix_phone']");
	var emergency_phone_parent = $("#personal_info_form input[type='text'][name='phone_emergency']");
	var error_msg_phone = $("#personal_info_form li p.error");
	if (((emergency_area_code.val().length < 3) && (emergency_prefix_code.val().length < 3) && (emergency_phone_parent.val().length < 4))
		|| (!(regex_numeric.test(emergency_area_code.val())) || !(regex_numeric.test(emergency_prefix_code.val())) || !(regex_numeric.test(emergency_phone_parent.val())))){
		emergency_area_code.parent().append("<p class='error'>Valid Phone Number Required.</p>")
		valid = false;
		return valid;
	}
	else{error_msg_phone.remove();}

	return valid;
}

// CLEAR BUTTON
function reset_form() {
  $("#personal_info_form")[0].reset();
  $(".error").remove();
  return false;
}

// ready( function your_func)  -> when page loaded, invoke your_func();
$(document).ready(function() {
  $("#datepicker").datepicker(); // Datepicker UI init
  $('#profile_image').change( function(e) { // profile picture uploader
    var img = URL.createObjectURL(e.target.files[0]);
    $('.image').attr('src', img);
  });

  $("#reset_button").on('click', reset_form);


  $('.required').on('blur', function(e) {
    var current_input = $(e.currentTarget);
    if (current_input.val().length > 0) {
      current_input.parent().find('.error').remove();
    }
  })

});
