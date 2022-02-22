<?php
    session_start();
    include 'config/dbconnect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/49483eca4c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="stylef.css"> -->
    <title>Profile</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <?php include 'temp/header.php'; ?>
    <!-- NAVBAR END -->

    <div style="height: 10px; background: #27aae1; margin-top: 56px"></div>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-mid-12">
                    <h1><i class="fas fa-address-card" style="color: #27aae1"></i> About</h1>
                </div>
            </div>
        </div>
    </header>
    <div style="height: 10px; background: #27aae1"></div>

    <div class="about-section">
      <h4>We are the Third Year students of Information Technology Department.</h4>
    </div>

    <h2 style="text-align:center; margin-top: 20px">Our Team</h2>
    <div class="row">
      <div class="column">
        <div class="card">
          <!-- <img src="/w3images/team1.jpg" alt="Jane"> -->
          <div class="container">
            <h2>Soham Pagi</h2>
            <p>sohampagi@gmail.com</p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <!-- <img src="/w3images/team2.jpg" alt="Mike"> -->
          <div class="container">
            <h2>Sejal Naik</h2>
            <p>naiksejal13@gmail.com</p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <!-- <img src="/w3images/team3.jpg" alt="John"> -->
          <div class="container">
            <h2>Shivam Naik</h2>
            <p>naikshivam321@gmail.com</p>
          </div>
        </div>
      </div>

    <div class="column">
        <div class="card">
          <!-- <img src="/w3images/team3.jpg" alt="John"> -->
          <div class="container">
            <h2>Pratham Natekar</h2>
            <p>prathamnatekar@yahoo.in</p>
          </div>
        </div>
      </div>
    </div>

    <?php include 'temp/footer.php'; ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>