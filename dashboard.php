<?php include('header.php');
?>
<!doctype html>
<html lang="en">
  <body>
     <?php
        if (!(isset($_SESSION['username']))) {
          echo '<div class="container vh-100">
                <div class="row d-flex align-items-center justify-content-center pt-5">
                    <div class="col-md-6 mt-5 p-5">
                        <div class="card p-5">
                            <div class="text-center">
                                <h1 class="mb-4">Dashboard</h1>
                                <p class="mb-4"> 
                                  <p class="mb-4">Hello User, Your are not logged in!</p>
                                  <p><a href="login.php">Please Login</a></p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>';
        } 
        else
        {
            echo '<div class="container vh-100">
            <div class="row d-flex align-items-center justify-content-center pt-5">
              <div class="col-md-6 mt-5 p-5">
              hello 
              </div>
            </div>
          </div>';
        }

        ?>
  <?php include('footer.php'); ?>
  </body>
</html>