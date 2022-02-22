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

    <!-- fontawesome.com -->
    <script src="https://kit.fontawesome.com/49483eca4c.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="temp/stylef.css">
    <title>Search</title>
</head>

<body>
    <?php include 'temp/header.php'; ?>

    <div style="height: 10px; background: #27aae1; margin-top: 56px"></div>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-mid-12">
                    <h1><i class="fas fa-search" style="color: #27aae1"></i> Search</h1>
                </div>
            </div>
        </div>
    </header>
    <div style="height: 10px; background: #27aae1"></div>

    <div class="container my-3">
        <h1 style="color: #27aae1">Search results for "<?php echo $_GET["search"] ?>"</h1>
        <?php
            $noresult = true;
            $keyword = $_GET["search"];
            $sql = "SELECT * FROM books WHERE name LIKE '%$keyword%'";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                $bookId = $row['bookId'];
                $name = $row['name'];
                $author = $row['author'];
                $noresult = false;

                echo '<div class="result" style="display: inline-block">
                        <div class="col-md-4 my-2">
                        <div class="card" style="width: 17rem; margin-right: 5px;">
                        <img src="images/'.$bookId.'.jpeg" style="height: 300px; width: 202.5" class="card-img-top">
                        <div class="card-body" style="display: inline">
                            <p class="card-text"><b>Name: </b>'.$name.'</p>
                            <p class="card-text"><b>Author: </b>'.$author.'</p>
                            <a name="bookId" value="'.$bookId.'" href="search.php?bookId='.$bookId.'" class="btn btn-primary">Issue Book</a>
                            </div>
                        </div>
                        </div>
                    </div>';
            }

            if($noresult){
                echo '<div class="jumbotron jumbotron-fluid" style="color: #27aae1">
                <div class="cont">
                <p class="display-4">No results found</p>
                <p class="lead">Enter specific words</p>
                </div>
                </div>';
            }

            if (isset($_GET['bookId'])) {
                $bk_id=$_GET['bookId'];
                $_SESSION['bookId'] = $_GET['bookId'];

                $email = $_SESSION['email'];

                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');

                $sql = "INSERT INTO borrows VALUES('$email', $bk_id, '$date', NULL)";
                $result = mysqli_query($conn, $sql);

                echo "<script>alert('Issued successfully.')</script>";  
            }
    ?>

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