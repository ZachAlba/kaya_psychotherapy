<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaya Psychotherapy</title>
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
                    <a class="nav-link grow" href="index.html">Home</a>
                    <a class="nav-link grow" href="about.html">About</a>
                    <a class="nav-link grow" href="contact.html">Contact</a>
                    <a class="nav-link active" aria-current="page" href="services.html">Services</a>
                    <a class="nav-link grow" href="FAQ.html">FAQ</a>
                    <a class="nav-link grow" href="resources.html">Resources</a>
                </div>
                </div>
            </div>
        </nav>
        
        <!-- insert site search ? -->

    </header>

    <!-- Main Content-->
    <main>

    <!-- Logo -->
    <div class="container">
        <img src="./images/logo.png" alt="Kaya Psychotherapy Logo" id="logo" class="center borders">
    </div>

    <br>
                
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#" style="text-decoration: none;" id="free">
                        <div class="card" id="card1">
                            <img src="images/slideshow/balance.jpg" class="card-img-top" alt="stacked rocks, balance">
                            <div class="card-body">
                                <h5 class="card-title">Free Initial Consultation</h5>
                                <p class="card-text">15 mins.</p>
                            </div>
                        </div>
                    </a>
                    <br>
                    <a href="#" style="text-decoration: none;" id="loadData">
                        <div class="card" id="card2">
                            <img src="images/slideshow/growing.jpg" class="card-img-top" alt="green sprout on a person's hand, growing">
                            <div class="card-body">
                                <h5 class="card-title">Online Psychotherapy</h5>
                                <p class="card-text">45 mins.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class = "col align-self-center content" id="result-container"style="display: none">
                </div>
            </div>
            <br><br><br>
    </main>
            

    <!-- Footer -->
    <!-- php .inc files moving forward?-->
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
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="./js/jquery.min.js"><\/script>')
        </script>
            <!-- Custom jQuery -->
            <script src="js/services.js"></script>
            <script src="js/jq_ajax.js"></script>
            
</body>
</html>

