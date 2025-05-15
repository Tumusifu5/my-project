<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services - Akagera Motors</title>
  <link rel="icon" href="images/akagera logo.jpg" type="image/png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-color: #f8f9fa;
    }

    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding-top: 3rem;
    }

    .navbar,
    footer {
        background-color: rgba(22, 22, 22, 0.96);
            
    }

    .search {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .search form {
      display: flex;
      max-width: 35rem;
      width: 100%;
    }

    .search input {
      width: 43rem;
      height: 2.8rem;
      border-radius: 8px 0 0 8px;
      padding: 0 1rem;
      border: 1px solid #ccc;
      border-right: none;
    }

    .search button {
      height: 2.8rem;
      border-radius: 0 8px 8px 0;
      background-color: #198754;
      color: white;
      border: 1px solid #198754;
      padding: 0 1.5rem;
      margin-left: -1px; 
    }
       .my_logo {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

    footer {
      background-color: #343a40;
      color: white;
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
    <div class="container-fluid">
       <img src="images/logo.jpg" alt="" class="my_logo">
      <a class="navbar-brand" href="#">Tumusifu Motors</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link " href="services.php">Services</a></li>
          <li class="nav-item"><a class="nav-link active" href="product.php">Product</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main>
    <!-- SEARCH BAR -->
    <div class="search mb-4">
      <form action="product.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="query" placeholder="Search images..." required>
        <button type="submit" class="btn btn-success">Search</button>
      </form>
    </div>

    <!-- SEARCH RESULTS -->
    <div class="container">
      <div class="row justify-content-center">
        <?php
        if (isset($_GET['query'])) {
          $conn = new mysqli("localhost", "root", "", "tumusifudemo");

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $search = $conn->real_escape_string($_GET['query']);
          $sql = "SELECT image_path FROM data WHERE name LIKE '%$search%' OR image_path LIKE '%$search%'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="col-md-3 col-sm-6 mb-4">';
              echo '<img style="width:34rem;heigth:5rem;" src="' . htmlspecialchars($row['image_path']) . '" class="img-fluid border rounded shadow-sm" alt="Service Image">';
              echo '</div>';
            }
          } else {
            echo '<p class="text-center">'.$_GET['query']. ' ..Images not found please insert different !..</p>';
          }

          $conn->close();
        }
        ?>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="text-white pt-4 pb-2" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5>Tumusifu Motors</h5>
          <p>Delivering excellence in luxury and performance vehicles across East Africa.</p>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="homepage.php" class="text-white text-decoration-none">Home</a></li>
            <li><a href="first-page.blade.php" class="text-white text-decoration-none">Register</a></li>
            <li><a href="second-page.blade.php" class="text-white text-decoration-none">Login</a></li>
            <li><a href="#" class="text-white text-decoration-none">Users</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Contact</h5>
          <p>Email: tumusifueric032@gmail.com</p>
          <p>Phone: +250 788 123 456</p>
          <p>Location: Kigali, Rwanda</p>
        </div>
      </div>
      <div class="text-center mt-3 border-top pt-3">
        <small>&copy; 2025 Tumusifu Motors. All rights reserved.</small>
      </div>
    </div>
  </footer>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 
</body>

</html>

