<?php

function validate_data($params) {
    $msg = "";
	
	 if(strlen($params[1]) == 0)
        $msg .= "Please enter parent first name<br />";  
    if(strlen($params[4]) == 0)
        $msg .= "Please enter relationship to child <br />"; 
    if(strlen($params[4]) == 0)
        $msg .= "Please enter parent last name<br />";                        
    if(strlen($params[5]) == 0)
        $msg .= "Please enter parent address<br />";
    if(strlen($params[7]) == 0)
        $msg .= "Please enter the city<br />"; 
	if(strlen($params[8]) == 0)
        $msg .= "Please enter the state<br />";
	if(strlen($params[9]) == 0)
        $msg .= "Please enter the zip code<br />";
    elseif(!is_numeric($params[9])) 
        $msg .= "Zip code may contain only numeric digits<br />";
	$parent_phone1 = "$params[10]"."$params[11]"."$params[12]";
	if(strlen($parent_phone1) != 10)
        $msg .= "Please enter the Home Phone number<br />";
    elseif(!is_numeric($parent_phone1)) 
        $msg .= "Home Phone number may contain only numeric digits<br />";
	if(strlen($params[16]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[16], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";
	if(strlen($params[17]) == 0)
        $msg .= "Please enter child First Name<br />"; 
	if(strlen($params[19]) == 0)
        $msg .= "Please enter child Last Name<br />"; 
	if(strlen($params[22]) == 0)
        $msg .= "Please Select the Gender<br />"; 
	if(strlen($params[23]) == 0 || strlen($params[31]) == 0 ||strlen($params[32]) == 0)
        $msg .= "Please Enter The valid date <br />";
	if(strlen($params[26]) == 0)
        $msg .= "Please enter Emergency contact first name<br />";	
	if(strlen($params[27]) == 0)
        $msg .= "Please enter Emergency contact Last name<br />";
	$e_phone1 = "$params[28]"."$params[29]"."$params[30]";
	if(strlen($e_phone1) != 10)
        $msg .= "Please enter the Home Phone number<br />";
    elseif(!is_numeric($e_phone1)) 
        $msg .= "Emergency Phone number may contain only numeric digits<br />";   
		
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
	
	?>