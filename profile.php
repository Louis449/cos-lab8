<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        #content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 17px;
        }
        input[type="submit"] {
            padding: 5px;
            background: #4f46e5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit();
        }

        require_once "settings.php";
        $username = $_SESSION['username'];

        $query = "SELECT username, email FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        mysqli_close($conn);
    ?>
    <div id="content">
        <h1>My Profile</h1>
        <section>
            <p>Username: <?php echo htmlspecialchars($user['username']) ?></p>
            <p>Email: <?php echo htmlspecialchars($user['email']) ?></p>
        </section>

        <h3>Edit Profile</h3>
        <form action="update_profile.php" method="POST">
            <label for="email">New Email Address</label><br>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php
        include 'footer.inc';
    ?>
</body>
</html>