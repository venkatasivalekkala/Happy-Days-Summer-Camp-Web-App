<?php

include('helpers.php');
include('PP3.PHP');

check_post_only();
$params = process_parameters();
validate_data($params);
$stored = store_data_in_db($params);
	if($stored == "no")
	{
		$pics = upload_pic();
		if($pics =="yes"){
			include('confiramation.php');
		}
		else{
			write_form_error_page($pics);
		}
	}
	elseif($stored !="no"){
		write_form_error_page($stored);
	}
?>    