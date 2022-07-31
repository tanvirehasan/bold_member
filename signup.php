<?php 
    include "config/conn.php";
    include "config/function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BOLD - New Membership</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="shortcut icon" href="uploads/brand/logo.png" />
  <link href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">

<div class="bg-white pt-0">

<div class="from_header text-center bg-light p-5">
    <img src="uploads/brand/logo.png" alt="" >
    <h1 class="p-2 h2 mt-2 text-drack text-uppercase" >MEMBERSHIP APPLICATION</h1>
</div>

    
        <form class="row g-3 p-5" method="post" id="newmember" name="newmember" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label" id="name">Name </label>
                <input type="text" name="name" class="form-control" require>
            </div>
            <div class="col-md-6">
                <label for="phone_number" class="form-label">Phone Number <span id="phone_number_check"></span> </label>
                <input type="text" onkeyup="phone_number_check(this.value)" name="phone_number" class="form-control" id="phone_number">                
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email <span id="email_mess" ></span></label>
                <input type="text" name="email" class="form-control" onkeyup="Emailid_check(this.value)" >
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password <span id="password"></span></label>
                <input type="password" name="password" class="form-control" id="inputPassword4">
            </div>

            <div class="col-md-6">
                <label for="Dateofbirth" class="form-label">Date of birth <span id="date_of_birth"></span></label>
                <input type="date" name="date_of_birth" class="form-control" id="Dateofbirth">
            </div>
            <div class="col-md-6">
                <label for="profile" class="form-label">Profile Link <span id="profile_url"></span></label>
                <input type="text" name="profile_url" class="form-control" id="profile" placeholder="Facebook/Linkedin/Twitter..">
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Address <span id="address"></span></label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Country <span id="country"></span></label>
                <select id="inputState" name="country" class="form-select" id="inputCity">
                        <option>Choose...</option>

                    <?php 
                        $select = SelectData('country','');
                        while ($data = $select->fetch_object()) {?>
                           <option value="<?=$data->nicename?>"><?=$data->nicename?></option>
                        <?php } ?>                   
                </select>

            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">City <span id="city"></span></label>
                <input type="text" id="inputState" name="city" class="form-control"> 
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip <span id="zip"></span></label>
                <input type="text" name="zip" class="form-control" id="inputZip">
            </div>

            <label for="" class="px-2 p-0 m-0 mt-5 mb-3 fw-bold ">Job/Career* <hr class=" p-0 m-0"></label>



            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Experiences <span id="experiences"></span></label>
                <input type="text" name="experiences" class="form-control" id="inputEmail4" placeholder="Your Total Job/Career Experiences Years & Months Ex:(5 Y, 10 M)">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Organization <span id="organization"></span></label>
                <input type="text" name="organization" class="form-control" id="inputEmail4" placeholder="Current Organization">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Position/Designation <span id="position_designation"></span></label>
                <input type="text" name="position_designation" class="form-control" id="inputEmail4" placeholder="Your Current Position/Designation">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Reference</label>
                <input type="text" class="form-control" id="inputEmail4" name="reference" placeholder="Reference (if any; write his or her name):">
            </div>

            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">About Your Self <span id="abnout_self"></span></label>
                <textarea class="form-control" name="abnout_self" id="" cols="30" rows="10">Your profile ( please write a paragraph about yourself not exceeding 100 words):
                </textarea>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Your Photo <span id="profile_photo"></span></label>
                    <input class="form-control" name="profile_photo" type="file" id="formFile">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Your CV <span id="cv"></span></label>
                    <input class="form-control" name="cv" type="file" id="formFile">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Your signature(if available)</label>
                    <input class="form-control" name="signature" type="file" id="formFile">
                </div>
            </div>


            <hr class="p-0 mt-5">
            <div class="col-md-6 col-12 px-3">
                <div class="form-check">
                <input class="form-check-input" name="terms_conditins" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Accept the <a href=""> Terms</a> & <a href=""> Conditions</a>. 
                </label>
                </div>
            </div>


            <div class="col-md-6 col-12 text-end  px-3">       
                <img class="loding" style="display:none;" src="uploads/brand/loding.gif" >
                <img class="loding me-5" style="display:none;"  src="uploads/brand/lodingg.gif" height="30">
                <input type="hidden" name="New_Member">        
                <button type="submit" id="usersave"  class="col-md-4 col-12 btn btn-success p-2 px-5">Submit</button>
            </div>

        </form>     
    </div>

    <div class="mess mt-3"></div>
</div>



  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assets/vendors/chartjs/Chart.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/material.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script src="assets/js/membership.js"></script>

</body>
</html> 