<?php
    $conn = mysqli_connect("localhost", "root", "", "student_db");
    if (!$conn) {
        echo "<p>Unable to connect to the database.</p>";
        exit();
    }
?>