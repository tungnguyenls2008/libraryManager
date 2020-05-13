<!DOCTYPE html>
<?php

session_start();
require '../conn.php';
if ($_SESSION['user']['role'] == 1): {
if (!isset($_SESSION['user'])) {
    header('location:index.php');
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
    <title>HOME</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style type="text/css">
    table.gridtable {
        width: auto;
        margin-left: auto;
        margin-right: auto;

        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }

    table.gridtable th {
        width: 1px;
        white-space: nowrap;
        margin-left: auto;
        margin-right: auto;
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }

    table.gridtable td {
        width: 1px;
        white-space: nowrap;
        margin-left: auto;
        margin-right: auto;
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
<body>


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
                    <a class="nav-link" href="../books/display.php">Books</a>
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
        <h3 class="text-primary">MAKE BORROW ORDER</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-2"></div>
        <div>
            <h3>Welcome!</h3>
            <?php
            $id = $_SESSION['user']['mem_id'];
            $sql2 = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
            $sql2->execute();
            $fetch = $sql2->fetch();
            ?>
            <div style="width: auto;
        margin-left: auto;
        margin-right: auto;">
                <h4><?php echo 'hi there ' . $fetch['firstname'] . " " . $fetch['lastname'] ?></h4></div>
            <h5>This form is for making book borrow orders, proceed with caution.</h5>
            <br/>
            <div style="display: inline-block;">
                <form method="post">

                    <table border="1px"

                    <tr>
                        <td>
                            <input type="number" name="user-id" placeholder="Search for ID"
                                   value="<?php echo (isset($_POST['user-id'])) ? $_POST['user-id'] : '' ?>">
                            <input type="submit" name="search" value="SEARCH ID">
                            <?php if (!empty($_REQUEST['user-id'])): {
                                $keyword = $_REQUEST['user-id'];
                                $sql = "SELECT * FROM `member` WHERE `mem_id` LIKE '%$keyword%' ";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                            } ?>
                                <table class="gridtable" border="1px">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Status</th>

                                </tr>

                                <?php foreach ($results as $key => $item): ?>
                                    <tr>
                                        <td><?php echo $item['mem_id'] ?></td>
                                        <td><?php echo $item['username'] ?></td>
                                        <td><?php if ($item['role'] == 1) {
                                                echo 'Admin';
                                            } else {
                                                echo 'Member';
                                            } ?>
                                        <td><?php if ($item['status'] == 0): ?>
                                                <p style="color: #1c7430">Active</p>
                                            <?php elseif ($item['status'] == 1): ?>
                                                <p style="color: #9A0000">Blocked</p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tr></table><?php endif; ?>
                        </td>
                        <td>
                            <input type="text" name="keyword" placeholder="Search for books"
                                   value="<?php echo (isset($_POST['keyword'])) ? $_POST['keyword'] : '' ?>">
                            <input type="submit" name="search" value="SEARCH BOOK">
                            <?php if (!empty($_REQUEST['keyword'])): {
                                $keyword = $_POST['keyword'];
                                $sql = "SELECT * FROM `books` WHERE `name` LIKE '%$keyword%'";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_ASSOC);

                            } ?>
                                <table class="gridtable" border="1px">
                                <tr>
                                    <th>Check</th>
                                    <th>Name</th>
                                    <th>Status</th>

                                </tr>

                                <?php foreach ($results as $key => $item): ?>
                                    <tr>
                                        <td><input type="checkbox" name="borrow-this" value="<?php echo $item['id'] ?>">
                                        </td>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php if ($item['status'] == 1) {
                                                echo '<p style="color: #00A000"> Available</p>';
                                            } else {
                                                echo '<p style="color: #9A0000">Unavailable</p>';
                                            } ?></td>

                                    </tr>
                                <?php endforeach; ?>


                                </table><?php endif; ?>
                        </td>
                    </tr>

                </form>
            </div>
            <table>
                <tr>
                    <td>
                        <a class="btn btn-primary mr-5"
                           href="borrow.php?user-id=<?php echo $_POST['user-id'] ?>&borrow-this=<?php echo $_POST['borrow-this'] ?>">MAKE
                            BORROW ORDER</a>
                    </td>
                    <td><a class="btn btn-primary mr-5" href="../home.php">Back to home</a></td>
                    <td><a class="btn btn-danger mr-5" href="../logout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<canvas id="myCanvas" width="1368px" height="768px" style="border:1px solid #d3d3d3;"></canvas>
<script src="../js/background.js"></script>
</body>
</html><?php } endif; ?>

