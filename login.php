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
                        <h3 class="text-uppercase font-weight-bold">Login Form</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" >
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" onblur="validateLoginForm()" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" onblur="validateLoginForm()" required>
                            </div>
                            <div style="height:4rem !important" id="error"></div>
                            Don't have an account? <a href="register.php">Register here</a><br><br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary  pl-5 pr-5"  name="login">Login</button>
                            </div>
                        </form>
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