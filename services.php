<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Akagera Motors</title>
     <link rel="icon" href="images/akagera logo.jpg" type="image/png" sizes="20px" style="border-radius:2px;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .service-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .service-card img {
            border-radius: 8px 8px 0 0;
            height: 200px;
            object-fit: cover;
        }

        .service-card-body {
            padding: 20px;
        }
           .my_logo {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .navbar {
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
        }

        .navbar,
        footer {
             background-color: rgba(22, 22, 22, 0.96);
            
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
             <img src="images/logo.jpg" alt="" class="my_logo">
            <a class="navbar-brand" href="#">Tumusifu Motors</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="homepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="services.php">Services</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SERVICES SECTION -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Service 1: Car Maintenance -->
            <div class="col">
                <div class="card service-card">
                    <img src="images/car-maintenance.avif" class="card-img-top" alt="Car Maintenance">
                    <div class="card-body">
                        <h5 class="card-title">Car Maintenance</h5>
                        <p class="card-text">Regular maintenance ensures your vehicle runs smoothly and efficiently. Our
                            expert technicians provide comprehensive checks and services to keep your car in top
                            condition.</p>
                    </div>
                </div>
            </div>
            <!-- Service 2: Car Repair -->
            <div class="col">
                <div class="card service-card">
                    <img src="images/car repair.jpg" class="card-img-top" alt="Car Repair">
                    <div class="card-body">
                        <h5 class="card-title">Car Repair</h5>
                        <p class="card-text">Facing issues with your vehicle? Our skilled mechanics diagnose and repair
                            all types of car problems, ensuring your vehicle is back on the road quickly and safely.</p>
                    </div>
                </div>
            </div>
            <!-- Service 3: Car Detailing -->
            <div class="col">
                <div class="card service-card">
                    <img src="images/car detailing.jpg" class="card-img-top" alt="Car Detailing">
                    <div class="card-body">
                        <h5 class="card-title">Car Detailing</h5>
                        <p class="card-text">Our detailing service restores your car's appearance, both inside and out.
                            From deep cleaning to paint protection, we make your car look as good as new.</p>
                    </div>
                </div>
            </div>
            <!-- Service 4: Tire Services -->
            <div class="col">
                <div class="card service-card">
                    <img src="images/tire service.webp" class="card-img-top" alt="Tire Services">
                    <div class="card-body">
                        <h5 class="card-title">Tire Services</h5>
                        <p class="card-text">We offer tire installation, balancing, and rotation services to ensure
                            optimal performance and safety. Trust us to keep your tires in excellent condition.</p>
                    </div>
                </div>
            </div>
            <!-- Service 5: Battery Replacement -->
            <div class="col">
                <div class="card service-card">
                    <img src="images/battery replacement.jpg" class="card-img-top" alt="Battery Replacement">
                    <div class="card-body">
                        <h5 class="card-title">Battery Replacement</h5>
                        <p class="card-text">A dead battery can leave you stranded. We provide quick and reliable
                            battery testing and replacement services to keep your car starting smoothly.</p>
                    </div>
                </div>
            </div>
            <!-- Service 6: Brake Services -->
            <div class="col">
                <div class="card service-card">
                    <img src="images/brake service.avif" class="card-img-top" alt="Brake Services">
                    <div class="card-body">
                        <h5 class="card-title">Brake Services</h5>
                        <p class="card-text">Your safety is our priority. Our brake services include inspection, repair,
                            and replacement to ensure your braking system is functioning optimally.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-white pt-4 pb-2 mt-5" id="footer">
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
                        <li><a href="firstpage.blade.php" class="text-white text-decoration-none">Register</a></li>
                        <li><a href="secondpage.blade.php" class="text-white text-decoration-none">Login</a></li>
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