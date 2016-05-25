<?php

function process_parameters() {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-first-name']));          //0
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-middle-name']));          //1 
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-last-name']));          //2
    $params[] = trim(str_replace($bad_chars, "",$_POST['relationship']));   //3
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-address']));        //4
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-address2']));   //5
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-city']));           //6
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-state']));          //7
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-zip']));            //8
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-home-phone']));    //9     
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-home-prefix-phone']));  //10
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-h-phone']));         //11
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-cell-phone']));         //12
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-cell-prefix-phone']));       //13
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-c-phone']));              //14
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent-email']));                  //15
    $params[] = trim(str_replace($bad_chars, "",$_POST['child-first-name']));             //16
    $params[] = trim(str_replace($bad_chars, "",$_POST['child-middle-name']));                 //17
    $params[] = trim(str_replace($bad_chars, "",$_POST['child-last-name']));                 //18
    $params[] = trim(str_replace($bad_chars, "",$_POST['child-nick-name']));                  //19
    $params[] = trim(str_replace($bad_chars, "",$_POST['profile_pic']));            //20
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));                 //21    
    $params[] = trim(str_replace($bad_chars, "",$_POST['mm']));                  //22
    $params[] = trim(str_replace($bad_chars, "",$_POST['dd']));                   //23
    $params[] = trim(str_replace($bad_chars, "",$_POST['yyyy']));                   //24
    $params[] = trim(str_replace($bad_chars, "",$_POST['medical']));                    //25
    $params[] = trim(str_replace($bad_chars, "",$_POST['diet']));                        //26    
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency-first-name']));              //27
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency-last-name']));               //28
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency-phone']));             //29
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency-prefix-phone']));	//30
	$params[] = trim(str_replace($bad_chars, "",$_POST['phone-emergency'])); //31
    $params[] = trim(str_replace($bad_chars, "",$_POST['checkbox']));                    //32

    return $params;
    }

function store_data_in_db($params) {
    $db = get_db_handle();
      $parent_id = 0;
      ## if parent exists then retrive ID
    $parent_phone=$_POST['parent-home-phone'].$_POST['parent-home-prefix-phone'].$_POST['parent-h-phone'];
   $sql = "SELECT id from parent where primary_phone='$parent_phone';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $parent_id = $row[0];
        }
        
    ## if parent doesnot exists the insert parent and reteive ID
        else{
      ##  $phone = "$params[10]"."$params[11]"."$params[12]";
        $h_phone = "$params[13]"."$params[14]"."$params[15]";
    $sql = "insert into parent(first_name,middle_name,last_name,address1,address2,city,state,zip,primary_phone,secondary_phone,email) ".   
"values('$params[1]','$params[2]','$params[3]','$params[5]','$params[6]','$params[7]','$params[8]','$params[9]','$parent_phone','$h_phone','$params[16]');";
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    if($how_many == 1) echo "success";
    else echo "A critical error occurred.";
    $parent_id = mysqli_insert_id($db);

}
 
 ##check whether child exists..?? if yes then retrieve ID
$child_id = 0;
    $cname=$_POST['child-first-name'];
    $sql = "SELECT id from child where parent_id=$parent_id and
    first_name='$cname';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $child_id = $row[0];
        }


        else{
          
			$date_of_birth = "$params[22]"."/"."$params[23]"."/"."$params[24]";
			$e_phone = "$params[29]"."$params[30]"."$params[31]";
       $sql = "insert into child(parent_id,relation,first_name,middle_name,last_name,nickname,image_filename,gender,birthdate,conditions,diet,emergency_name,emergency_phone)" . 
       "values('$parent_id','$params[4]','$params[16]','$params[17]','$params[18]','$params[19]','$params[20]','$params[21]',STR_TO_DATE('$date_of_birth','%m/%d/%Y'),'$params[25]','$params[26]','$params[27]','$params[27]');";
 mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    if($how_many == 1) echo "success";
    else echo "A critical error occurred in child.";
    $child_id = mysqli_insert_id($db);
        }

 $enrollment = 0;
    $program=$_POST['checkbox'];
    for($i = 0; $i < count($program); $i++) {
        $sql = "insert in enrollment(program_id,child_id,)" .
        "values('$program[$i]', 'child_id');";
     mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    if($how_many == 1) echo "success enrollment";
    else echo "A critical error occurred in enrollment.";
    $parent_id = mysqli_insert_id($db);
        }
    

    mysqli_close($db);
}    
	
	
	
	
	
	?>