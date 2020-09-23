<?php
session_start();

ini_set('display_errors', 'On');
require_once ('inc/db.inc.php');
    if(isset($_GET['error'])){
        $error = $_GET['error'];
    }else {
        $error = '';
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $file = "inc/".$page.".php";
        if (file_exists($file)) {
            require_once $file;
        }else {
            echo "No page Found";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/animation.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Chat Room</title>
</head>
<body>
    <div id="main">
        <div id="top-bar">
            <div class="container">
                <div class="row justify-between">
                    <div class="logo"> Chat Room </div>
                    <form action="inc/login.inc.php" method="post" id="login-form">
                        <span><?php if ($error == 'nouser') {echo 'Email not found';}elseif($error == 'badpwd') {echo 'Bad password';}?></span>
                        <input type="text" name="username" placeholder="Email" id="loginname">
                        <input type="password" name="password" placeholder="Password" id="loginpassword">
                        <button type="submit" class="btn" name="login" id="login">Login</button>
                        <span>Forgot password?</span>
                        <span>Registration</span>
                    </form>
                </div>
            </div>
        </div><!-- End of #top-bar -->
        <div id="registar">
            <div class="container">
                <div class="row justify-between">
                    <div class="caption col">
                        <h3>Chat with friends</h3>
                        <p>Test login</p>
                        <p>Username: user@mail.com, password: 1234</p>
                        <p>Username: user1@mail.com, password: 1234</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut recusandae error totam distinctio qui repudiandae voluptate,
                         corporis magnam labore quas nam, natus blanditiis hic eaque at nesciunt, quia deleniti aliquam.</p>
                         <p><i class="fas fa-users"></i> Group Chat</p>
                         <p><i class="fas fa-user-friends"></i> Private Chat</p>
                         <p><i class="far fa-comment-dots"></i> Global Chat</p>
                        </div><!-- End of .caption --> 
                    <form name="signup_form" method="post" id="signup-form" class="col">
                        <h4>Don't Have an Account?</h4>
                        <span class="alert"></span>
                        <input type="text" name="username" placeholder="UserName" id="username">
                        <input type="password" name="password" placeholder="Password" id="password">
                        <input type="password" name="repassword" placeholder="Repassword" id="repassword">
                        <input type="email" name="email" placeholder="Email" id="email">
                        <span id="terms">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</span>
                        <button class="btn" name="reg" id="signup">Sign up</button>
                    </form>
                </div>
            </div>
        </div><!-- End of #registar -->
        <div class="social">
            <div class="container">
                <div class="row justify-center">
                    <div>
                        <h1>Share with your friends</h1>
                        <span><a href="#"><i class="fab fa-facebook-f"></i></a></span>
                        <span><a href="#"><i class="fab fa-instagram"></i></a></span>
                        <span><a href="#"><i class="fab fa-twitter"></i></a></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam magnam atque, voluptas sequi sunt voluptatem, ullam quisquam architecto,
                     temporibus vel illum tempore fuga natus veritatis odio reprehenderit reiciendis nesciunt sapiente.Nam tempore accusamus earum id. 
                     Rem quod vel ea necessitatibus. Corrupti nisi quos quas, nam molestiae praesentium pariatur voluptatibus ducimus facilis suscipit nesciunt magnam est dolorum maxime dolorem? Eius, dolorem.</p>
                </div>
            </div><!-- End of .social -->
        </div>
    </div><!-- End of #main -->
    
    <footer>
        <div class="site-info">
            Copyright Chat Room &copy; All right reserved | Dobromir Dobrev
        </div><!-- End of .site-info -->
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>
    <script src="js/main.js"></script>
</body>
</html>