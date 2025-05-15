<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Register</h2>
    <form method="POST">
        <input class="form-control mb-2" type="text" name="username" placeholder="Username" required>
        <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
        <button class="btn btn-primary" type="submit">Signup</button>
    </form>
    <a href="index.php">Already have an account? Login</a>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $conn->real_escape_string($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        echo "<p class='text-success'>Registered successfully. <a href='index.php'>Login here</a>.</p>";
    }
    ?>
</body>
</html>
