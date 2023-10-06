<?php 
session_start();
$username = "";
$password = "";
$confirmpassword = "";
$db = mysqli_connect('localhost', 'root', '', 'narrativenexus');
if (!$db) {
    die("DB connection failed: " . mysqli_connect_error());
}
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

    mysqli_close($db);

    $username = "";
    $password = "";
    $confirmpassword = "";
?>
