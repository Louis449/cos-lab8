<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password</label><br>
        <input type="text" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
        
            require_once "settings.php";
        
            // Query the user table
            $sql  = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
        
            if ($user) {
                $_SESSION['username'] = $username;
                mysqli_close($conn);
                header("Location: profile.php");
                exit();
            } else {
                echo "<p> Incorrect username or password </p>";
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>