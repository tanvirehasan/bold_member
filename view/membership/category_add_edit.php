<?php 
    include "../../config/conn.php";
    include "../../config/function.php";
?>

<!--=============== New Category =============== -->
<?php if (isset($_GET['new'])) {?>
<div class="modal-content p-3">
    <form  method="post" id="cate">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">New category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>   
    <div class="modal-body">        
        <label for="cat_name" class="form-label">Catagory Name</label>
        <input type="text" name="cat_name" class="form-control">
        <!-- fee  -->
        <label for="cat_price" class="form-label mt-3">Fee</label>
        <input type="text" name="cat_price" class="form-control">
        <input type="hidden" name="new_cate"> 
        <div class="mess"></div>
    </div>
    <div class="modal-footer">        
        <button type="submit"  class="btn btn-success px-3">Submit</button> 
    </div>  
    </form>   
</div>        
<?php } ?>  


<!--=============== New Edit =============== -->
<?php if (isset($_GET['edit'])) {
    $data = SelectData('membership_category',"WHERE cat_id={$_GET['edit']} ");
    $row = $data->fetch_object();       
?>
<div class="modal-content p-3">
    <form  method="post" id="cate">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Edit category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>   
    <div class="modal-body">        
        <label for="cat_name" class="form-label">Catagory Name</label>
        <input type="text" name="cat_name" value="<?=$row->cat_name?>" class="form-control">
        <!-- fee  -->
        <label for="cat_price" class="form-label mt-3">Fee</label>
        <input type="text" name="cat_price" value="<?=$row->cat_price?>"  class="form-control">
        <input type="hidden" name="cat_id" value="<?=$_GET['edit']?>"> 
        <input type="hidden" name="cate_update"> 
        <div class="mess"></div>
    </div>
    <div class="modal-footer">        
        <button type="submit"  class="btn btn-success px-3">Submit</button> 
    </div>  
    </form>   
</div>        
<?php } ?> 


 <script>

     //New
    $(document).ready(function(){
        $("#cate").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'controller/membership/cat_sql.php',
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