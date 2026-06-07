<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit();
        }
        
        require_once "settings.php";
        $username  = $_SESSION['username'];
        $new_email = trim($_POST['email']);

        // update query statement
        $sql = "UPDATE user SET email = '$new_email' WHERE username = '$username'";
        mysqli_query($conn, $sql);
        
        mysqli_close($conn);
        header("Location: profile.php?updated=1");
        exit();
    ?>
</body>
</html>