<?php
include('connection.php');
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_raw = $_POST['password'];
    $password = password_hash($password_raw, PASSWORD_DEFAULT); // Hashed password

    // Check if name or email already exists
    $checkQuery = "SELECT id FROM data WHERE name = '$name' OR email = '$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username or email already exists!";
    } else {
        $insertQuery = "INSERT INTO data(name, email, password) VALUES('$name', '$email', '$password')";
        if (mysqli_query($conn, $insertQuery)) {
            header("Location: second-page.blade.php");
            exit();
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Akagera Motors - Sign Up</title>

  <link rel="icon" href="images/akagera logo.jpg" type="image/png" sizes="20px" style="border-radius:2px;">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    body {
      background-color: rgba(185, 181, 181, 0.2);
    }

    .signup-form {
      background: black;
      color: white;
      border-radius: 10px;
      padding: 2.5rem;
      max-width: 500px;
      margin: 5rem auto;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .signup-form h1 {
      font-size: 2.5rem;
      font-weight: bold;
      color: green;
      text-align: center;
      margin-bottom: 2rem;
    }

    .form-control {
      background-color: #222;
      color: green;
      border: 1px solid #444;
    }

    .form-control::placeholder {
      color: #888;
    }

    .signup-btn {
      background: green;
      border: none;
      border-radius: 6px;
      color: white;
      padding: 0.75rem 2rem;
      display: block;
      margin: 2rem auto 1rem;
    }

    .form-footer {
      text-align: center;
    }

    .form-footer a {
      color: green;
      text-decoration: none;
    }

    .form-footer a:hover {
      text-decoration: underline;
    }

    .alert {
      max-width: 400px;
      margin: 0 auto;
    }

    
  </style>
</head>

<body>
  <div class="container">
    <form class="signup-form animate__animated animate__fadeInUp" action="first-page.blade.php" method="post">
      <h1>Sign Up</h1>

      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required />
      </div>

      <button type="submit" class="signup-btn" name="send">Sign Up</button>

      <!-- Error message block shown after button -->
      <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center mt-3" role="alert">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <div class="form-footer mt-4">
        <p>Already have an account? <a href="second-page.blade.php">Login</a></p>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
