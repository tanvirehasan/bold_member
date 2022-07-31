<?php
    include "config/conn.php";
    include "config/function.php";

    $data = SelectData('members',"WHERE id={$_GET['id']} ");
    $row = $data->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 

</head>
<body>



<div class="modal-content p-5">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <img src="uploads/member/profile_pic/<?=$row->profile_photo?>" alt="" style="width:100%;">
            </div>
            <div class="col-md-9 d-flex align-items-end">
                <div class="profile">
                    <h3><?=$row->name?></h3>
                    <h6><?=$row->position_designation?>, <?=$row->organization?></h6>
                    <p><i class="far fa-phone-alt"></i> <?=$row->phone_number?></p>
                    <p><i class="far fa-envelope"></i> <?=$row->email?></p>
                </div>
            </div>

            <div class="col-md-12 py-5">
                <p class="mb-4"><?=$row->abnout_self?></p>

                <b class="m-0 p-0">Info</b>
                <hr class="m-0 p-0 mb-3" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="lines"><b>Birthday:</b><p><?= date('M d, Y', strtotime($row->date_of_birth)) ?></p></div>
                        <div class="lines"><b>Age:</b><p>30  Years</p></div>
                        <div class="lines"><b>Residence:</b><p><?=$row->country?></p></div>
                        <div class="lines"><b>Address:</b><p><?=$row->address?></p></div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="lines"><b>E-mail:</b><p><?=$row->email?></p></div>
                        <div class="lines"><b>Phone:</b><p><?=$row->phone_number?></p></div>
                        <div class="lines"><b>Socal Media:</b><p><?=$row->profile_url?></p></div>
                        <div class="lines"><b>Resume:</b><p> <a href="uploads/member/doc/<?=$row->cv?>" target="_blank"><?=$row->cv?></a> </p></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">

       <form action="" method="post">
            <select class="btn btn-success" name="status">
            <option>Select</option>
            <option>Fellow</option>
            <option>Profesional</option>
            <option>Student</option>
            </select>
            <input type="hidden" name="order_id" value="<>">
            <input type="hidden" name="Customer_ID" value="">
            <button type="submit" name="order_stutas_update" class="btn btn-success" >Submit</button>
            <a href="" class="btn btn-warning px-3" ><i class="fas fa-print"></i> Print</a>
        </form>  
      </div>
    </div>



<table style="width:100%">
  <tr></tr>
    <td style="width:200px">
        <img src="uploads/member/profile_pic/<?=$row->profile_photo?>" style="width:200px">
    </td>
    <td >
        <h3><?=$row->name?></h3>
        <h6><?=$row->position_designation?>, <?=$row->organization?></h6>
        <p><i class="far fa-phone-alt"></i> <?=$row->phone_number?></p>
        <p><i class="far fa-envelope"></i> <?=$row->email?></p>
    </td>
  </tr>
  <tr>
    <td colspan="2" ><p class="mb-4"><?=$row->abnout_self?></p></td>
  </tr>
  <tr>
      <td>Birthday: <?= date('M d, Y', strtotime($row->date_of_birth)) ?></td>
  </tr>



</table>


<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

h3,h5,h6,p,b{
    margin: 0px;
    padding: 0px;
}



</style>



    
</body>
</html>






