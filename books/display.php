<!DOCTYPE html>
<?php

session_start();
require '../conn.php';
if (!isset($_SESSION['book'])) {
    header('location:../index.php');
}

$sql = "SELECT * FROM `books` ";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>REGISTERED BOOKS</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        function resize_canvas(){
            var canvas = document.getElementById("myCanvas");
            if (canvas.width  < window.innerWidth)
            {
                canvas.width  = window.innerWidth;
            }

            if (canvas.height < window.innerHeight)
            {
                canvas.height = window.innerHeight;
            }
        }
    </script>
</head>
<style type="text/css">
    table.gridtable {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }

    table.gridtable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }

    table.gridtable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
<body onscroll="resize_canvas()">


<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <img style="width: 200px" src="../img/logo.png" href="home.php">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../users/display.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display.php">Books</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" type="button" href="../logout.php"
                       data-toggle="modal" data-target="#myModal">LOGOUT</a>
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
        <h3 class="text-primary">Registered Books</h3>
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
            <h5>This is a list of registered books, nothing important, really.</h5>
            <?php if ($_SESSION['user']['status']==0):{ ?>
            <br/>
            <div style="text-align: center;">
                <form method="post">
                    <a class="btn btn-secondary" href="searchResult.php">SEARCH</a>
                    <?php if ($_SESSION['user']['role'] == 1): ?>
                        <a class="btn btn-primary" href="addForm.php">ADD NEW BOOK</a><?php endif; ?>
                    <?php if ($_SESSION['user']['role'] == 1): ?>
                        <a class="btn btn-primary" href="addRandomBook.php">Add random book</a><?php endif; ?>
                    <a class="btn btn-danger" href="../logout.php">Logout</a>
                    <a class="btn btn-primary" href="../home.php">Back to home</a>
                    <table class="gridtable" border="1px" style="margin: auto">
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                        <?php foreach ($results as $key => $item): ?>
                            <tr>
                                <td><?php echo ++$key ?></td>
                                <td><?php echo $item['id'] ?></td>
                                <td><a href="profile.php?id=<?php echo $item['id'] ?>"> <?php echo $item['name'] ?></a></td>
                                <td><?php if ($item['status'] == 1) {
                                        echo '<p style="color: #00A000"> Available</p>';
                                    } else {
                                        echo '<p style="color: #9A0000">Unavailable</p>';
                                    } ?>
                                <td>
                                    <?php if ($_SESSION['user']['role'] == 1): ?>
                                        <a class="btn btn-danger"
                                           href="delete.php?id=<?php echo $item['id'] ?>">Delete</a><br>
                                        <a class="btn btn-primary" href="updateForm.php?id=<?php echo $item['id'] ?>">Update</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['user']['role'] == 0): ?>
                                        <a class="btn btn-primary"
                                           href="../borrow/borrowForm.php?id=<?php echo $item['id'] ?>">Borrow this
                                            book</a><br>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>
<?php }else : echo "You're blocked from reaching this information, please contact site admin for details.";endif; ?>

<canvas id="myCanvas" width="1368px" height="768px" style="border:1px solid #d3d3d3;"></canvas>
<script src="../js/background.js"></script>
</body>
</html>