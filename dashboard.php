<?php include('header.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>NarrativeNexus</title>
  </head>
  <body>

      <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 mt-5 p-5">
                <div class="card p-5">
                    <div class="text-center">
                        <h1 class="mb-4">Dashboard</h1>
                        <p class="mb-4"> 
                          <?php
                            if (isset($_SESSION['username'])) {
                              echo '<p class="mb-4">Welcome to your dashboard, ' . $_SESSION['username'] . '!</p>';
                            } else {
                                echo '<p class="mb-4">Welcome to your dashboard!</p>';
                            }
                            ?>
                        </p>
                        <a href="index.html" class="btn btn-primary">Home</a>
                        <a href="blogs.php" class="btn btn-primary">Blogs</a>
                        <a href="contact.php" class="btn btn-primary">Contact</a>
                        <a href="logout.php" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>