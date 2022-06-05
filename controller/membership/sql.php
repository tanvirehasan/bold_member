<?php

include "../../config/conn.php";
include "../../config/function.php";


if (isset($_POST['New_Member'])) {


    $name                   = $_POST['name'];
    $phone_number           = $_POST['phone_number'];
    $email                  = $_POST['email'];
    $password               = $_POST['password'];
    $date_of_birth          = $_POST['date_of_birth'];
    $profile_url            = $_POST['profile_url'];
    $address                = $_POST['address'];
    $country                = $_POST['country'];
    $city                   = $_POST['city'];
    $zip                    = $_POST['zip'];
    $experiences            = $_POST['experiences'];
    $organization           = $_POST['organization'];
    $position_designation   = $_POST['position_designation'];
    $reference              = $_POST['reference'];
    $abnout_self            = htmlspecialchars($_POST['abnout_self']);
    $terms_conditins        = (isset($_POST['terms_conditins'])) ? 1 : 0 ;

    //File
    $profile_photo          = $_FILES['profile_photo']['name'];
    $cv                     = $_FILES['cv']['name'];
    $signature              = $_FILES['signature']['name'];


    $profile_pic_dir = "../../uploads/member/profile_pic/";
    $doc_dir = "../../uploads/member/doc/";

    $profile_target_dir = $profile_pic_dir . basename($_FILES["profile_photo"]["name"]);
    $doc_target_file = $doc_dir . basename($_FILES["cv"]["name"]);
    $signature_target_file = $doc_dir . basename($_FILES["signature"]["name"]);

    if ($_FILES["profile_photo"]["size"] > 500000 OR $_FILES["cv"]["size"] > 500000 OR $_FILES["signature"]["size"] > 500000  ) {
         
        echo "Sorry, your file is too large.";
    }else{
        move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $profile_target_dir);
        move_uploaded_file($_FILES["cv"]["tmp_name"],$doc_target_file);
        move_uploaded_file($_FILES["signature"]["tmp_name"],$signature_target_file);
   
    $sql = "INSERT INTO `members`(
                        `name`,
                        `phone_number`,
                        `email`,
                        `password`,
                        `date_of_birth`,
                        `profile_url`,
                        `address`,
                        `country`,
                        `city`,
                        `zip`,
                        `experiences`,
                        `organization`,
                        `position_designation`,
                        `reference`,
                        `abnout_self`,
                        `profile_photo`,
                        `cv`,
                        `signature`,
                        `terms_conditins`
                    )
                    VALUES(
                        
                        '$name',
                        '$phone_number',
                        '$email',
                        '$password',
                        '$date_of_birth',
                        '$profile_url',
                        '$address',
                        '$country',
                        '$city',
                        '$zip',
                        '$experiences',
                        '$organization',
                        '$position_designation',
                        '$reference',
                        '$abnout_self',
                        '$profile_photo',
                        '$cv',
                        '$signature',
                        '$terms_conditins'                                           

                    )";

        if ($conn->query($sql) === TRUE) {?>

            <div class="successpage d-flex align-items-center justify-content-center ">
                <div class="text-center">
                    <h1><i class="material-icons check" >check</i></h1>
                    <h2>Thank You!</h2>
                    <h4>Your Application Successfully Submitted</h4>
                    <a href="index.php">Click Here</a>
                </div>
            </div>
                     
       <?php }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


if (isset($_POST['status_change'])) {
   
    $id=$_POST['id'];
    $status = ($_POST['membership_category']==0) ? '0' : '1' ;
    $membership_category=$_POST['membership_category'];

    $insert = "UPDATE `members` SET `membership_category`='$membership_category', `membership_status`='$status' where  id='$id' ";
        if ($conn->query($insert) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>
                    <strog>Successfuly</strog> Updated! 
                </div>";
            if ($status==1) {
               SMS_API($_POST['phone_number'], "Contractions! Your application has been approved. Please check your email. Thanks-BOLD");
            }

        }else{
            echo "Error: " . $insert . "<br>" . $conn->error;
        }     


}




















?>