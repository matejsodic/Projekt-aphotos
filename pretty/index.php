<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  # Start session
    session_start();
  
  # Database connection
  include "dbconn.php";

  if(!isset($_GET['menu'])) { 
    $_GET['menu'] =  1; 
    $menu = (int)$_GET['menu']; 
  }
  if(!isset($_GET['id']))   { 
    $_GET['id'] =  1; 
    $id = (int)$_GET['id']; 
  }
  if(!isset($_GET['edit'])) {
    $_GET['edit'] =  1; 
    $edit = (int)$_GET['edit']; 
  }
  
  # Variables MUST BE STRINGS A-Z
    if(!isset($_POST['action']))  { $_POST['action'] = 'FALSE';  }
  ?>
  
<!DOCTYPE html>
<html>
    <head>
        <title>Amazing photos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    </head>

    <body>
          <header id="banner">
            <div class="inner">
                <a href="index.php"><h1>AMAZING PHOTOS</h1></a>

				        <div class="nav">
					         <?php 
                    include "menu.php"; 
                    ?>
                </div>
            </div>
          <div class="newsletterwrapper">
               <div class="newsletter">
                    <form action="#" method="post">
                        <h2>Sign Up To Our Newsletter</h2>
                        <input id="email" type="email" name="newsletter" placeholder="Enter your e-mail address">
                        <input type="submit" id="submit" value="Sign Up" />
                        <p>Get weekly updates directly into your inbox</p>
                    </form>
                </div>
            </div>
         </header>
           <?php
              if ($_GET['menu'] == 1){
                include "content.php";
              }
              else if ($_GET['menu'] == 3){
                include "contact.php";
              }
              else if ($_GET['menu'] == 4){
                  include "signup.php";
                }
              else if ($_GET['menu'] == 5){
                include"signin.php";
              }
              else if ($_GET['menu'] >= 100 && $_GET['menu'] <= 105){
               include "users.php";
              }
              include "footer.php";
            ?>
    </body>
</html>