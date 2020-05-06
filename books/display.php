
<!DOCTYPE html>
<?php

session_start();
require '../conn.php';
if(!ISSET($_SESSION['book'])){
    header('location:../index.php');
}

$sql="SELECT * FROM `books` ";
$query = $conn->prepare( $sql );
$query->execute();
$results = $query->fetchAll( PDO::FETCH_ASSOC );

?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>REGISTERED BOOKS</title>
</head>
<body>
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <h3 class="text-primary">Registered Books</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h3>Welcome!</h3>
        <?php
        $id = $_SESSION['user']['mem_id'];
        $sql2 = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
        $sql2->execute();
        $fetch = $sql2->fetch();
        ?>
        <div style="text-align: center;"><h4><?php echo 'hi there '.$fetch['firstname']." ". $fetch['lastname']?></h4></div>
        <h5>This is a list of registered books, nothing important, really.</h5>
        <br />
        <div style="text-align: left;"><form method="post">
                <?php if ($_SESSION['user']['role'] == 1):?>
                <a class="btn btn-primary" href="addForm.php">ADD NEW BOOK</a><?php endif; ?>
                <table border="1px">
                    <tr>
                        <td>No.</td>
                        <td>Name</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </tr>

                    <?php foreach ($results as $key => $item): ?>
                        <tr>
                            <td><?php echo ++$key?></td>
                            <td><?php echo $item['name']?></td>
                            <td><?php if($item['status'] == 1){echo 'Available';}
                                else
                                {echo 'Unavailable';}?>
                            <td>
                                <?php if ($_SESSION['user']['role'] == 1):?>
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo $item['id']?>">Delete</a><br>
                                    <a class="btn btn-primary" href="updateForm.php?id=<?php echo $item['id']?>">Update</a>
                                <?php endif; ?>
                                <?php if ($_SESSION['user']['role']==0): ?>
                                <a class="btn btn-primary" href="borrow.php?id=<?php echo $item['id']?>">Borrow this book</a><br>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </form></div>
        <?php if ($_SESSION['user']['role'] == 1):?>
        <a class="btn btn-primary" href = "addRandomBook.php">Add random book</a><br><?php endif; ?>
        <a class="btn btn-danger" href = "../logout.php">Logout</a>
        <a class="btn btn-primary" href = "../home.php">Back to home</a>
    </div>
</div>
</body>
</html>