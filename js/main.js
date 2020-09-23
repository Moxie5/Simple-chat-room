$('document').ready(function(){

/* =====================
Check form / Submit Registration form 
======================== */

    $('#signup').click(function(e){
        e.preventDefault();
        if ($("#username").val() == "" || $("#password").val() == "" || $("#repassword").val() == "" || $("#email").val() == "") {
            $('#signup-form input').addClass('placeholder');
            $("#username").attr('placeholder', 'Field is required!');
            $("#password").attr('placeholder', 'Field is required!');
            $("#repassword").attr('placeholder', 'Field is required!');
            $("#email").attr('placeholder', 'Field is required!');
            return false;
        }else if($("#password").val() != $("#repassword").val()){
            $('.alert').html('Passwords do not match!');
        }else{
            $.ajax({ 
                type: "POST",
                url: "inc/signup.inc.php",
                data: $('#signup-form').serialize(),
                success: function (data) {
                    $(".alert").html(data);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            }); 
        }
    });

/* =====================
Login Form
======================== */
    $('#login').click(function(){
        if ($("#loginname").val() == "" || $("#loginpassword").val() == "") {
            $('#login-form input').addClass('placeholder');
            $("#loginname").attr('placeholder', 'Field is required!');
            $("#loginpassword").attr('placeholder', 'Field is required!');
            return false;
        }
    });

/* =====================
Show Chat History
======================== */
    $('.show-chat-history').on('click', function() {
        $( function() {
            $( "#modal-show-history" ).dialog({
                height: 400,
                minHeight: 400,
                width: "40%",
                overflowY: "auto"
            });
          });
        var action = 'fetch_data';
        $.ajax({
            url:"../inc/display.php",
            method:'POST',
            data:{action:action},
            success:function(data){
                $('#modal-show-history').html(data);
            }
        });
    });
/* =====================
Private chat
======================== */
   
});