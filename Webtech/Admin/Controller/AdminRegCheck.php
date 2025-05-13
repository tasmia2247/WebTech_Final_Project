<?php
 include('../Model/adminListModel.php');

 if(isset($_REQUEST['mydata'])){

        $json = $_REQUEST['mydata'];
        $NewAdmin = json_decode($json);
        if($NewAdmin == null){
            echo "Failed to json Decode";
        }

        $username  =  $NewAdmin ->username;
        $password  =  $NewAdmin ->password;
        $email  =  $NewAdmin ->email;
        $fullname = $NewAdmin ->fullname;
        $dob= $NewAdmin ->dob;
        $mobileno = $NewAdmin ->mobileno;
        $id = $NewAdmin ->id;
        $gender =$NewAdmin ->gender;

        $emailcheck = getUserbyemail($email);
        $mobilecheck = getUserbymobile($mobileno);
        $usernameCheck2 = getUser($username);
        $idCheck = getUserbyID($id);

        if( empty($username) || empty($password) || empty($email) || empty($fullname) || empty($dob) || 
        empty($mobileno) || empty($id) || empty($gender)){
            echo "Null data found!";
         }

        else if($usernameCheck2 != null ){
           echo "Username already in database,change username";
        }
        elseif($idCheck != null){
          echo "id already in database,change id";
        }
        elseif($emailcheck != null){
            echo "Email is already taken,try with new one";
        }
        elseif($mobilecheck != null){
            echo "Mobile Number is Already Taken,try with new one";
        }
        else {
            $status = addUser($username, $password, $email , $fullname , $dob , $mobileno , $id , $gender);
            if($status){
                echo "Admin Create Succesful";
            }else{
               echo "Error ";
            }
        }
    }else{
       echo "ERROR HAPPEND";
    }
    ?>