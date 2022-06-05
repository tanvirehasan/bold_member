<?php include_once "layout/header.php"; ?>

<div class="row bg-white mx-0 py-2">
    <div class="col-md-6">       
        <span class="h4 text-uppercase text-success">Categorys</span>   
    </div>
        <div class="col-md-6 text-end">       
        <span class="btn text-danger" onclick="popup('view/membership/category_add_edit.php?new')"  ><b>New+</b></span>        
    </div>
    
</div>

<div class="bg-white p-5 mt-3" id="category_list">
     
</div>

<!-- Categorys load -->
<script>
    //url
    function url(link){
        $.ajax({
            url: link,
            method: "POST"
         });
    }

    //popup
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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="home_popup">
    </div>
  </div>
</div>



<script>
    setInterval(function(){
        $("#category_list").load('controller/membership/cat_sql.php?cat_view')
    }, 1000);
</script>
<?php include_once "layout/footer.php"; ?>


