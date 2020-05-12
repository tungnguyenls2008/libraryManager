<!DOCTYPE html>
<?php

session_start();
require 'conn.php';
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}

$sql = "SELECT * FROM `member` ";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
//count members
$sqlMember = "SELECT COUNT(*) FROM `member`";
$queryMember = $conn->prepare($sqlMember);
$queryMember->execute();
$resultMemCount = $queryMember->fetch();
//count books
$sqlBook = "SELECT COUNT(*) FROM `books`";
$queryBook = $conn->prepare($sqlBook);
$queryBook->execute();
$resultBookCount = $queryBook->fetch();
?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>HOME</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <img style="width: 200px" src="img/logo.png" href="home.php">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users/display.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="books/display.php">Books</a>
                </li>
                <?php if ($_SESSION['user']['role'] == 1): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-black-50" type="button"
                           href="borrow/borrowForm.php" data-toggle="modal" data-target="#myModal">Make new borrow
                            oder</a>
                    </li><?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-black-50" type="button" href="logout.php" data-toggle="modal"
                       data-target="#myModal">LOGOUT</a>
                </li>
            </ul>
        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Customer Sign In</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form>
                            <label class="sr-only" for="usrname">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                       aria-describedby="basic-addon1">
                            </div>


                            <label class="sr-only" for="Password">Name</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                </div>
                                <input id="Password" type="password" class="form-control" placeholder="Password"
                                       aria-label="Password" aria-describedby="basic-addon2">
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </nav>
</div>


<div class="container" style="text-align: center">
    <div class="col-md-12 well" style="display: inline-block">
        <h3 class="text-primary">HOME</h3>
        <hr style="border-top:1px dotted #ccc;"/>

        <div>
            <h3>Welcome!</h3>
            <?php
            $id = $_SESSION['user']['mem_id'];
            $sql2 = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
            $sql2->execute();
            $fetch = $sql2->fetch();
            ?>
            <div style="text-align: center;">
                <h4><?php echo 'hi there ' . $fetch['firstname'] . " " . $fetch['lastname'] ?></h4></div>
            <div><p>There're currently <?php echo implode($resultMemCount)[0] . implode($resultMemCount)[1] ?> members
                    registered</p></div>
            <div><p>There're currently <?php echo implode($resultBookCount)[0] . implode($resultBookCount)[1] ?> books
                    registered</p></div>
            <a href="users/display.php" class="btn btn-primary">View users</a>
            <a href="books/display.php" class="btn btn-primary">View books</a>
            <?php if ($_SESSION['user']['role'] == 1): ?>
                <a href="borrow/borrowForm.php" class="btn btn-primary">Make borrow order</a>
                <a href="borrow/borrowHistory.php" class="btn btn-primary">View borrow history</a>
            <?php endif; ?>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>
<canvas id="myCanvas" width="1368px" height="768px" style="border:1px solid #d3d3d3;"></canvas>
<script src="js/background.js"></script>
</body>
</html>