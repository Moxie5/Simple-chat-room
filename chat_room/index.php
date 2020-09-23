<?php
session_start();
ini_set('display_errors', 'On');
require_once ('../inc/db.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/animation.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Chat Room</title>
</head>
<body>
    <div id="main">
        <div id="top-bar">
            <div class="full-width">
                <div class="row justify-between">
                    <div class="logo">Chat room</div>
                    <?php if(isset($_SESSION['id'])) { ?>
                        <div class="logout">
                            <form action='../inc/logout.inc.php' method='post' id='logout-form'>
                                <?php echo "Logged in as: ".$_SESSION['name'];?>
                                <button type='submit' name='logout' class="btn"><i class='fas fa-sign-out-alt'></i> Logout</button>
                            </form>
                        </div>
                    <?php }else { echo "<span id='chat_error'>You need to login</span>"; } ?>
                </div>
            </div>
        </div><!-- End of #top-bar -->
        <div class="full-width">
            <div class="chat-room row">
                <div class="global-chat">
                    <div class="show-chat-history">Show chat history</div>
                    <div class="messages" id="chat_history"> 
                        <!-- .message --> 
                    </div><!-- End of .messages -->
                    <div class="message-box">
                        <input name="text" id="group_chat" >
                        <button type='button' name='send' class="btn" id="send"><i class="far fa-paper-plane"></i> Send</button>
                    </div><!-- End of .message-box -->
                </div><!-- End of .global-chat -->
                <div class="members">
                    <span id="user_details"></span>
                </div><!-- End of .members -->
            </div>
        </div>
    </div><!-- End of #main -->
    <div id="modal-show-history" title="Chat history">
        
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/wow.min.js"></script>
    <script> new WOW().init(); </script>
    <script src="../js/main.js"></script>
    <script src="../js/functions.js"></script>
</body>
</html>