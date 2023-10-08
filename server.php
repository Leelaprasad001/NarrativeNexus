<?php 
session_start();
$username = "";
$password = "";
$confirmpassword = "";
$db = mysqli_connect('localhost', 'root', '', 'narrativenexus');
if (!$db) {
    die("DB connection failed: " . mysqli_connect_error());
}

//register user
if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);

   
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql2 = "SELECT * FROM register WHERE username='$username'";

    $result = mysqli_query($db, $sql2);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            echo "<script type='text/javascript'>alert('Username already exists!');</script>";
        }
    }
    else{
        $sql = "INSERT INTO register (username, password, confirmpassword) VALUES ('$username', '$password', '$confirmpassword')";
        if (mysqli_query($db, $sql)) {
            echo "<script type='text/javascript'>alert('Registration successful!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }  
    }
}


//login user
if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql2 = "SELECT * FROM register WHERE username='$username'";

    $result = mysqli_query($db, $sql2);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            if ($user['password'] === $password) {
                $_SESSION['username'] = $username;
                header('location: index.php');
            }
            else{
                echo "<script type='text/javascript'>alert('Incorrect password!');</script>";
            }
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Incorrect username!');</script>";
    }
}


//add blogs on submit
if(isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $heading = mysqli_real_escape_string($db, $_POST['heading']);
    $subtitle = mysqli_real_escape_string($db, $_POST['subtitle']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    
    $image = $_FILES['image']['name'];
    $target = "assets/uploads/" . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);

    $verified = 0;
    $sql = "INSERT INTO blogs (author, heading, subtitle, image, content, verified)
            VALUES ('$username', '$heading', '$subtitle', '$image', '$content', '$verified')";

    if (mysqli_query($db, $sql)) {
        header('Location: dashboard.php');
    } else {
        echo "<script type='text/javascript'>alert('Error: " . mysqli_error($db) . "');</script>";
    }

}

//get all blogs
$sql = "SELECT * FROM blogs";
$blogresult = $db->query($sql);
if ($blogresult->num_rows > 0) {
    while ($row = $blogresult->fetch_assoc()) {
        $blogs[] = $row;
    }
}


//get current user blogs
if ((isset($_SESSION['username']))){
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM blogs WHERE author = '$username'";
    $blogresult1 = $db->query($sql);
    if ($blogresult1->num_rows > 0) {
        while ($row = $blogresult1->fetch_assoc()) {
            $curblogs[] = $row;
        }
    }

    $query = "SELECT COUNT(*) AS blogCount FROM blogs WHERE author = '$username'";
    $result = mysqli_query($db, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['blogCount']; // Access the 'blogCount' alias
    } 

    $query1 = "SELECT COUNT(*) AS verifiedCount FROM blogs WHERE verified = 1";
    $result1 = mysqli_query($db, $query1);
    if ($result1) {
        $row1 = mysqli_fetch_assoc($result1);
        $verified = $row1['verifiedCount']; // Access the 'blogCount' alias
    } 
}



// if (isset($_POST['blogid'])) {
//     $blogId = $_POST['blogid'];
//     echo "<script type='text/javascript'>alert('". $blogId ."');</script>";
    
// }

    mysqli_close($db);

    $username = "";
    $password = "";
    $confirmpassword = "";
?>
