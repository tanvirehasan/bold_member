<?php 
    include "../../config/conn.php";
    include "../../config/function.php";

    if (isset($_POST['new_cate'])) {
        $cat_name = $_POST['cat_name'];
        $cat_price = $_POST['cat_price'];
        $insert = "INSERT INTO `membership_category`(`cat_name`, `cat_price`) VALUES ('$cat_name','$cat_price')";
        if ($conn->query($insert) === TRUE) {
        echo "<div class='alert text-success' role='alert'>
                    Successfuly! Crate a New Category 
                </div>";
        }else{
            echo "Error: " . $insert . "<br>" . $conn->error;
        }   
    }   

    //Update
    if (isset($_POST['cate_update'])) {
        $cat_name = $_POST['cat_name'];
        $cat_price = $_POST['cat_price'];
        $cat_id = $_POST['cat_id'];
        $insert = "UPDATE `membership_category` SET `cat_name`='$cat_name', `cat_price`='$cat_price' where  cat_id='$cat_id' ";
        if ($conn->query($insert) === TRUE) {
        echo "<div class='alert text-success' role='alert'>
                    <strog>Successfuly</strog> Updated! 
                </div>";
        }else{
            echo "Error: " . $insert . "<br>" . $conn->error;
        }     
    }


    //Delete 
    if (isset($_GET['delete'])) {
        $conn->query("DELETE FROM membership_category where  cat_id='{$_GET['delete']}'");
    }

?>


<!--=============== Category View =============== -->
<?php if (isset($_GET['cat_view'])) {?>
<table class="table table-striped  table-hover">
    <tr>
        <th>#</th>
        <th>Category</th>
        <th>Price</th>
        <th>offer</th>
        <th>Action</th>
    </tr>
    <?php 
        $i=1;
        $data = SelectData('membership_category','');
        while ($row = $data->fetch_object()) {?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$row->cat_name?></td>
                <td><?=$row->cat_price?></td>
                <td><?=$row->cat_offer?></td>
                <td> 
                    <a class="link-success btn border-0" onclick="popup('view/membership/category_add_edit.php?edit=<?=$row->cat_id?>')"><i class="fas fa-edit"></i></a>
                    <a class="link-danger btn border-0" onclick="url('controller/membership/cat_sql.php?delete=<?=$row->cat_id?>')"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>            
    <?php } ?>
</table> 
<?php } ?>
