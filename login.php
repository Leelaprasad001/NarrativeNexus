<?php include('header.php');
?>
<!doctype html>
<html lang="en">
  <body>

    
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 mt-5 mb-5" data-aos="zoom-in" data-aos-delay="200">
                <div class="card login">
                    <div class="text-center mt-3">
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
    <?php include('footer.php'); ?>
  </body>
</html>