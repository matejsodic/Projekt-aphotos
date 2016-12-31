<?php
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
    # Registration
    if($_POST['action'] == "registration") {

		$hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
        #password_hash https://secure.php.net/manual/en/function.password-hash.php
		
        $query  = "INSERT INTO users (username, user_email, user_pass)";
        $query .= " VALUES ('" . $_POST['username'] . "', '" . $_POST['email'] . "', '" . $hash . "')";
        $result = @mysqli_query($MySQL, $query);
        
        $ID = mysqli_insert_id();
        $_SESSION['message'] = '<p>Registration sucessful!</p>';
        
        $redirect .= "index.php?menu=5";
    }

    # ---------------------------------------------------------------------------#
    # Sign Up
    else if($_POST['action'] == "login") {
        $_username = $_POST['username'];
        $_password = $_POST['password'];

        $query  = "SELECT * FROM users";
        $query .= " WHERE username='" .  $_username . "'";
        $result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if (password_verify($_password, $row['user_pass'])) {
        #password_verify https://secure.php.net/manual/en/function.password-verify.php
            $_SESSION['user']['valid'] = 'true';
            $_SESSION['user']['id'] = $row['user_id'];
            $_SESSION['user']['name'] = $row['username'];
            $_SESSION['message'] = '<p>Welcome ' . $_SESSION['user']['name'] . '</p>';
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

    else if ($_POST['action'] == "contact") {
            $_query = "INSERT INTO message (msg_name, msg_email, msg_country, msg_msg)";
            $_query .= "VALUES ('" . $_POST['name'] . "', '" . $_POST['email3'] . "', '" . $_POST['country'] . "', '" . $_POST['message'] . "')";
            $_result = @mysqli_query($MySQL, $_query);

            $ID = mysqli_insert_id();
            $_SESSION['message'] = '<p>Message submitted!</p>';
        
            $redirect .= "index.php?menu=3";
    }
    



     @mysqli_close($mysql);
    
    # Redirect
    header("Location: " . $redirect);
    exit;