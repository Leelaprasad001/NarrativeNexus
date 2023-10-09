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
            $username = $_SESSION['username'];
            echo '<div class="container dash">
                    <div class="row pt-5 m">
                      <div class="col-md-6 text-left">
                          <h4>Welcome to your dashboard, <span class="text-uppercase">' . $username . '👋</span></h4>
                      </div>
                      <div class="col-md-6 text-right">
                        <a href="#addblog">
                          <button class="btn btn-primary">+ Add Blog</button>
                        </a>
                      </div>
                    </div>

        
                    <div class="row gy-4 counts d-flex justify-content-center">
                      <div class="col-md-6 col-sm-6">
                        <div class="count-box">
                          <i class="bi bi-emoji-smile"></i>
                          <div>
                            <span> '. $count .' </span>
                            <p>Total No Blogs Created </p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6">
                        <div class="count-box">
                          <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                          <div>
                            <span> '. $verified .' </span>
                            <p>Total No Blogs Verified </p>
                          </div>
                        </div>
                      </div>
                    </div>';


                    echo'<div class="row">
                          <div class="col-md-12 pb-3 m1">
                            <h4 class="text-center">Explore Your Blogs 🚀</span></h4>
                          </div>';
                    foreach ($curblogs as $blog) {
                    echo '<div class="col-md-6">
                            <div class="blg card">
                              <img src="assets/uploads/' . $blog['image'] . '" class="card-img-top" alt="Blog Image">
                              <div class="card-body">
                                  <h5 class="card-title">' . $blog['heading'] . '</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">' . $blog['subtitle'] . '</h6>
                                  <p class="card-text">' . $blog['date'] . ' - ' . ($blog['verified'] == 1 ? 'Verified' : 'Not Verified') . '</p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <a><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#blogContent' . $blog['sno'] . '">View More</button></a>
                                      <form method="post">
                                          <input type="hidden" name="sno" value="' . $blog['sno'] .'">
                                          <div class="btn-group" role="group">
                                            <button class="btn btn-danger mr-3" type="submit" name="delete">Delete</button>
                                            <button class="btn btn-success" type="button" name="edit" data-toggle="collapse" data-target="#editForm' . $blog['sno'] .'">Edit </button>
                                          </div>
                                      </form>
                                  </div>
                                  <div class="collapse pt-5" id="blogContent' . $blog['sno'] . '">
                                      <p class="text-justify card-text">' . $blog['content'] . '</p>
                                  </div>
                                  <div class="collapse pt-5" id="editForm' . $blog['sno'] . '">
                                    <form method="post" class="form" enctype="multipart/form-data">
                                      <input type="hidden" name="sno" value="' . $blog['sno'] . '">
                                      <div class="form-group">
                                          <label for="heading">Heading</label>
                                          <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter heading of the Blog......">
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="subtitle">Subtitle</label>
                                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="content">Content</label>
                                          <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter content of the Blog......"></textarea>
                                      </div>
                                      <div class="text-center">
                                        <button type="submit" class="btn btn-primary  pl-5 pr-5"  name="update">Update</button>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                              </div>
                          </div>';
                    }

                    echo'</div>';
                    
                    echo'<div class="row mt-5 mb-5" id="addblog">
                      <div class="col-md-12 addblog">
                        <h4 class="text-center">Lets Create an Awesome Blog</span></h4>
                        <form method="post" class="form" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="heading">Heading</label>
                              <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter heading of the Blog......">
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="content">Content</label>
                              <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter content of the Blog......"></textarea>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary  pl-5 pr-5"  name="submit">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>';
        }
        ?>
  <?php include('footer.php'); ?>
  </body>
</html>