<?php include('header.php');
?>
<!doctype html>
<html lang="en">
  <body>
  <?php
      echo'<div class="container blogpg mb-5 pb-5">
            <div class="row">
              <div class="col-md-12 pb-3 mt-5" data-aos="zoom-in" data-aos-delay="200">
                <h4 class="text-center">Explore All Blogs 🚀</span></h4>
              </div>';
      foreach ($blogs as $blog) {
      echo '<div class="col-md-6">
              <div class="blg card" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/uploads/' . $blog['image'] . '" class="card-img-top" alt="Blog Image" style="height: 17rem">
                <div class="card-body">
                    <h5 class="card-title">' . $blog['heading'] . '</h5>
                    <h6 class="card-subtitle mb-2 text-muted">' . $blog['subtitle'] . '</h6>
                    <p class="card-text">' . $blog['date'] . ' - ' . ($blog['verified'] == 1 ? 'Verified' : 'Not Verified') . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <a><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#blogContent' . $blog['sno'] . '">View More</button></a>
                      <div class="btn-group" role="group">
                      ' . ($blog['verified'] == 1 ? '<button class="btn btn-success mr-3" type="submit">Verified</button>' : '<button class="btn btn-danger mr-3" type="submit">Not Verify</button>') . '
                      </div>
                    </div>                    
                    <div class="collapse pt-5" id="blogContent' . $blog['sno'] . '">
                      <p class="text-justify card-text">' . $blog['content'] . '</p>
                    </div>
                </div>
                </div>
            </div>';
      }

      echo'</div></div>';
  ?>
    

  <?php include('footer.php'); ?>
  </body>
</html>