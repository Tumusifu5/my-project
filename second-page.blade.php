<?php
include('connection.php');
$error = '';

if (isset($_POST['send'])) {
    $lname = mysqli_real_escape_string($conn, $_POST['name']);
    $lpassword = $_POST['password'];

    $query = "SELECT * FROM data WHERE name = '$lname'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the entered password matches the hashed password
        if (password_verify($lpassword, $user['password'])) {
            header('Location: homepage.php');
            exit;
        } else {
            $error = "Password or username incorrect!";
        }
    } else {
        $error = "Password or username incorrect!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Akagera Motors - Login</title>
  <link rel="icon" href="images/akagera logo.jpg" type="image/png" sizes="20px" style="border-radius:2px;">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    body {
      background-color: rgba(185, 181, 181, 0.2);
    }

    .login-form {
      background: black;
      color: white;
      border-radius: 10px;
      padding: 2.5rem;
      max-width: 500px;
      margin: 5rem auto;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .login-form h1 {
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

    .login-btn {
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
    <form class="login-form animate__animated animate__fadeInUp" method="post">
      <h1>Login</h1>

      <div class="mb-3">
        <label for="name" class="form-label">User Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
      </div>

      <button type="submit" class="login-btn" name="send">Login</button>

      <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center mt-3" role="alert">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <div class="form-footer">
        <p>Don't have an account? <a href="first-page.blade.php">Sign Up</a></p>
      </div>
    </form>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
