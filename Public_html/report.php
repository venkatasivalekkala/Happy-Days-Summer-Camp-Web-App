<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Happy Days Summer Camp Report</title>

	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="report.css" />
</head>

<body>
<h3> Happy Days Summer Camp </h3>
<h2> Basketball Summer Camp Report</h2>
<?php 

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
$db = get_db_handle();
$sql = "select c.first_name, c.last_name, c.nickname, c.image_filename,p.first_name, p.last_name, p.primary_phone, c.emergency_name, c.emergency_phone".
	",TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age from child c, parent p, program pr, enrollment e ".
	"where pr.description='Basketball Camp' and pr.id=e.program_id and c.id=e.child_id and c.parent_id=p.id;";
$result_set = mysqli_query($db,$sql);
?>
<table>
<tr>
<th>Child First Name</th>
<th>Child Last Name</th>
<th>Child Nick Name</th>
<th>Child Image</th>
<th>Child Age</th>
<th>Parent First Name</th>
<th>Parent Last Name</th>
<th>Parent Primary Phone</th>
<th>Emergency Contact Name</th>
<th>Emergency PhNumber</th>
</tr>
<?php
while($row = mysqli_fetch_array($result_set)){
	echo<<<ENDBLOCK
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
ENDBLOCK;
$UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
	$pic = $row[3];
	$image ="no";
$d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        elseif($fname == $pic){
			echo "<td><img src='$UPLOAD_DIR/$fname' width='200px' /></td>";
			$image=$pic;
		}
	}
	if($image!=$pic){
		echo"<td>$pic</td>";
	}
	echo<<<ENDBLOCK
<td>$row[9]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[6]</td>
<td>$row[7]</td>
<td>$row[8]</td>
</tr>
ENDBLOCK;
}
echo"</table>";
?>



<h2> Baseball Summer Camp Report</h2>
<?php 


$sql = "select c.first_name, c.last_name, c.nickname, c.image_filename,p.first_name, p.last_name, p.primary_phone, c.emergency_name, c.emergency_phone".
	",TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age from child c, parent p, program pr, enrollment e ".
	"where pr.description='Baseball Camp' and pr.id=e.program_id and c.id=e.child_id and c.parent_id=p.id;";
$result_set = mysqli_query($db,$sql);
?>
<table>
<tr>
<th>Child First Name</th>
<th>Child Last Name</th>
<th>Child Nick Name</th>
<th>Child Image</th>
<th>Child Age</th>
<th>Parent First Name</th>
<th>Parent Last Name</th>
<th>Parent Primary Phone</th>
<th>Emergency Contact Name</th>
<th>Emergency PhNumber</th>
</tr>
<?php
while($row = mysqli_fetch_array($result_set)){
	echo<<<ENDBLOCK
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
ENDBLOCK;
$UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
	$pic = $row[3];
	$image ="no";
$d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        elseif($fname == $pic){
			echo "<td><img src='$UPLOAD_DIR/$fname' width='200px' /></td>";
			$image=$pic;
		}
	}
	if($image!=$pic){
		echo"<td>$pic</td>";
	}
	echo<<<ENDBLOCK
<td>$row[9]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[6]</td>
<td>$row[7]</td>
<td>$row[8]</td>
</tr>
ENDBLOCK;
}
echo"</table>";
?>



<h2> Physical Training Summer Camp Report</h2>
<?php 

$sql = "select c.first_name, c.last_name, c.nickname, c.image_filename,p.first_name, p.last_name, p.primary_phone, c.emergency_name, c.emergency_phone".
	",TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age from child c, parent p, program pr, enrollment e ".
	"where pr.description='Physical Training' and pr.id=e.program_id and c.id=e.child_id and c.parent_id=p.id;";
$result_set = mysqli_query($db,$sql);
?>
<table>
<tr>
<th>Child First Name</th>
<th>Child Last Name</th>
<th>Child Nick Name</th>
<th>Child Image</th>
<th>Child Age</th>
<th>Parent First Name</th>
<th>Parent Last Name</th>
<th>Parent Primary Phone</th>
<th>Emergency Contact Name</th>
<th>Emergency PhNumber</th>
</tr>
<?php
while($row = mysqli_fetch_array($result_set)){
	echo<<<ENDBLOCK
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
ENDBLOCK;
$UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
	$pic = $row[3];
	$image ="no";
$d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        elseif($fname == $pic){
			echo "<td><img src='$UPLOAD_DIR/$fname' width='200px' /></td>";
			$image=$pic;
		}
	}
	if($image!=$pic){
		echo"<td>$pic</td>";
	}
	echo<<<ENDBLOCK
<td>$row[9]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[6]</td>
<td>$row[7]</td>
<td>$row[8]</td>
</tr>
ENDBLOCK;
}
echo"</table>";
?>

<h2> Band Summer Camp Report</h2>
<?php 

$sql = "select c.first_name, c.last_name, c.nickname, c.image_filename,p.first_name, p.last_name, p.primary_phone, c.emergency_name, c.emergency_phone".
	",TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age from child c, parent p, program pr, enrollment e ".
	"where pr.description='Band Camp' and pr.id=e.program_id and c.id=e.child_id and c.parent_id=p.id;";
$result_set = mysqli_query($db,$sql);
?>
<table>
<tr>
<th>Child First Name</th>
<th>Child Last Name</th>
<th>Child Nick Name</th>
<th>Child Image</th>
<th>Child Age</th>
<th>Parent First Name</th>
<th>Parent Last Name</th>
<th>Parent Primary Phone</th>
<th>Emergency Contact Name</th>
<th>Emergency PhNumber</th>
</tr>
<?php
while($row = mysqli_fetch_array($result_set)){
	echo<<<ENDBLOCK
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
ENDBLOCK;
$UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
	$pic = $row[3];
	$image ="no";
$d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        elseif($fname == $pic){
			echo "<td><img src='$UPLOAD_DIR/$fname' width='200px' /></td>";
			$image=$pic;
		}
	}
	if($image!=$pic){
		echo"<td>$pic</td>";
	}
	echo<<<ENDBLOCK
<td>$row[9]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[6]</td>
<td>$row[7]</td>
<td>$row[8]</td>
</tr>
ENDBLOCK;
}
echo"</table>";
?>

<h2>Swimming Summer Camp Report</h2>
<?php 

$sql = "select c.first_name, c.last_name, c.nickname, c.image_filename,p.first_name, p.last_name, p.primary_phone, c.emergency_name, c.emergency_phone".
	",TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age from child c, parent p, program pr, enrollment e ".
	"where pr.description='Swimming' and pr.id=e.program_id and c.id=e.child_id and c.parent_id=p.id;";
$result_set = mysqli_query($db,$sql);
?>
<table>
<tr>
<th>Child First Name</th>
<th>Child Last Name</th>
<th>Child Nick Name</th>
<th>Child Image</th>
<th>Child Age</th>
<th>Parent First Name</th>
<th>Parent Last Name</th>
<th>Parent Primary Phone</th>
<th>Emergency Contact Name</th>
<th>Emergency PhNumber</th>
</tr>
<?php
while($row = mysqli_fetch_array($result_set)){
	echo<<<ENDBLOCK
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
ENDBLOCK;
$UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
	$pic = $row[3];
	$image ="no";
$d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        elseif($fname == $pic){
			echo "<td><img src='$UPLOAD_DIR/$fname' width='200px' /></td>";
			$image=$pic;
		}
	}
	if($image!=$pic){
		echo"<td>$pic</td>";
	}
	echo<<<ENDBLOCK
<td>$row[9]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[6]</td>
<td>$row[7]</td>
<td>$row[8]</td>
</tr>
ENDBLOCK;
}
echo"</table>";
?>

<h2> Nature Discovery Summer Camp Report</h2>
<?php 

$sql = "select c.first_name, c.last_name, c.nickname, c.image_filename,p.first_name, p.last_name, p.primary_phone, c.emergency_name, c.emergency_phone".
	",TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age from child c, parent p, program pr, enrollment e ".
	"where pr.description='Nature Discovery' and pr.id=e.program_id and c.id=e.child_id and c.parent_id=p.id;";
$result_set = mysqli_query($db,$sql);
?>
<table>
<tr>
<th>Child First Name</th>
<th>Child Last Name</th>
<th>Child Nick Name</th>
<th>Child Image</th>
<th>Child Age</th>
<th>Parent First Name</th>
<th>Parent Last Name</th>
<th>Parent Primary Phone</th>
<th>Emergency Contact Name</th>
<th>Emergency PhNumber</th>
</tr>
<?php
while($row = mysqli_fetch_array($result_set)){
	echo<<<ENDBLOCK
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
ENDBLOCK;
$UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
	$pic = $row[3];
	$image ="no";
$d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        elseif($fname == $pic){
			echo "<td><img src='$UPLOAD_DIR/$fname' width='200px' /></td>";
			$image=$pic;
		}
	}
	if($image!=$pic){
		echo"<td>$pic</td>";
	}
	echo<<<ENDBLOCK
<td>$row[9]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[6]</td>
<td>$row[7]</td>
<td>$row[8]</td>
</tr>
ENDBLOCK;
}
echo"</table></body></html>";
?>

