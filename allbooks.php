<?php
    session_start();
    if($_SESSION['loggedin'] == 0) {
        echo "<script>alert('Please login!')</script>";
        echo "<script>window.location.replace('home.php')</script>";
    }

    include 'config/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- fontawesome.com -->
    <script src="https://kit.fontawesome.com/49483eca4c.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>All Books</title>
</head>

<body>
    <?php include 'temp/header.php'; ?>
    <!-- HEADER -->
    <div style="height: 10px; background: #27aae1; margin-top: 56px"></div>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-mid-12">
                    <h1><i class="fas fa-book" style="color: #27aae1"></i> All Books</h1>
                </div>
            </div>
        </div>
    </header>
    <div style="height: 10px; background: #27aae1"></div>
    <!-- HEADER END -->
    <div class="container my-3">
        <?php
            $sql = "SELECT * FROM books";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $bookId = $row['bookId'];
                $name = $row['name'];
                $author = $row['author'];

                echo '<div class="result" style="display: inline-block">
                        <div class="col-md-4 my-2">
                        <div class="card" style="width: 17rem; margin-right: 5px;">
                        <img src="images/'.$bookId.'.jpeg" class="card-img-top" style="height: 300px; width: 202.5">
                        <div class="card-body" style="display: inline">
                            <p class="card-text"><b>Name: </b>'.$name.'</p>
                            <p class="card-text"><b>Author: </b>'.$author.'</p>
                            <a name="bookId" value="'.$bookId.'" href="allbooks.php?bookId='.$bookId.'" class="btn btn-primary">Issue Book</a>
                            </div>
                        </div>
                        </div>
                    </div>';
            }

            if (isset($_GET['bookId'])) {
                $bk_id=$_GET['bookId'];
                // echo "$bk_id";
                $_SESSION['bookId'] = $_GET['bookId'];

                $email = $_SESSION['email'];

                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');

                $sql = "INSERT INTO borrows VALUES('$email', $bk_id, '$date', NULL)";
                $result = mysqli_query($conn, $sql);

                echo "<script>alert('Issued successfully.')</script>";
                echo "<script>window.location.replace('myprofile.php')</script>";
            }
        ?>
    </div>
    

    <?php include 'temp/footer.php'; ?>


    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>