<?php

$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}
function get_db_handle() {
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn024';
    $password = 'bottom';
    $database = 'jadrn024';
    
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page("Cannot Connect!");
        }
    return $db;
    }
	
function write_error_page($msg) {
    write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_footer();
    }

	
function write_header() {
print <<<ENDBLOCK
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Sign-Up Form</title>

	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="registration.css" />
        
		
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script  src="registration.js"></script>
</head>
ENDBLOCK;

}

function write_footer() {
    echo "</body></html>";
    }
	
?>