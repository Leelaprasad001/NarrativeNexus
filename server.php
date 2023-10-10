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
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

   
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
        $sql = "INSERT INTO register (email, username, password) VALUES ('$email','$username', '$password')";
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
    $sql = "INSERT INTO blogs (author, heading, subtitle, image, content, Date, verified)
            VALUES ('$username', '$heading', '$subtitle', '$image', '$content', Now(), '$verified')";

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

    $query1 = "SELECT COUNT(*) AS verifiedCount FROM blogs WHERE verified = 1 AND author = '$username'";
    $result1 = mysqli_query($db, $query1);
    if ($result1) {
        $row1 = mysqli_fetch_assoc($result1);
        $verified = $row1['verifiedCount']; // Access the 'blogCount' alias
    } 
}

//delete the blog
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $sno = mysqli_real_escape_string($db, $_POST['sno']);
    $sql = "DELETE FROM blogs WHERE sno = $sno";
    if (mysqli_query($db, $sql)) {
        header('Location: dashboard.php');
    }
}

//update the blog
if (isset($_POST['update'])) {
    $sno = mysqli_real_escape_string($db, $_POST['sno']);
    $heading = mysqli_real_escape_string($db, $_POST['heading']);
    $subtitle = mysqli_real_escape_string($db, $_POST['subtitle']);
    $content = mysqli_real_escape_string($db, $_POST['content']);

    $target_dir = "assets/uploads/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $sql = "UPDATE blogs SET heading = ?, subtitle = ?, content = ?, image = ? WHERE sno = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $heading, $subtitle, $content, $image, $sno);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($db);
        }
        mysqli_stmt_close($stmt);
    }     
}

//get the total count of blogs and total verified
if (isset($_SESSION['username']) && $_SESSION['username'] === "admin")
{
    $query = "SELECT COUNT(*) AS blogCount FROM blogs";
    $result = mysqli_query($db, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totcount = $row['blogCount']; // Access the 'blogCount' alias
    } 

    $query1 = "SELECT COUNT(*) AS verifiedCount FROM blogs WHERE verified = 1";
    $result1 = mysqli_query($db, $query1);
    if ($result1) {
        $row1 = mysqli_fetch_assoc($result1);
        $totverified = $row1['verifiedCount']; // Access the 'blogCount' alias
    } 
}

//verify the blog
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verify"])  && isset($_SESSION['username']) && $_SESSION['username'] === "admin") 
{
    $sno = mysqli_real_escape_string($db, $_POST['sno']);
    $sql = "UPDATE blogs SET verified = 1 WHERE sno = $sno";
    if (mysqli_query($db, $sql)) {
        header('Location: dashboard.php');
    }
}

    mysqli_close($db);

    $email = "";
    $username = "";
    $password = "";
?>
