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
        </tr>
        <?php 
            $i=1;
            $data = SelectData('members','');
            while ($row = $data->fetch_object()) {?>
                <tr >
                    <td><?=$i++?></td>
                    <td><?=$row->name?></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->phone_number?></td>
                    <td><?=$row->organization?></td>
                    <td><?=$row->position_designation?></td>
                </tr>            
        <?php } ?>
    </table>      
</div>

<section class="bg-white p-5 mt-5">
<div class="row">
    <div class="col-12">
        <h4 class="fw-bold text-uppercase py-3 bg-success">Profile</h4>
    </div>

    <div class="col-md-2">
        <img src="uploads/member/profile_pic/profile.jfif" alt="" style="width:100%;">
    </div>
    <div class="col-md-6 d-flex align-items-end">
        <div class="profile">
            <h1>Md Tanvir Hasan</h1>
            <h4>Founder & CEO, dotOrbit</h4>
            <p class="p-0 m-0"><i class="material-icons p-0 m-0" >phone</i> tanvir@gmail.com</p>
            <p class="p-0 m-0"><i class="material-icons p-0 m-0" >email</i> +018436405147</p>
        </div>
    </div>

    <div class="col-md-6 py-5">
        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.

        I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.
        </p>

        <b class="m-0 p-0">Info</b>
        <hr class="m-0 p-0" >

        <div class="row">
            <div class="col-md-6">
                <div class="lines"><b>Birthday</b> : <p>4th april 1998</p></div>
                <div class="lines"><b>Age</b> : <p>30  Years</p></div>

            </div>
            <div class="col-md-6"></div>
        </div>


    </div>






</div>
</section>





<?php include_once "layout/footer.php"; ?>
