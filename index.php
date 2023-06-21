<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Changisha</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body class="main-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><b>Changisha</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="projects.php">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <header class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Welcome to Changisha</h1>
      <p class="lead">Where sweat meets style, because even your workout deserves a standing ovation.</p>
      <a href="#" class="btn btn-primary btn-lg">Get Started</a>
    </div>
  </header>

  <section class="container about-section">
    <div class="row">
      <div class="col-md-6">
        <h2 id="about">About Us</h2>
        <p>At Cladi Sportswear, we believe that every athlete, from beginners to pros, deserves to feel confident, comfortable,
             and stylish while pursuing their passion. We strive to provide high-quality sportswear that blends functionality with
              trendy designs, empowering individuals to unleash their full potential. Our team is dedicated to curating a collection 
              that caters to diverse athletic needs, ensuring exceptional performance and uncompromising style. Whether you're hitting 
              the gym, breaking a sweat on the field, or embracing an active lifestyle, Cladi Sportswear is here to outfit you with gear 
              that not only enhances your performance but also makes a bold statement. 
            Join us on this athletic journey, where fashion meets athleticism, and discover the perfect fusion of sport and style.</p>
      </div>
      <div class="col-md-6">
        <img src="images/home1.jpg" alt="About Us Image" class="img-fluid">
      </div>
    </div>
  </section>

  <section class="container bg-light services-section">
    <div class="row">
      <div class="col-md-6">
        <img src="images/home2.jpg" alt="Services Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2 id="services">Our Services</h2>
        <p>Step into the world of Cladi Sportswear, where our services are designed to elevate your sportswear shopping experience to new heights.
             Our commitment is to provide you with exceptional services that cater to your every need.</p>
             <p>Discover a vast and carefully curated selection of sportswear products that will ignite your passion for athletic pursuits.
                 From stylish apparel and performance-enhancing footwear to essential accessories, we have it all. Each item is meticulously
                  chosen to merge the latest technology, unbeatable comfort, and trendsetting style, ensuring you stand out in the crowd.</p>
                  <p>Time is of the essence, and we value your eagerness to receive your gear. That's why we offer fast and reliable shipping services,
                   ensuring your orders arrive promptly and securely. No more waiting around – gear up and embark on your athletic journey with confidence.</p>
      </div>
    </div>
  </section>

  <section class="container contact-section">
    <div class="row">
      <div class="col-md-6">
        <h2 id="contact">Contact Us</h2>
        <form>
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class ="contactimage-container">
        <img src="images/contact.jpg" alt="Contact Us Image" class="img-fluid">
      </div>
</div>
    </div>
  </section>

  <footer class="container-fluid bg-dark text-light text-center">
    <p>&copy; Changisha. All rights reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
