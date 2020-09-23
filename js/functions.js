$('document').ready(function(){

    check_user();

    // Refresh every 2 seconds 
    setInterval(function(){
        update_last_activity();
        check_user();
        fetch_group_history();
    }, 5000);
    
    //Check if user is logged in 
    function check_user() {
        $.ajax({
            url:"../inc/check_user.php",
            method:"POST",
            success:function(data){
                $('#user_details').html(data);
            }
        });
    }

    // Update when user last logged in
    function update_last_activity() {
        $.ajax({
            url:'../inc/last_activity.php',
            success:function() {

            }
        });
    }

    // Send message in global chat with Button
    $('#send').click(function(){
        var chat_message = $('#group_chat').val();
        var action = 'insert_data';
        if(chat_message != '') {
            $.ajax({
                url:"../inc/group_chat.php",
                method:"POST",
                data:{chat_message:chat_message, action:action},
                success:function(data){
                    $('#group_chat').val('');
                    $('#chat_history').html(data);
                }
            });
        }else {
            $('#group_chat').attr('placeholder', 'You need to type any message');
        }
    });

    // Send message in global chat with Enter
    $('#group_chat').on('keypress', function(e){
        var chat_message = $('#group_chat').val();
        var action = 'insert_data';
        if(chat_message != '' && e.which == 13) {
            $.ajax({
                url:"../inc/group_chat.php",
                method:"POST",
                data:{chat_message:chat_message, action:action},
                success:function(data){
                    $('#group_chat').val('');
                    $('#chat_history').html(data);
                }
            });
        }else {
            $('#group_chat').attr('placeholder', 'You need to type any message');
        }
    });

    //Refrech group history chat
    function fetch_group_history() {
        var action = 'fetch_data';
        $.ajax({
            url:"../inc/group_chat.php",
            method:'POST',
            data:{action:action},
            success:function(data){
                $('#chat_history').html(data);
            }
        });
    }
});