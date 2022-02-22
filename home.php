<?php
  session_start();
  if (!isset($_SESSION['loggedin'])) {
      $_SESSION['loggedin'] = 0;
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- fontawesome.com -->
    <script src="https://kit.fontawesome.com/49483eca4c.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Library</title>
  </head>
  <body>
    <?php include 'temp/header.php'; ?>

      <!-- HEADER -->
      <div style="height: 10px; background: #27aae1; margin-top: 56px"></div>
      <header class="bg-dark text-white py-3">
          <div class="container">
              <div class="row">
                  <div class="col-mid-12">
                      <h1 style="text-align: center"><i class="fas fa-book" style="color: #27aae1"></i> LIBRARY MANAGEMENT SYSTEM</h1>
                  </div>
              </div>
          </div>
      </header>
      <div style="height: 10px; background: #27aae1"></div>
    <!-- HEADER END -->

   <?php
      include 'login.php';
    ?>
    
    <?php include 'temp/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>