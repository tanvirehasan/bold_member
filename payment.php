<?php 
    include "config/conn.php";
    include "config/function.php";

    if (isset($_GET['invoice'], $_GET['id'])) {  

    $data = SelectData('members',"INNER JOIN invoice on  members.id=invoice.member_id WHERE id={$_GET['id']} ");
    $row = $data->fetch_object();    
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
    <h1 class="p-2 h2 mt-2 text-drack text-uppercase" >invoice #<?=$_GET['invoice']?></h1>
</div>

    
        <form class="row g-3 p-5" method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10">
                    <p>Name: <?=$row->name?></p> 
                    <p>Email: <?=$row->email?></p>
                    <p>Phone No.: <?=$row->phone_number?></p>
                </div>
                <div class="col-md-2">
                    <p>Date: <?=$row->invoice_date?> </p>
                    <p>Due date: <?php echo date('d, m, Y',strtotime("$row->invoice_date". "+30day"));?> </p>
                    <p>Payment: <strong> <?=($row->payment_status==0) ? "<span class='text-danger' >Unpaid</span>" : "<span class='text-success'>Unpaid</span>" ;?></strong></p>
                </div>

                <table class=" table mt-5">
                    <thead class="bg-success">
                        <tr class="text-dark">
                            <th>#SL</th>
                            <th>Description</th>                            
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td><?=cat_name($row->member_catagory,'cat_name')?></td>
                            <td><?=$row->invoice_amount?></td>
                        </tr>

                        <tr>  
                            <td></td> 
                            <td></td> 
                            <td  colspan="3"><h5>Total = BDT <?=$row->invoice_amount?> TK</h5></td>
                        </tr>
                    </tbody>
                </table>               
            </div>  


            <div class="buttornsdfsdf text-end">
                <input class="btn btn-success px-5" name="paynnow" type="submit" value="Pay">
            </div>      
        </form>     
    </div>

    <div class="mess mt-3"></div>
</div>



<?php 


        if (isset($_POST['paynnow'])) {

            echo "Hello";

            payment(
                $row->name,
                $row->email,
                $row->address,
                $row->city,
                $row->zip,
                $row->country,
                $row->phone_number,
                $row->invoice_amount,
                $row->invoice_no

            );
        }

?>

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


<?php } ?>