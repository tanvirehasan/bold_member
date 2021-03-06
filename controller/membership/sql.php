<?php
    include "../../config/conn.php";
    include "../../config/function.php";

//Phone Number Check
if (isset($_POST['phonenumber_check'])) {
    if (SelectData('members',"where phone_number={$_POST['phonenumber_check']}")->num_rows>0) {
       echo 1;
    }else {echo 0;}
}

//Email Check
if (isset($_POST['email_id'])) {
    if (SelectData('members',"where email='{$_POST['email_id']}'")->num_rows>0) {
       echo 1;
    }else {
        echo 0;    
    }

}


//New_Member
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


    if (empty($name)) {

        echo "sorry please try agin";
       
    }else{

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
                        <?php 
                            SMS_API("$phone_number", "Congratulations! ".$name.", Your Application Successfully Submitted. Please check your email. Thanks-BOLD");
                            email_send(
                                'Congratulations!BOLD Membership Application Submited',
                                "<span style='color:#239B56' >Congratulations!</span>",
                                'Dear'.$name.', <br>Your application Successfuly submited to review. we are very short time get back within 7 days',
                                "$email"
                            );                                       
                        ?>
                    </div>
                </div>                     
        <?php }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

?>
