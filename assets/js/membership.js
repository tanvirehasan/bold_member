
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

    if (email_id.length > 4) {          
        $.ajax({
            type: 'POST',
            url: 'controller/membership/sql.php',
            data:{email_id:email_id},
            success: function(data) { 

                $("#email_mess").html(data);
                if (data==1) {
                    $("#email_mess").html("<span class='text-danger'> : This number already exists <i class='fas fa-do-not-enter'></i> </span>");                       
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

        $(".loding").show();
        $("#usersave").html('Please wait..');
        $("#usersave").attr("disabled","disabled");

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