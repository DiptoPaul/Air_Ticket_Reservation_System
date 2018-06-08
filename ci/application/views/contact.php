<?php
if (!isset($this->session->userdata['signed']))
$this->load->view('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <style>
            ul {
                    margin : 0;
                    padding : 0;
                    overflow : hidden;
                    list-style-type : none;
                    background-color : Blue;
                    font : 17px Arial Rounded MT Bold , sans-serif;
                }

            li a {
                    float : left;
                    color : white;
                    display : block;
                    text-align : center;
                    padding : 15px 15px;
                    text-decoration : none;
                  }

            li a:hover {
                                background-color : Navy;
                            }
            h5 {
                font : Arial Black , sans-serif;
                color : White;
                 }
        </style>
        <script>
            $(document).ready(function() {
                      $('.parallax').parallax();
            });
        </script>
    </head>
    <body class = "amber-text text-accent-4">
        <ul>
            <li><a href="<?php echo site_url('auth/show') ?>">View Profile</a></li>
            <li><a href="<?php echo site_url('auth/edit') ?>">Edit Profile</a></li>
            <li><a href="<?php echo site_url('auth/book') ?>">Book Flight</a></li>
            <li><a href="<?php echo site_url('auth/contact') ?>">Contact Us</a></li>
            <li style="float:right"><a href="<?php echo site_url('auth/logout') ?>">Log Out</a></li>
            <li style="float:right"><a href="#"><?php echo "Signed In As : ".$this->session->userdata['signed']['Name'] ?></a></li>
        </ul>
        <div class="parallax-container">
            <div class="parallax"><img src="https://i.pinimg.com/originals/3b/2a/c1/3b2ac1b813b5cfd93c89906f1e2edb4b.jpg"></div>
        </div>
        <div class="section white">
            <div class="row container">
                <h2 class = "deep-orange-text">Contact Us</h2>
                <p>102, Sunset Bridge</p>
                <p>Toronto, Ontario</p>
                <p>Canada</p>
            </div>
        </div>
        <div class="parallax-container">
            <div class="parallax"><img src="https://www.desibucket.com/wp-content/uploads/2017/01/Autumn-Image-1.jpg"></div>
        </div>
    </body>
</html>