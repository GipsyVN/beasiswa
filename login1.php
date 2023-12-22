<?php
session_start();
require "config.php";

if(isset($_POST["submit"])){

    $username=$_POST["username"];
    $pass=md5($_POST["pass"]);

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {

        $_SESSION['username'] = $row["username"];
        $_SESSION['level'] = $row["level"];
        $_SESSION['status'] = "y";

        header("Location:index.php");

    } else {
        header("Location:?msg=n");
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>



    <section>
        <form method="POST">
            <h1>Login</h1>
            <div class="inputbox">
                <ion-icon name="person-circle-outline"></ion-icon>
                <input type="username" name="username" autocomplete="off" required>
                <label>Username</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="pass" autocomplete="off" required>
                <label>Password</label>
            </div>
            <button type="submit" name="submit" value="Login">Log in</button>
        </form>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- validasi login gagal, letakkan disini -->
    <?php 
    if(isset($_GET['msg'])){
        if($_GET['msg'] == "n"){
            ?>
            <script type="text/javascript">
                alert("Username atau Password Anda Salah");
            </script>
            <?php
        }       
    }
    ?>
</body>

</html>