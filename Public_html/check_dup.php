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
    
    $parent_id = 0;
    $parent_phone=$_POST['parent_home_phone'].$_POST['parent_home_prefix_phone'].$_POST['parent_h_phone'];
    $parent_email = $_POST['parent_email'];
	$sql = "SELECT id from parent where primary_phone='$parent_phone' or email ='$parent_email';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $parent_id = $row[0];
        }
        
    $child_id = 0;
    $cname=$_POST['child_first_name'];
    $sql = "SELECT id from child where parent_id=$parent_id and first_name='$cname';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $child_id = $row[0];
        }

    $enrollment = 0;
    $program=$_POST['checkbox'];
    for($i = 0; $i < count($program); $i++) {
        $sql = "SELECT * from enrollment where program_id=$program[$i] and
        child_id=$child_id;";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_array($result);
            $enrollment = 1;
        }
    }
                
        
    if($parent_id && $child_id && $enrollment)
        echo "DUP";
    else
        echo "OK";
    
    
    
?>    