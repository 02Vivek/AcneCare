<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AcniCare</title>
    <link rel="stylesheet" href="css/index.css" />
  </head>
  <body>
    <main>
      <div class="big-wrapper light">
        <img src="./img/shape.png" alt="" class="shape" />

        <header>
          <div class="container">
            <div class="logo">
              <img src="./img/logo.png" alt="Logo" />
              <a href="index.php"><h3>AcneCare</h3></a>
            </div>

            <!-- <div class="links">
              <ul>
                
                <li><a href="#">Details</a></li>
                <li><a href="signup.php" class="btn">Login</a></li>
                <li><a href="./dashboard.php" class="btn" style="display:none">Dashboard</a></li>
              </ul>
            </div> -->
            <div class="links">
                <ul>
                    <li><a href="#">Details</a></li>

                    <?php
                    // Check if the user is logged in or if a session is active
                    session_start();
                    if (isset($_SESSION['user_id'])) {
                        // User is logged in, display the Dashboard button
                        echo '<li><a href="./dashboard.php" class="btn">Dashboard</a></li>';
                    } else {
                        // User is not logged in, display the Login button
                        echo '<li><a href="signup.php" class="btn">Login</a></li>';
                        echo '<li><a href="signup.php" class="btn">Sign Up</a></li>';
                    }
                    ?>

                </ul>
            </div>

            <div class="overlay"></div>

            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </header>

        <div class="showcase-area">
          <div class="container">
            <div class="left">
              <div class="big-title">
                <h2>Clear Skin Starts Here, Say Hello to Healthy Skin</h2>
                <br>
                <div class="there">
                <h2>Click Photo for Acne Analysis </h2>
              </div>
              
              <p class="text">
                Our Model gives a detailed acne analysis with which we have most effective regimen for you.
              </p>
              <div class="there">
                <h2>Get Personalized Remedies and Diets </h2>
              </div>
              <p class="text">
                Our Model gives a detailed acne analysis with which we have most effective regimen for you.
              </p>
            </div>
             <!-- <div class="cta">
                <a href="#" class="btn">Get started</a>
              </div> -->
            </div>

            <div class="right">
              <img src="./img/person.jpg" alt="Person Image" class="person"  />
            </div>
          </div>
        </div>

        <div class="bottom-area">
          <div class="container">
            <button class="toggle-btn">
              <i class="far fa-moon"></i>
              <i class="far fa-sun"></i>
            </button>
          </div>
        </div>
      </div>
    </main>

    <!-- JavaScript Files -->

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="javascript/index.js"></script>
  </body>
</html>