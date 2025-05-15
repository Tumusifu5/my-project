<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Akagera Motors</title>
     <link rel="icon" href="images/akagera logo.jpg" type="image/png" sizes="20px" style="border-radius:2px;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        .shadow-lg:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
        }

        .navbar {
            padding-top: 1.25rem; 
            padding-bottom: 1.25rem;
        }

        .navbar, footer {
             background-color: rgba(22, 22, 22, 0.96);
            
        }
           .my_logo {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        section {
            margin-top: 30px;
        }

        .about-section {
            margin-top: 40px;
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
                        <a class="nav-link active" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ABOUT SECTION -->
    <section class="container about-section">
        <h2>About Tumusifu Motors</h2>
        <p>Tumusifu Motors, established in 1997, is the exclusive distributor for leading brands including Mercedes-Benz, Nissan, Kia, and Mahindra. Our mission is to offer premium vehicles that combine quality, luxury, and performance. From our beginnings in Rwanda, we have expanded our operations across East Africa, providing vehicles that are a symbol of excellence.</p>
        <p>Tumusifu Motors has not only revolutionized the automotive industry but has also significantly contributed to the public transport sector through our vehicle financial leasing program. Today, we are proud to be leaders in the automotive industry and have a strong reputation for quality and customer satisfaction. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis, id modi natus recusandae et tenetur dignissimos dolore cupiditate voluptates! Accusantium velit pariatur porro magnam rerum, voluptate dolores quo consequatur id? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quo reiciendis tempora, beatae doloremque veniam, vitae ad quis libero quos, ipsam at possimus culpa maxime obcaecati deserunt qui numquam a? Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae doloribus iure officiis omnis amet earum sint similique unde aspernatur dignissimos neque, adipisci asperiores minus doloremque dolor placeat, ducimus quas!</p>
    </section>

    <!-- CAR SHOWCASE SECTION -->
    <section class="container my-5">
        <h3>Featured Cars</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Car Cards -->
            <div class="col">
                <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s">
                    <img src="images/front-left-side-47.avif" class="card-img-top" style="height: 390px; object-fit: cover;" alt="Luxury Ride">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Luxury Ride</h5>
                        <p class="card-text">The Velar’s testing suggests a larger size to differentiate from Evoque and Sport — maybe even .</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s">
                    <img src="images/ford.avif" class="card-img-top" style="height: 390px; object-fit: cover;" alt="Luxury Ride">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Luxury Ride</h5>
                        <p class="card-text">The Velar’s testing suggests a larger size to differentiate from Evoque and Sport — maybe even .</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s">
                    <img src="images/mahindra.avif" class="card-img-top" style="height: 390px; object-fit: cover;" alt="Luxury Ride">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Luxury Ride</h5>
                        <p class="card-text">The Velar’s testing suggests a larger size to differentiate from Evoque and Sport — maybe even .</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s">
                    <img src="images/maserati.webp" class="card-img-top" style="height: 390px; object-fit: cover;" alt="Luxury Ride">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Luxury Ride</h5>
                        <p class="card-text">The Velar’s testing suggests a larger size to differentiate from Evoque and Sport — maybe even .</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-2s">
                    <img src="images/freepik.jpg" class="card-img-top" style="height: 390px; object-fit: cover;" alt="Speed Beast">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Speed Beast</h5>
                        <p class="card-text">Lamborghini shows resilience and growth with new models like Urus SE, Revuelto, and Temerario in 2025.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-3s">
                    <img src="images/defender.jpg" class="card-img-top" style="height: 390px; object-fit: cover;" alt="Urban Cruiser">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Urban Cruiser</h5>
                        <p class="card-text">Baby Defender EV expected to use 800V architecture with AWD and 350 kW fast charging capability.</p>
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
