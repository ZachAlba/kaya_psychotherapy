<?php
  // Include the session script
  require '../includes/session.php';

  // If already logged in
  if ($logged_in) { 
    // Redirect to admin controls page   
    header('Location: controls.php'); 

    // Stop further code running
    exit;
  }    


  // Check if the form was submitted.
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username the user sent
    $username = $_POST['username'];

    // Get the password the user sent
    $password = $_POST['password'];


    // Call your authenticate function in the 'session.php' file to authenticate the user based on the provided username and password. 
    $user = authenticate($pdo, $username, $password);

    // If username and password is valid (i.e., user data returned)
    if ($user) {
      // Call the login function in the 'session.php' file to update session data
      login($username);  

      // Redirect to admin controls page                             
      header('Location: controls.php');

      // Stop further code running 
      exit;   
    }
  }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/mystyle.css">

</head>
<body>
    <header>
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Kaya Psychotherapy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    <a class="nav-link grow"  href="about.html">About</a>
                    <a class="nav-link grow" href="contact.php">Contact</a>
                    <a class="nav-link grow" href="services.php">Services</a>
                    <a class="nav-link grow" href="FAQ.html">FAQ</a>
                    <a class="disabled nav-link grow" href="resources.html">Resources</a>
                </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1 class="text-center">Admin Login</h1>
                    <br />
      
                    <form method="POST" action="login.php">
                        Username: <input type="username" name="username"><br>
                        Password: <input type="password" name="password"><br>
                    <input type="submit" value="Log In">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <br><br><br>
    <footer class="footer mt-auto py-1 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">435 Newbury St Suite 206</p>
                    <p class="mb-0">Danvers, MA 01923-1065</p>
                    <p class="mb-0"><a href="mailto:kayapsychotherapy@gmail.com">kayapsychotherapy@gmail.com</a></p>
                    <p class="mb-0">978-219-7111</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-0">©2023 by Kaya Psychotherapy PLLC.</p>
                    <br>
                    <p class="mb-0">Created by Zach Albanese</p>
                    <p class="mb-0">Contact site creator at: <a href="mailto:zachalba@uri.edu">zachalba@uri.edu</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>