<?php include_once "layout/header.php"; ?>

<div class="card bg-white">
    <h3 class="p-3 text-info"><i class="material-icons check" >groupadd</i> New Members Applications</h3>
</div>
<div class="bg-white p-5 mt-3">
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
</div>




<script type="text/javascript">
    function popup(url) {
        $.ajax({
            url: url,
            method: "POST",
            success: function(data) {
                $("#home_popup").html(data);
                $("#dataModal").modal("show");
            },
        });
    }
</script>
<!-- Modal for category -->
<div class="modal fade" id="dataModal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" id="home_popup">
    </div>
  </div>
</div>


<?php include_once "layout/footer.php"; ?>


