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
            <div class="col-md-6 mt-5 mb-5">
                <div class="card reg">
                    <div class="text-center mt-3">
                        <h3 class="text-uppercase font-weight-bold">Register Form</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" action="login.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" onblur="validateForm()" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" onblur="validateForm()" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" placeholder="Enter your password" name="confirmpassword" onblur="validateForm()" required>
                            </div>
                            <div style="height:4rem !important" id="error"></div>
                           Already have an account? <a href="login.php">Login here</a><br><br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary  pl-5 pr-5" name="register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
  </body>
</html>