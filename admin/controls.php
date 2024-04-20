<?php
	// Include the session script
	include '../includes/session.php';

	// Redirect user if not logged in
	require_login($logged_in);
	// Retrieve the username from the session data
	$username = $_SESSION['username'];
  $error_message = "";
  $clients = [];
  $client = [];
  $sessions = [];

  // SQL functions
  // Function to retrieve all clients
  function view_all_clients($pdo) {
    $sql = "SELECT * FROM Client";
    $clients = pdo($pdo, $sql)->fetchAll(PDO::FETCH_ASSOC);
    return $clients;
  }

  // Function to retrieve client by name
  function view_client_by_name($pdo, $clientName) {
    $sql = "SELECT * FROM Client WHERE name = :clientName";
    $client = pdo($pdo, $sql, ['clientName' => $clientName])->fetch(PDO::FETCH_ASSOC);
    return $client;
  }

  // Function to retrieve sessions by date
  function view_sessions_by_date($pdo, $sessionDate) {
    $sql = "SELECT * FROM Session WHERE date = :sessionDate";
    $sessions = pdo($pdo, $sql, ['sessionDate' => $sessionDate])->fetchAll(PDO::FETCH_ASSOC);
    return $sessions;
  }

  // Function to retrieve sessions by type
  function view_sessions_by_type($pdo, $sessionType) {
    $sql = "SELECT * FROM Session WHERE sessionType = :sessionType";
    $sessions = pdo($pdo, $sql, ['sessionType' => $sessionType])->fetchAll(PDO::FETCH_ASSOC);
    return $sessions;
  }
  // Function to retrieve sessions by client
  function view_sessions_by_client($pdo, $clientName) {
    $sql = "SELECT Session.*
      FROM Session
      JOIN Client ON Session.clientId = Client.Id
      WHERE Client.name = :clientName";
    $sessions = pdo($pdo, $sql, ['clientName' => $clientName])->fetchAll(PDO::FETCH_ASSOC);
    return $sessions;
  }

  // On form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected action
    $action = $_POST['action'];

    // Perform action based on the selected option
    switch ($action) {
      case "view_all_clients":
        $clients = view_all_clients($pdo);
        break;
      case "view_client_by_name":
        $client = view_client_by_name($pdo, $_POST['client_name']);
        break;
      case "view_sessions_by_date":
        $sessions = view_sessions_by_date($pdo, $_POST['session_date']);
        break;
      case "view_sessions_by_client":
        $sessions = view_sessions_by_client($pdo, $_POST['client_name']);
        break;
      case "view_sessions_by_type":
        $sessions = view_sessions_by_type($pdo, $_POST['session_type']);
        break;
      default:
        // Handle invalid action
        echo "Invalid action selected";
        break;
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
  <link rel="stylesheet" href="../css/mystyle.css">
  <link rel="stylesheet" href="../css/form.css">
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
          <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
          <a class="nav-link grow"  href="../about.html">About</a>
          <a class="nav-link grow" href="../contact.php">Contact</a>
          <a class="nav-link grow" href="../services.php">Services</a>
          <a class="nav-link grow" href="../FAQ.html">FAQ</a>
          <a class="disabled nav-link grow" href="../resources.html">Resources</a>
        </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <br><br><br>
    
    <div class="flex-container">
    <h1 class="headings">Administrator Controls</h1>
      <div class="row">
        <div class="col-md-6 offset-md-3 form-container">
          <h2 class="text-center">Retrieve Data</h2>
          <br />

          <!-- Admin control panel -->
          <form method="POST" action="controls.php">
            <div class="mb-3">
              <label for="action_select">Select Action:</label>
              <select class="form-select" id="action_select" name="action">
                <option value="view_all_clients">View All Clients</option>
                <option value="view_client_by_name">Retrieve Client by Name</option>
                <option value="view_sessions_by_date">Retrieve Sessions by Date</option>
                <option value="view_sessions_by_client">Retrieve Sessions by Client</option>
                <option value="view_sessions_by_type">Retrieve Sessions by Type</option>
               </select>
            </div>
            <div id="client_name_field" class="mb-3 d-none">
              <label for="client_name">Client Name:</label>
              <input type="text" class="form-control" id="client_name" name="client_name">
            </div>
            <div id="session_date_field" class="mb-3 d-none">
              <label for="session_date">Session Date:</label>
              <input type="date" class="form-control" id="session_date" name="session_date">
            </div>
            <div id="session_type_field" class="mb-3 d-none">
              <label for="session_type">Session Type:</label>
              <select class="form-select" id="session_type" name="session_type">
                <option value="consultation">Consultation</option>
                <option value="therapy">Therapy</option>
              </select>
            </div>
            <input type="submit" value="Submit">
          </form>
          <!-- Display error message if exists -->
          <?php if (!empty($error_message)): ?>
            <div class="text-danger"><?php echo $error_message; ?></div>
          <?php endif; ?>

        </div>
        <br><br><br><br>
        <!-- Display retrieved data -->
        <div id="result">
        <?php if (!empty($clients) || !empty($sessions) || !empty($client)): ?>
            <table class="table">
            <thead>
                <!-- Adjust table headers based on the retrieved data -->
                <?php if (!empty($clients)): ?>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Insurance</th>
                    <th>Waitlist</th>
                    <th>Message</th>
                </tr>
                <?php elseif (!empty($sessions)): ?>
                <tr>
                    <th>Session Date</th>
                    <th>Session Type</th>
                    <th>Session Time</th>
                    <th>Session Notes</th>
                    <!-- Add more headers as needed -->
                </tr>
                <?php elseif (!empty($client)): ?>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Insurance</th>
                    <th>Waitlist</th>
                    <th>Message</th>
                </tr>
                <?php endif; ?>
            </thead>
            <tbody>
                <!-- Display data rows based on the retrieved data -->
                <?php if (!empty($clients)): ?>
                <?php foreach ($clients as $client): ?>
                    <tr>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['age']; ?></td>
                    <td><?php echo $client['insurance']; ?></td>
                    <td><?php echo $client['waitlist']; ?></td>
                    <td><?php echo $client['message']; ?></td>
                    <!-- Add more data cells as needed -->
                    </tr>
                <?php endforeach; ?>
                <?php elseif (!empty($sessions)): ?>
                <?php foreach ($sessions as $session): ?>
                    <tr>
                    <td><?php echo $session['sessionDate']; ?></td>
                    <td><?php echo $session['sessionType']; ?></td>
                    <td><?php echo $session['sessionTime']; ?></td>
                    <td><?php echo $session['sessionNotes']; ?></td>
                    <!-- Add more data cells as needed -->
                    </tr>
                <?php endforeach; ?>
                <?php elseif (!empty($client)): ?>
                <tr>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['age']; ?></td>
                    <td><?php echo $client['insurance']; ?></td>
                    <td><?php echo $client['waitlist']; ?></td>
                    <td><?php echo $client['message']; ?></td>
                    <!-- Add more data cells as needed -->
                </tr>
                <?php endif; ?>
            </tbody>
            </table>
        <?php else: ?>
            <p>No data found.</p>
        <?php endif; ?>
        </div>
        <form method="post" action="logout.php">
            <input type="submit" value="Logout" class="btn btn-primary">
        </form>


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
   <!-- Form display script -->
   <script>
    // Show/hide input fields based on selected action
    document.getElementById("action_select").addEventListener("change", function() {
      var action = this.value;
      document.getElementById("client_name_field").classList.toggle("d-none", action !== "view_client_by_name" && action !== "view_sessions_by_client");
      document.getElementById("session_date_field").classList.toggle("d-none", action !== "view_sessions_by_date");
      document.getElementById("session_type_field").classList.toggle("d-none", action !== "view_sessions_by_type");
    });
  </script>

           
  <!-- Bootstrap JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</body>
</html>