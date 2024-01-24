<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      $name = $_SESSION['name'];
      $email = $_SESSION['email'];
  } 
  else{
    echo"SESSION Does not exist";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css" />
  </head>
  <body>
    <main>
      <div class="big-wrapper light" style="padding-top: 0px;    padding-bottom: 0px; justify-content: flex-start">
        <img src="./img/shape.png" alt="" class="shape" />

        <header>
          <div class="container">
            <div class="logo">
              <img src="./img/logo.png" alt="Logo" />
              <a href="index.php"><h3>AcneCare</h3></a>
            </div>

            <div class="links">
              <ul>
                <li><a href="#">Details</a></li>
                <li><a href="include/logout.php" class="btn">Logout</a></li>
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
                    <br>
                    <div class="there">
                        <h2>Dashboard</h2>
                    </div>
                    
                    <!-- User Profile Section -->
                    <div class="user-profile">
                      <div class="user-icon" style="display: flex; justify-content: center; border: 2px solid #000; border-radius: 50%;">
                          <span><i class="fa-solid fa-user"></i></span>
                      </div>
                      <div class="user-details" style="margin-top: 0px; padding-top: 0px;">
                          <p class="user-name" style="margin-top: 15px; margin-bottom: 0px;"><?php echo $name;?></p>
                          <p class="user-email" style="margin-top: 0px; margin-bottom: 0px; text-transform: lowercase;"><?php echo $email;?></p>
                      </div>
                    </div>

                  <div class="card-container">
                 
                   <!-- Div 1 - Default Display -->
                  <div class="div-card" style="display: block;">
                  <div  class="div1-container" id="div1">
                    <div class="card">
                      <img src="./img/person1.jpg" alt="Avatar" style="width:100%">
                      <div class="container">
                        <button id="openButton" class="card-btn" onclick="showDiv2()">
                          <h4><b>Select Photo</b></h4>
                        </button>
                      </div>
                    </div>
                    <div class="card">
                      <img src="./img/statistics.jpg" alt="Avatar" style="width:100%">
                      <div class="container">
                        <button id="openButton" class="card-btn" onclick="showDiv3()">
                          <h4><b>Track Progress</b></h4>
                        </button>
                      </div>
                    </div>
                  </div>
                  </div>

                    <!-- div2 -->
                    <div id="div2" style="display: none;">
                      <form enctype="multipart/form-data" action="include/upload.php" method="post">
                          <button id="openCameraButton" class="btn">Open Camera</button>
                          <button id="takePhotoButton" style="display: none;" class="btn">Take Photo</button>
                          <input class="btn" type="file" name='image' accept="image/*" id="uploadImageInput" style="display: block;">
                          <input class="btn" type="submit" value="Upload">
                          <video id="cameraFeed" autoplay playsinline style="display: none;"></video>
                          <canvas id="photoCanvas" style="display: none;"></canvas>
                          <img id="capturedPhoto" alt="" style="display: block;">
                          <div id="resultstest"></div>
                      </form>
                      <a href="dashboard.php">
                        <button type="button" class="btn" style="color: #000000">BACK</button>
                      </a>

                    </div>

                    <!-- div3 -->
                    <div id="div3" style="display: none;">
                      <h3>Track Progress:</h3>
                      <div id="results">
                          <!-- Display basic info about detected acne here -->
                          <p>Date 1</p>
                          <p><strong>Type:</strong> Papule</p>
                          <p><strong>Location:</strong> Cheek</p>
                          <p><strong>Severity:</strong> Mild</p>
                          <p><strong>Home Remedies Recommendation:</strong> Use a gentle cleanser and consult a dermatologist for further evaluation.</p>
                          <p><strong>Diet Suggestion:</strong> Drink Water</p>
                      </div>
                      <div id="results">
                          <p>Date 2</p>
                          <p><strong>Type:</strong> Papule</p>
                          <p><strong>Location:</strong> Cheek</p>
                          <p><strong>Severity:</strong> Mild</p>
                          <p><strong>Home Remedies Recommendation:</strong> Use a gentle cleanser and consult a dermatologist for further evaluation.</p>
                          <p><strong>Diet Suggestion:</strong> Drink Water</p>
                      </div>
                      <a href="dashboard.php">
                        <button type="button" class="btn" style="color: #000000">BACK</button>
                      </a>
                    </div>
                  </div>

                <footer id="bottom-section"></footer>
            </div>
        </div>
    </main>
 

    <!-- JavaScript Files -->

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <!-- <script src="./dashboard.js"></script> -->
    <script src="javascript/dashboard.js"></script>
  </body>
</html>
