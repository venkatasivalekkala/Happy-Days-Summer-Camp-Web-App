<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Confiramation Processing with PHP</title>
<link rel="stylesheet" type="text/css" href="confirmation.css" />
    

</head>


<body>
<?php

	$UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
    $fname = $_FILES['profile_pic']['name'];
	$pic = $params[21];
	$program=$_POST['checkbox'];
	$program_name = "";
    for($i = 0; $i < count($program); $i++) {
		if($program[$i] == "1" )
			$program_name = $program_name."Basketball Camp"."<br/>";
		elseif($program[$i] == "2" )
			$program_name = $program_name."Baseball Camp"."<br/>";
		elseif($program[$i] == "3" )
			$program_name = $program_name."Physical Training"."<br/>";
		elseif($program[$i] == "4" )
			$program_name = $program_name."Band Camp"."<br/>";
		elseif($program[$i] == "5" )
			$program_name = $program_name."Swimming"."<br/>";
		elseif($program[$i] == "6" )
			$program_name =$program_name."Nature Discovery"."<br/>";
	}
	
	$parent_hphone = $_POST['parent_home_phone'].$_POST['parent_home_prefix_phone'].$_POST['parent_h_phone'];
    $parent_cell_phone = "$params[13]"."$params[14]"."$params[15]";
	$Date_of_Birth = "$params[23]"."/"."$params[31]"."/"."$params[32]";
	$Emergency_phone = "$params[28]"."$params[29]"."$params[30]";
echo <<<ENDBLOCK
    <h1> Thank you for registering $params[1]</h1>
    <table id="table">
	<tr>
            <td>Program(s)</td>
            <td>$program_name</td>
        </tr>
        <tr>
            <td>Parent First Name</td>
            <td>$params[1]</td>
        </tr>
        <tr>
            <td>Parent Middle Name</td>
            <td>$params[2]</td>
        </tr>
        <tr>
            <td>Parent Last Name</td>
            <td>$params[3]</td>
        </tr>
        <tr>
            <td>Relationship To child</td>
            <td>$params[4]</td>
        </tr>
        <tr>
            <td>Address1</td>
            <td>$params[5]</td>
        </tr>           
		<tr>
            <td>Address2</td>
            <td>$params[6]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[7]</td>
        </tr>
        <tr>
            <td>State</td>
            <td>$params[8]</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>$params[9]</td>
        </tr>
        <tr>
            <td>Home Phone</td>
            <td>$parent_hphone</td>
        </tr>           
		<tr>
            <td>Cell Phone</td>
            <td>$parent_cell_phone</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>$params[16]</td>
        </tr>
        <tr>
            <td>Child First Name</td>
            <td>$params[17]</td>
        </tr>
        <tr>
            <td>Child Middle Name</td>
            <td>$params[18]</td>
        </tr>
        <tr>
            <td>Child Last Name</td>
            <td>$params[19]</td>
        </tr>           
		<tr>
            <td>Child NickName</td>
            <td>$params[20]</td>
        </tr>
        <tr>
            <td>Child Gender</td>
            <td>$params[22]</td>
        </tr>
		<tr>
            <td>Profile Pic</td>
ENDBLOCK;
		?>
	<?php	$d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        elseif($fname == $pic){
			echo <<< ENDBLOCK
            <td><img src="$UPLOAD_DIR/$fname" width='200px' /></td>
			</tr>
ENDBLOCK;
        }
    }    
	
	echo <<< ENDBLOCK
		
        </tr>
        <tr>
            <td>Child Date Of Birth</td>
            <td>$Date_of_Birth</td>
        </tr>
        
        <tr>
            <td>Medical Description</td>
            <td>$params[24]</td>
        </tr>           
		<tr>
            <td>Special Dietary</td>
            <td>$params[25]</td>
        </tr>
        <tr>
            <td>Emergency First Name</td>
            <td>$params[26]</td>
        </tr>
        <tr>
            <td>Emergency Last Name</td>
            <td>$params[27]</td>
        </tr>
        <tr>
            <td>Emergency Phone</td>
            <td>$Emergency_phone</td>
        </tr>
        
    </table>                          
ENDBLOCK;

?>
</body></html>