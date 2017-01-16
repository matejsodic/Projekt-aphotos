<?php

    define('__APP__', TRUE);
	# Start session
    session_start();
    
    # Configuration file
    include_once("config.php");
    include "dbconn.php";
    
    # ---------------------------------------------------------------------------#
	# Connect to MySQL database
	# ---------------------------------------------------------------------------#

	
	# Redirect
    $redirect = "";
		
	# ---------------------------------------------------------------------------#
    if ($_POST['action'] == "newsletter"){
        $query  = "INSERT INTO newsletter (email)";
        $query .= " VALUES ('" . $_POST['newsemail'] . "')";
        $result = @mysqli_query($MySQL, $query);
        
        $ID = mysqli_insert_id();
        $_SESSION['message'] = '<p>Thanks for singning up!</p>';
        
        $redirect .= "index.php?menu=1";
    }

    # Registration
    else if($_POST['action'] == "registration") {

		$hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
        #password_hash https://secure.php.net/manual/en/function.password-hash.php
		
        if ($_POST["password"] === $_POST["password2"]) {
           // success!
        $query  = "INSERT INTO users (username, email, pass)";
        $query .= " VALUES ('" . $_POST['username'] . "', '" . $_POST['email'] . "', '" . $hash . "')";
        $result = @mysqli_query($MySQL, $query);
        
        $ID = mysqli_insert_id();
        $_SESSION['message'] = '<p>Registration sucessful!</p>';
        
        $redirect .= "index.php?menu=5";
        }
        else{
            $redirect .= "index.php?menu=4";
            $_SESSION['message'] = '<p>Passwords dont match!</p>';
        }
    }

    # ---------------------------------------------------------------------------#
    # Login
    else if($_POST['action'] == "login") {
        $_username = $_POST['username'];
        $_password = $_POST['password'];

        $query  = "SELECT * FROM users";
        $query .= " WHERE username='" .  $_username . "'";
        $result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if (password_verify($_password, $row['pass'])) {
        #password_verify https://secure.php.net/manual/en/function.password-verify.php
            $_SESSION['user']['valid'] = 'true';
            $_SESSION['user']['id'] = $row['id'];
            $_SESSION['user']['name'] = $row['username'];
            $_SESSION['welcomemessage'] = '<p>Welcome ' . $_SESSION['user']['name'] . '</p>';
            $redirect .= "index.php?menu=100";
        }
        
        # Bad username or password
        else {
            unset($_SESSION['user']);
            $_SESSION['user']['valid'] = 'false';
            $_SESSION['message'] = '<p>Wrong name or password</p>';
            $redirect .= "index.php?menu=5";
        }
        
    }
    #Contact form
    else if ($_POST['action'] == "contact") {
            $_query = "INSERT INTO message (name, username, email, country, msg)";
            $_query .= "VALUES ('" . $_POST['msgname'] . "','" . $_POST['name'] . "', '" . $_POST['email3'] . "', '" . $_POST['country'] . "', '" . $_POST['message'] . "')";
            $_result = @mysqli_query($MySQL, $_query);

            $ID = mysqli_insert_id();
            $_SESSION['message'] = '<p>Message submitted!</p>';
        
            $redirect .= "index.php?menu=3";
    }
    #Upload form
    elseif ($_POST['action'] == "upload") {
            $qry = "INSERT into images (name, file, category_id)";

            move_uploaded_file($_FILES["upimage"]["tmp_name"], "uploads/" . $_FILES['upimage']['name']);

            $qry .= "VALUES ('" . $_POST['imagename'] . "', '" . $_FILES['upimage']['name'] . "', '" . $_POST['categories'] . "')";
            $__results= @mysqli_query($MySQL, $qry);

            $ID = mysqli_insert_id($MySQL);
            $_SESSION['message'] = '<p>Upload sucessful!</p>';

            $redirect .= "index.php?menu=100";
    }
    #New category 
    elseif ($_POST['action'] == "newcategory") {
            $qry = "INSERT into categories (name)";
            $qry .= "VALUES ('" . $_POST['categoryname'] . "')";
            $__results= @mysqli_query($MySQL, $qry);

            $ID = mysqli_insert_id($MySQL);
            $_SESSION['message'] = '<p>Upload sucessful!</p>';

            $redirect .= "index.php?menu=100";
    }

     @mysqli_close($mysql);
    
    # Redirect
    header("Location: " . $redirect);
    exit;