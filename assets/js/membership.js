
//Phone Number Check
function phone_number_check(phone_number) {

    $("#phone_number_check").html("<span class='text-info'> checking... <i class='fas fa-search'></i> </span>");
    if (phone_number.length == 11) {          
        $.ajax({
            type: 'POST',
            url: 'controller/membership/sql.php',
            data:{phonenumber_check:phone_number},
            success: function(data) {               
                if (data==1) {
                    $("#phone_number_check").html("<span class='text-danger'> : This number already exists <i class='fas fa-do-not-enter'></i> </span>");                       
                }else{
                    $("#phone_number_check").html("<span class='text-success'> <i class='fas fas fa-check'></i> </span>");
                    $("#usersave").attr('disabled', false);
                }
            }
        });
    }else{
        $("#usersave").attr("disabled","disabled");
    }
}


//Email ID Check
function Emailid_check(email_id) {   
    $("#email_mess").html("<span class='text-info'> checking... <i class='fas fa-search'></i> </span>");
    var xemail=document.newmember.email.value;  
    var atposition= xemail.indexOf("@");  
    var dotposition=xemail.lastIndexOf("."); 
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=xemail.length){  
        $("#email_mess").html("<span class='text-info'> Please enter a valid e-mail address <i class='fas fa-search'></i> </span>");
        return false;  
  }  

    if (email_id.length > 4) {          
        $.ajax({
            type: 'POST',
            url: 'controller/membership/sql.php',
            data:{email_id:email_id},
            success: function(data) { 

                $("#email_mess").html(data);
                if (data==1) {
                    $("#email_mess").html("<span class='text-danger'> : This email already exist <i class='fas fa-do-not-enter'></i> </span>");                       
                }else{
                    $("#email_mess").html("<span class='text-success'> <i class='fas fas fa-check'></i> </span>");
                    $("#usersave").attr('disabled', false);
                }
            }
        });
    }else{
        $("#usersave").attr("disabled","disabled");
    }
}


//form Submit
$(document).ready(function(){
    $("#newmember").on('submit',(function(e) {
        if (document.newmember.name.value == "") {$("#name").html("<span class='text-danger'>Name must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.phone_number.value == "") {$("#phone_number_check").html("<span class='text-danger'>phone number must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.email.value == "") {$("#email_mess").html("<span class='text-danger'>email must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.password.value == "") {$("#password").html("<span class='text-danger'>password must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.date_of_birth.value == "") {$("#date_of_birth").html("<span class='text-danger'>Date of birth must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.profile_url.value == "") {$("#profile_url").html("<span class='text-danger'>Profile link must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.address.value == "") {$("#address").html("<span class='text-danger'>Address must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.city.value == "") {$("#city").html("<span class='text-danger'>City must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.zip.value == "") {$("#zip").html("<span class='text-danger'>zip must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.experiences.value == "") {$("#experiences").html("<span class='text-danger'>experiences must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.position_designation.value == "") {$("#position_designation").html("<span class='text-danger'>position/designation must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.abnout_self.value == "") {$("#abnout_self").html("<span class='text-danger'>abnout_self must be filled out <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.cv.value == "") {$("#cv").html("<span class='text-danger'>cv must be Upload <i class='fas fa-do-not-enter'></i> </span>");return false;}
        else if (document.newmember.profile_photo.value == "") {$("#profile_photo").html("<span class='text-danger'>profile_photo must be Upload <i class='fas fa-do-not-enter'></i> </span>");return false;}
     
        else{
            $(".loding").show();
            $("#usersave").html('Please wait..');
            $("#usersave").attr("disabled","disabled");     

            // e.preventDefault();
            // $.ajax({
            //     type: 'POST',
            //     url: 'controller/membership/sql.php',
            //     data: new FormData(this),
            //     contentType: false,
            //     cache: false,
            //     processData:false,
            //     success: function(data) {
            //         $(".mess").html(data);
            //     }
            // });
        }

    }));
});