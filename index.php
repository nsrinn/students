<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Index Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
  <?php
  // session_start();

  // // Retrieve the destination from the session
  // $destination = isset($_SESSION['redirect_destination']) ? $_SESSION['redirect_destination'] : "login.php";

  // // Clear the session variable
  // unset($_SESSION['redirect_destination']);

  // // Perform the header redirect
  // header("Location: $destination");
  // exit();

  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light mt-0.5"><a href="index.html"><span>College</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#team">Faculties</a></li>
          <li><a class="nav-link scrollto" href="#courses">Courses</a></li>
          <li><a class="nav-link scrollto" href="#facilities">Facilities</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="studentregister.php">Register</a></li>
          <li class="dropdown"><a href="login.php"><span>Login</span> </a>

          <!-- <i class="bi bi-chevron-down"></i> -->
            <!-- <ul>
              <li><a class="nav-link scrollto" href="login.php" > Student </a></li>
              <li><a class="nav-link scrollto" href="adminlogin.php" > Admin</a></li>
            </ul> -->
          </li>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/university.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Shuffle</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="studentregister.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Register</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/standford2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="studentregister.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Register</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/students2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="studentregister.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Register</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->



  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/slide/students.jpg" class="img-fluid w-100 h-100 " alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Voluptatem dignissimos <strong>provident quasi corporis voluptates</strong></h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed d
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis auiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">10<sup>th</sup> Standerd <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">HSE (Science) <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">HSE(Commerse) <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>



            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Academic Results</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">

              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter" class=" mx-5 text-center"></span>
              <p class="text-center"><strong>Full A+</strong> (both <strong>10<sup>th</sup></strong> & <strong>+2</strong>)</p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <i class="bi bi-journal-richtext"></i> -->
              <span data-purecounter-start="0" data-purecounter-end="360" data-purecounter-duration="1" class="purecounter"></span>
              <p class="text-center"><strong>10<sup>th</sup></strong> Total Students</p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <i class="bi bi-headset"></i> -->
              <span data-purecounter-start="0" data-purecounter-end="180" data-purecounter-duration="1" class="purecounter"></span>
              <p class="text-center"><strong>HSE</strong> Total Students</p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <i class="bi bi-student"></i> -->
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p class="text-center"><strong>Full Mark in HSE</strong> </p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Our Services Section ======= -->
    <section id="courses" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Our Online Courses</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
              <h4 class="title"><a href="">Artificial Intelligence</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
              <h4 class="title"><a href="">Machine Learning</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
              <h4 class="title"><a href="">Ethical Hacking</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-world"></i></div> -->
              <h4 class="title"><a href="">Big Data</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Cta Section ======= -->
    <section class="cta" id="facilities">
      <div class="container">

        <div class="text-center">
          <h3> Our Facilities</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="cta-btn" href="#contact">Contact Us</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= More Services Section ======= -->
    <section class="more-services section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card">
              <img src="assets/img/portfolio/library.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="">Library</a></h5>
                <p class="card-text">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore</p>
                <a href="#" class="btn">Explore more</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card">
              <img src="assets/img/portfolio/computerlab.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="">Computer Lab</a></h5>
                <p class="card-text">Ut quas omnis est. Non et aut tempora dignissimos similique in dignissimos. Sit incidunt et odit iusto</p>
                <a href="#" class="btn">Explore more</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card">
              <img src="assets/img/portfolio/chemistrylab.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="">chemistry Lab</a></h5>
                <p class="card-text">Modi ut et delectus. Modi nobis saepe voluptates nostrum. Sed quod consequatur quia provident dera</p>
                <a href="#" class="btn">Explore more</a>
              </div>
            </div>
          </div>

          <!-- <div class="row mt-3"> -->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card">
              <img src="assets/img/portfolio/hostel.png" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="">Hostel</a></h5>
                <p class="card-text">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore</p>
                <a href="#" class="btn">Explore more</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card">
              <img src="assets/img/portfolio/stadium.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="">Stadium</a></h5>
                <p class="card-text">Ut quas omnis est. Non et aut tempora dignissimos similique in dignissimos. Sit incidunt et odit iusto</p>
                <a href="#" class="btn">Explore more</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card">
              <img src="assets/img/portfolio/auditorium.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="">Auditorium</a></h5>
                <p class="card-text">Modi ut et delectus. Modi nobis saepe voluptates nostrum. Sed quod consequatur quia provident dera</p>
                <a href="#" class="btn">Explore more</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End More Services Section -->

    <!-- ======= Info Box Section ======= -->
    <!-- <section class="info-box py-0">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style="background-image: url(assets/img/studentssec.jpeg);">&nbsp;</div>
        </div>

      </div>
    </section>End Info Box Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Our Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Sports Team</li>
              <li data-filter=".filter-card">Programmes</li>
              <li data-filter=".filter-web">Practical Labs</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/sport1.jpg" class="img-fluid h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>Hockey Team</h4>
                <p>1<sup>st</sup> Prize in InterSchool Fest</p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/sport1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox w-100 h-100" title="HOckey Team"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/computerlab.jpg" class="img-fluid h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>Computer Lab</h4>
                <p></p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/computerlab.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Computer Lab"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/sport2.jpg" class="img-fluid w-100 h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>Basket Ball Team</h4>
                <p>1<sup>st</sup> Prize in InterSchool Fest</p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/sport2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Basket Ball Team"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/scienceexpo.jpg" class="img-fluid h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>Science Expo</h4>
                <p></p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/scienceexpo.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Science Expo"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/chemistrylab.jpg" class="img-fluid h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>Chemistry Lab</h4>
                <p></p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/chemistrylab.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Chemistry Lab"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/sport3.jpg" class="img-fluid h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>HandBall Team</h4>
                <p></p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/sport3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="HandBall"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%; ">
              <img src="assets/img/portfolio/coding.jpg" class="img-fluid h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>Hackethon</h4>
                <p>Coding competition</p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/coding.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox " title="Hackethon"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/act.jpg" class="img-fluid h-100 w-100" alt="" height="300px">
              <div class="portfolio-info">
                <h4>Film Fest</h4>
                <p>Drama Competetition</p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/act.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Drama Team"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web custom-portfolio-item">
            <div class="portfolio-wrap" style="height: 250px; width:100%;">
              <img src="assets/img/portfolio/library.jpg" class="img-fluid h-100 w-100" alt="">
              <div class="portfolio-info">
                <h4>Library</h4>
                <p></p>
              </div>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/library.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox " title="Library"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Faculties</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Principal</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.1s">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Science Department Head</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>Commerse Department Head</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member">
              <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>!0 <sup>th</sup>Department Head</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">

      <div class="container">
        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="container">
          <div class="row">

            <div class="col-md-6 d-flex align-items-stretch infos">

              <div class="row">

                <div class="col-lg-6 info d-flex flex-column align-items-stretch">
                  <i class="bx bx-map"></i>
                  <h4>Address</h4>
                  <p>A108 Adam Street,<br>New York, NY 535022</p>
                </div>
                <div class="col-lg-6 info info-bg d-flex flex-column align-items-stretch">
                  <i class="bx bx-phone"></i>
                  <h4>Call Us</h4>
                  <p>+1 5589 55488 55<br>+1 5589 22548 64</p>
                </div>
                <div class="col-lg-6 info info-bg d-flex flex-column align-items-stretch">
                  <i class="bx bx-envelope"></i>
                  <h4>Email Us</h4>
                  <p>contact@example.com<br>info@example.com</p>
                </div>
                <div class="col-lg-6 info d-flex flex-column align-items-stretch">
                  <i class="bx bx-time-five"></i>
                  <h4>Working Hours</h4>
                  <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
                </div>
              </div>

            </div>

            <div class="col-md-6 d-flex align-items-stretch contact-form-wrap">
              <form action="" enctype="multipart/form-data" method="post" class="php-email-form">
                <?php
                include 'data.php';
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                  $name = test_input($_POST['name']);
                  $email = test_input($_POST['email']);
                  $subject = test_input($_POST['subject']);
                  $message = test_input($_POST['message']);

                  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
                    echo "<div class='alert alert-danger'>All FIelds are required.</div>";
                  } else {
                    // Query the registerform_table to check if the email exists
                    $stmt = $conn->prepare("INSERT INTO contactus(name ,email ,subject, message) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $name, $email,  $subject, $message);



                    if (!$stmt->execute()) {
                      die("Error executing query: " . $stmt->error);
                    }
                    // Close the statement and result set
                    $stmt->close();
                    // $result->close();
                  }
                }
                function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
              }


                ?>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" name="email"  placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="message" rows="8" required></textarea>
                </div>
                <!-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
                <div class="text-center mt-2"><button type="submit" name="submit" value="submit">Send Message</button></div>
              </form>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>College</h3>
            <p>
              A108 Adam Street <br>
              NY 535022, USA<br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#cta">Facilities</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#courses">Courses</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Faculties</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Courses</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#courses">A I</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#courses">M L</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#courses">Ethical Hacking</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#courses">Bigdata</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#courses">Graphic Design</a></li> -->
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>