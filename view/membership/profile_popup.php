<?php
    include "../../config/conn.php";
    include "../../config/function.php";

    $data = SelectData('members',"WHERE id={$_GET['id']} ");
    $row = $data->fetch_object();
?>

<style>
b{ margin-right: 5px;}
p{margin: 0px;padding: 0px;}
</style>

<div class="modal-content p-5">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Membership: <strong> <?= ($row->membership_status==1) ? "Approved <i class='fas fa-badge-check text-success'></i>"  : "In Review <i class='fad fa-hourglass-half text-warning'></i>" ; ?> </strong> </h5>
        <div class="mess px-5"></div>
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
       <form action="" method="post" id="status">
            <select class="btn btn-success" name="membership_category">
                <option>Select</option>
                <option value="0" >Review</option>
                <?php
                $data = SelectData('membership_category',"");
                while ($cat_row = $data->fetch_object()) {?>
                    <option value="<?=$cat_row->cat_id?>" ><?=$cat_row->cat_name?></option>                   
                <?php }  ?>               
            </select>
            <input type="hidden" name="id" value="<?=$row->id?>">
            <input type="hidden" name="phone_number" value="<?=$row->phone_number?>">
            <input type="hidden" name="email" value="<?=$row->email?>">
            <input type="hidden" name="status_change" >
            <button type="submit" name="order_stutas_update" class="btn btn-success" >Approved</button>
            <a href="" class="btn btn-warning px-3" ><i class="fas fa-print"></i> Print</a>
        </form> 
      </div>
    </div>



 <script>
     //New
    $(document).ready(function(){
        $("#status").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'controller/membership/sql.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data) {
                    $(".mess").html(data);                                    
                }
            });
        }));
    });
</script>
























