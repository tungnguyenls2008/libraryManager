<?php
session_start();
include '../conn.php';
$bookID = $_REQUEST['id'];
$sql = "SELECT * FROM books WHERE `id`='$bookID' ";
$stmt = $conn->query($sql);
$book = $stmt->fetch();

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="../css/bookProfile.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>

<body>


<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="https://edit.org/images/cat/book-covers-big-2019101610.jpg" /></div>
                    </div>


                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $book['name'] ?></h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 comments</span>
                    </div>
                    <p class="price">Description: <span><?php echo $book['description'] ?></span></p>
                    <h4 class="price">Author: <span><?php echo $book['author'] ?></span></h4>
                    <h4 class="price">Category: <span><?php echo $book['category'] ?></span></h4>
                    <h2 class="price">BOOK ID: <span><?php echo $book['id'] ?></span></h2>
                    <h4 class="price">Status: <span><?php if ($book['status'] == 1) {
                                echo '<p style="color: #00A000"> Available</p>';
                            } else {
                                echo '<p style="color: #9A0000">Unavailable</p>';
                            } ?></span></h4>
                    <p class="vote"><strong>91%</strong> of readers enjoyed this book! <strong>(87 votes)</strong></p>
                    <?php if ($_SESSION['user']['role'] == 1): ?>
                        <a class="btn btn-danger" style="size: A3"
                           href="delete.php?id=<?php echo $book['id'] ?>">Delete</a><br>
                        <a class="btn btn-primary" style="size: A3" href="updateForm.php?id=<?php echo $book['id'] ?>">Update</a>
                    <?php endif; ?>
                    <a href="display.php" class="btn btn-primary" style="size: A3">Back to book list</a>
                </div>
            </div>
        </div>
    </div>
</div>
<canvas id="myCanvas" width="1368px" height="768px" style="border:1px solid #d3d3d3;"></canvas>
<script src="../js/background.js"></script>
</body>
</html>
