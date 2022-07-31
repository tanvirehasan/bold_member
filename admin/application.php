<?php include_once "layout/header.php"; ?>

<div class="card bg-white">
    <h3 class="p-3 text-info"><i class="material-icons check" >groupadd</i> New Members Applications</h3>
</div>

<div class="bg-white p-5 mt-3" id="application_list">    
</div>




<script type="text/javascript">

    setInterval(function(){
        $("#application_list").load('controller/membership/sql.php?listview')
    }, 1000);


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


