<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <h2>My Profile</h2>
    <section>
        <p>Username: <?php echo htmlspecialchars($user['username']) ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']) ?></p>
    </section>

    <h3>Edit Profile</h3>
    <form action="update_profile.php" method="POST">
        <label for="email">New Email Address: </label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>