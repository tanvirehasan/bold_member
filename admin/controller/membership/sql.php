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


if (isset($_POST['status_change'])) {
   
    $id=$_POST['id'];
    $email=$_POST['email']; 
    $status = ($_POST['membership_category']==0) ? '0' : '1' ;
    $membership_category=$_POST['membership_category'];
    $membership_id = date('my').rand(0,9999);

    $insert = "UPDATE `members` SET `membership_id`='$membership_id', `membership_category`='$membership_category', `membership_status`='$status' where  id='$id' ";
        if ($conn->query($insert) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>
                    <strog>Successfuly</strog> Updated! 
                </div>";
            if ($status==1) {
              SMS_API($_POST['phone_number'], "Congratulations! Your application has been approved as a ".cat_name($membership_category,'cat_name').". Please check your email for further procedure. Thanks-BOLD");

                //invoice Crate
                $invoice_no = "B".date('my').rand(0,9999);
                $invoice_date =date('M d,Y');
                $invoice_amount = cat_name($membership_category,'cat_price');
                InsertData("invoice", "invoice_no, invoice_date, invoice_amount,member_id, member_catagory", "'$invoice_no', NOW(),'$invoice_amount', '$membership_id', $membership_category");   
                email_send(
                            'BOLD - Congratulations! Your application has been approved',
                            "<span style='color:#239B56' >Congratulations!</span>",
                            "Congratulations! Your application has been approved as a <b>".cat_name($membership_category,'cat_name')."</b>
                            Please click the link for your payment : http://member.bold.org.bd/payment.php?invoice=".$invoice_no."&id=".$membership_id." 
                            <br/>Thanks-BOLD",
                            "$email"
                        );           
            }

        }else{
            echo "Error: " . $insert . "<br>" . $conn->error;
        }    

}

?>


<?php 
if (isset($_GET['listview'])) {?> 
<table class="table table-striped  table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No.</th>
            <th>Organization</th>
            <th>Designation</th>
            <th>Application Status</th>
        </tr>
        <?php 
            $i=1;
            $data = SelectData('members','');
            while ($row = $data->fetch_object()) {?>
                <tr onclick="popup('view/membership/profile_popup.php?id=<?=$row->id?>')" >
                    <td><?=$i++?></td>
                    <td><strong><?=$row->name?></strong></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->phone_number?></td>
                    <td><?=$row->organization?></td>
                    <td><?=$row->position_designation?></td>
                    <td>
                        <?= ($row->membership_status==1) ? "Approved <i class='fas fa-badge-check text-success'></i>"  : "In Review <i class='fad fa-hourglass-half text-warning'></i>" ; ?> 
                    </td>
                </tr>            
        <?php } ?>
    </table> 
<?php } ?>