<?php

	// Include the database connection script
	require 'database_connection.php';

	// Start/renew session
	session_start();										 	

	// Is user logged in?
	$logged_in = $_SESSION['logged_in'] ?? false; 		      


	// Remember user passed login
	function login($username)
	{
		// Update session id
    	session_regenerate_id(true);

    	// Set logged_in key to true
	    $_SESSION['logged_in'] = true;

	    // Set username key to one from form 
	    $_SESSION['username'] = $username;
	}

	// Check if user logged in
	function require_login($logged_in)					
	{
		// If not logged in
	    if ($logged_in == false) {
	    	// Send to login page 						
	        header('Location: login.php');

	        // Stop rest of page running				
	        exit;    									
	    }
	}

	// Terminate the session
	function logout()  
	{
		// Clear contents of array
	    $_SESSION = [];

	    // Get session cookie parameters
	    $params = session_get_cookie_params();

	    // Delete session cookie			
	    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'],
	        $params['secure'], $params['httponly']);	

	    // Delete session file
	    session_destroy();								
	}

	// Check username and password in db
	function authenticate($pdo, $username, $password) {	   
	    
	    // Get username and password from db and check if matches what user typed in login form												  
	    $sql = "SELECT username, password
	            FROM Admin
	            WHERE username = :username";

	    // Execute SQL query w/args for username and password
	    $user = pdo($pdo, $sql, ['username' => $username])->fetch();

	    if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data if the password is correct
        } else {

            return false; // Return false if the password is incorrect or user not found
        }
  	}

?>

