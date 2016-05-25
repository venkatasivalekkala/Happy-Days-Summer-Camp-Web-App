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
	
	
	function upload_pic(){
		$pic = "yes";
    $UPLOAD_DIR = 'Images/';
    $fname = $_FILES['profile_pic']['name'];
    

    if(file_exists("$UPLOAD_DIR".$fname))  {
		//"<b>Error, The File $fname Already Exists On The Server</b><br />\n";

        }
    elseif($_FILES['profile_pic']['error'] > 0) {
        $err = $_FILES['profile_pic']['error'];    
       // echo "Error Code: $err ";
    if($err == 1)
        $pic = "The file was too big to upload, the limit is 2MB<br />";
        } 
    elseif(exif_imagetype($_FILES['profile_pic']['tmp_name']) != IMAGETYPE_JPEG) {
        $pic = "ERROR, not a jpg file<br />";   
        }
## file is valid, copy from /tmp to your directory.        
    else { 
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], "$UPLOAD_DIR".$fname);
       // echo "Success!</br >\n";
       // echo "The filename is: ".$fname."<br />";
       // echo "The type is: ".$_FILES['profile_pic']['type']."<br />";
       // echo "The size is: ".$_FILES['profile_pic']['size']."<br />";
       // echo "The tmp filename is: ".$_FILES['profile_pic']['tmp_name']."<br />";  
       // echo "The basename is: ".basename($fname)."<br />";  
	   $pic = "yes";
    } 
	
	return $pic;
}
  
function write_form_error_page($msg) {
    write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_form();
    write_footer();
    }  
function write_form() {
    print <<<ENDBLOCK
  
<body>
    
        <h1>Registration Form</h1>
        
		<form name="personal_info" 
        id= "personal_info_form"
        action="process_request.php"
		enctype="multipart/form-data"
		method="post"
		>
        
        <fieldset>
		<legend>Camp Program</legend>
          <div id="check_list">
		  <ul class="center">
      			<li><input type="checkbox" name="checkbox[]" id="bsc" value="1"/>Basketball Camp  &nbsp; <input type="checkbox" name="checkbox[]" value="2" />Baseball Camp <br></li>
      			<li><input type="checkbox" name="checkbox[]" value="3" />Physical Training  &nbsp;&nbsp;<input type="checkbox" name="checkbox[]" value="4" />Band Camp<br></li>
      			<li><input type="checkbox" name="checkbox[]" value="5" />Swimming &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="checkbox" name="checkbox[]" value="6">Nature Discovery</li>
        		</ul>
			</div >
        </fieldset>
		<div>
		<fieldset>
        <legend>Parent Information</legend>
         
          <ul>
            <li><label >First Name&nbsp;&nbsp;&nbsp;</label>
              <input type="text" name="parent_first_name" id="parent_first_name" size="25" class="required"  value ="$_POST[parent_first_name]" /> <span> * </span> </li>
            <li><label >Middle Name</label>
              <input type="text" name="parent_middle_name" id="parent_middle_name" size="25" class="required" value ="$_POST[parent_middle_name]" /></li>                     
            <li><label >Last Name&nbsp;&nbsp;&nbsp;</label>
              <input type="text" name="parent_last_name"   id="parent_last_name" size="25" class="required" value ="$_POST[parent_last_name]" /> <span> * </span> </li> 
            <li>
              <label >Relationship to Child<span> * </span> &nbsp; </label>
				
               <input type="radio" name="relationship" value="father" > Father
	 						<input type="radio" name="relationship" value="mother"> Mother
	 						<input type="radio" name="relationship" value="guardian"> Guardian
            </li>
            <li><label >Address 1</label>
              <input type="text" name="parent_address" id="parent_address" size="55" class="required" value = "$_POST[parent_address]"/> <span> * </span> </li>
			<li><label >Address 2 (optional) </label>
              <input type="text" name="parent_address2"  size="55" class="required" value = "$_POST[parent_address2]"/> </li>
              <li><label >City</label>
                <input type="text" name="parent_city"  id="parent_city" size="25" class="required" value = "$_POST[parent_city]"/>
                <label >State</label>
                
                  <input type="text" name="parent_state" id="parent_state" size="3"  value = "$_POST[parent_state]" > <span> * </span>                       
                <label >Zipcode</label>
                <input type="text" name="parent_zip"  id="parent_zip" size="5" maxlength="5" class="required" value = "$_POST[parent_zip]"/> <span> * </span>
              </li>      
              <li><label >Home Phone</label>
                (<input type="text" name="parent_home_phone" id="parent_home_phone" size="3" maxlength="3" class="required" value = "$_POST[parent_home_phone]"/>)  &nbsp;&nbsp;
                <input type="text" name="parent_home_prefix_phone" id="parent_home_prefix_phone" size="3" maxlength="3" class="required" value = "$_POST[parent_home_prefix_phone]"/> &nbsp;-&nbsp;
                <input type="text" name="parent_h_phone" id="parent_h_phone" size="4" maxlength="4" class="required"  value = "$_POST[parent_h_phone]" /> <span> * </span> </li> 
              <li><label >Cell Phone</label>
                (<input type="text" name="parent_cell_phone" size="3" maxlength="3" class="required" value = "$_POST[parent_cell_phone]" />)  &nbsp;&nbsp;
                <input type="text" name="parent_cell_prefix_phone" size="3" maxlength="3" class="required" value = "$_POST[parent_cell_prefix_phone]" /> &nbsp;-&nbsp;
                <input type="text" name="parent_c_phone" size="4" maxlength="4" class="required" value = "$_POST[parent_c_phone]" /></li> 
              <li><label >Email</label>
                <input type="text" name="parent_email" id="parent_email" size="25" class="required" value = "$_POST[parent_email]" /> <span> * </span> </li>
            </ul>
          
		</fieldset>
		</div>

		<fieldset>
		<legend>Child Information</legend>

		<div>
            <ul>
              <li><label >First Name&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="child_first_name" id="child_first_name" size='25' class="required" value = "$_POST[child_first_name]" /> <span> * </span> </li>
              <li><label >Middle Name</label>
              <input type="text" name="child_middle_name" id="child_middle_name" size="25" class="required" value = "$_POST[child_middle_name]" /></li>   
              <li><label >Last Name&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="child_last_name"  id="child_last_name" size="25" class="required" value = "$_POST[child_last_name]" /> <span> * </span> </li> 
              <li><label >Name that your child goes by</label>
                <input type="text" name="child_nick_name" id="child_nick_name" size="25"  value = "$_POST[child_nick_name]" /></li> 
              <li><label >Gender<span> * </span> &nbsp;</label>
			  
                  <input type="radio" name="gender" value="M" /> Male&nbsp;
                  <input type="radio" name="gender" value="F" /> Female
                </li>
                 
               
              <li><label>Date of Birth: </label>
			  <input type="text" name="dd" placeholder="dd" id="dd" size="3" maxlength="2"  value = "$_POST[dd]" > /
							<input type="text" name="mm" placeholder="mm" id="mm" size="3" maxlength="2"  value = "$_POST[mm]"  > /
							<input type="text" name="yyyy" placeholder="yyyy" id="yyyy" size="5" maxlength="4"  value = "$_POST[yyyy]"   >
			  <span> * </span> </li>
              <li><div class="center_upload">
			  <img src="profile.jpg" alt="child img"  class="image" >
              <label>Add an image of your child</label>
              </div>
              <input class="center_upload" type="file" id="profile_image" name="profile_pic" ></li>
             
              <li><label >List any medical conditions and allergies that your child may have:</label><br>
                <textarea rows="4" cols="50"   name="medical" form="personal_info_form"  value = "$_POST[medical]" > </textarea></li>       
              <li><label >List any special dietary requirements your child may need:</label><br>
                <textarea rows="4" cols="50"   name="diet" form="personal_info_form"  value = "$_POST[diet]" > </textarea></li>
            </ul>
			</div>
          </fieldset>
		  
	
		  <fieldset>
		<legend>Emergency Information</legend>

		 <div>
            <ul>
              <li><label >First Name</label>
                <input type="text" name="emergency_first_name" id="emergency_first_name" size="25" class="required" value = "$_POST[emergency_first_name]" /> <span> * </span> </li>                    
              <li><label >Last Name</label>
                <input type="text" name="emergency_last_name"  id="emergency_last_name" size="25" class="required"  value = "$_POST[emergency_last_name]" /> <span> * </span> </li> 
              <li><label >Phone</label>
                (<input type="text" name="emergency_phone" id="emergency_phone" size="3" maxlength="3" class="required"  value = "$_POST[emergency_phone]"/>)  &nbsp;&nbsp;
                <input type="text" name="emergency_prefix_phone" id="emergency_prefix_phone" size="3" maxlength="3" class="required"  value = "$_POST[emergency_prefix_phone]" /> &nbsp;-&nbsp;
                <input type="text" name="phone_emergency" id="phone_emergency" size="4" maxlength="4" class="required"  value = "$_POST[phone_emergency]" /></li> 
            </ul>
            <p id="req_text">*Required fields</p>
			
          </div>
		  </fieldset>
        
		<div id="message_line">&nbsp;</div>
		<h3 id="status"></h3>
        <div id="button_panel">  
            <input type="reset" value="Clear Data" class="button"  id="reset_button"/>
            <input type="button" value="Submit Data" id="send_data" class="button" /> 
	
            
			<a href="index.html"><p id="su" ><br/>Home<br/></p></a>
		 
		
        </form>
        
        
 
ENDBLOCK;
}                        

function process_parameters() {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['checkbox']));                   // 0
	$params[] = trim(str_replace($bad_chars, "",$_POST['parent_first_name']));          // 1
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_middle_name']));         // 2 
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_last_name']));			// 3
    $params[] = trim(str_replace($bad_chars, "",$_POST['relationship']));               //4
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_address']));        //5
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_address2']));//6
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_city']));           //7
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_state']));          //8
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_zip'])); 			//9
        $params[] = trim(str_replace($bad_chars, "",$_POST['parent_home_phone']));    //10     
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_home_prefix_phone']));  //11
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_h_phone']));         //12
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_cell_phone']));         //13
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_cell_prefix_phone']));       //14
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_c_phone']));              //15
    $params[] = trim(str_replace($bad_chars, "",$_POST['parent_email']));              //16    
    $params[] = trim(str_replace($bad_chars, "",$_POST['child_first_name']));             //17
    $params[] = trim(str_replace($bad_chars, "",$_POST['child_middle_name']));                 //18
    $params[] = trim(str_replace($bad_chars, "",$_POST['child_last_name']));                 //19
    $params[] = trim(str_replace($bad_chars, "",$_POST['child_nick_name']));;//20
    $params[] = trim(str_replace($bad_chars, "",$_FILES['profile_pic']['name']));	//21
	//$params[] = trim(str_replace($bad_chars, "",$_POST['profile_pic']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));  //22
    $params[] = trim(str_replace($bad_chars, "",$_POST['mm'])); //23
    $params[] = trim(str_replace($bad_chars, "",$_POST['medical']));                    //24
    $params[] = trim(str_replace($bad_chars, "",$_POST['diet']));   //25
   $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_first_name']));              //26
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_last_name']));               //27
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_phone']));             //28
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_prefix_phone']));	//29
	$params[] = trim(str_replace($bad_chars, "",$_POST['phone_emergency'])); //30
	$params[] = trim(str_replace($bad_chars, "",$_POST['dd']));                   //31
    $params[] = trim(str_replace($bad_chars, "",$_POST['yyyy']));                   //32
    return $params;
    }
	
    
function store_data_in_db($params) {
	$siva="";
    $db = get_db_handle();
      $parent_id = 0;
      ## if parent exists then retrive ID
    $parent_phone=$_POST['parent_home_phone'].$_POST['parent_home_prefix_phone'].$_POST['parent_h_phone'];
   $sql = "SELECT id from parent where primary_phone='$parent_phone';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $parent_id = $row[0];
        }
        
    ## if parent doesnot exists the insert parent and reteive ID
        else{
        $parent_phone = $_POST['parent_home_phone'].$_POST['parent_home_prefix_phone'].$_POST['parent_h_phone'];
        $cell_phone = "$params[13]"."$params[14]"."$params[15]";
    $sql = "insert into parent(first_name,middle_name,last_name,address1,address2,city,state,zip,primary_phone,secondary_phone,email) ".   
"values('$params[1]','$params[2]','$params[3]','$params[5]','$params[6]','$params[7]','$params[8]','$params[9]','$parent_phone','$cell_phone','$params[16]');";
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    if($how_many == 1) echo "";
    else $siva .=  "A critical error occurred insert Parent Information Please Chek Fields.";
    $parent_id = mysqli_insert_id($db);

}
 
 ##check whether child exists..?? if yes then retrieve ID
$child_id = 0;
    $cname=$_POST['child_first_name'];
    $sql = "SELECT id from child where parent_id=$parent_id and first_name='$cname';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $child_id = $row[0];
        }


        else{
          
			$date_of_birth = "$params[23]"."/"."$params[31]"."/"."$params[32]";
			$e_phone = "$params[28]"."$params[29]"."$params[30]";
			$e_name = "$params[26]"."$params[27]";
			$sql = "insert into child(parent_id,relation,first_name,middle_name,last_name,nickname,image_filename,gender,birthdate,conditions,diet,emergency_name,emergency_phone)" . 
       "values('$parent_id','$params[4]','$params[17]','$params[18]','$params[19]','$params[20]','$params[21]','$params[22]',STR_TO_DATE('$date_of_birth','%m/%d/%Y'),'$params[24]','$params[25]','$e_name','$e_phone');";

	mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    if($how_many == 1) echo "";
    else $siva .= "A critical error occurred in child please check Image name and Fields .";
    $child_id = mysqli_insert_id($db);
        }

 $enrollment = 0;
    $program=$_POST['checkbox'];
    for($i = 0; $i < count($program); $i++) {
		$camp = intval($program[$i]);
		$child = intval($child_id);
        $sql = "insert into enrollment values('$camp','$child');";
		
     mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    if($how_many == 1) $siva = "no";
    else $siva .= "A critical error occurred in enrollment.";
        }
    
    mysqli_close($db);
	return $siva;
}

function get_current_age($dob){
	
	$birthdate = new DateTime($dob);
	$today = new Datetie();
	$age = $today -> diff($birthdate);
	return $age -> y;
	
}

?> 