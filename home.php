<!DOCTYPE html>
<?php

	session_start();
    require 'conn.php';
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
	}

$sql="SELECT * FROM `member` ";
$query = $conn->prepare( $sql );
$query->execute();
$results = $query->fetchAll( PDO::FETCH_ASSOC );
//count members
$sqlMember="SELECT COUNT(*) FROM `member`";
$queryMember=$conn->prepare($sqlMember);
$queryMember->execute();
$resultMemCount=$queryMember->fetch();
//count books
$sqlBook="SELECT COUNT(*) FROM `books`";
$queryBook=$conn->prepare($sqlBook);
$queryBook->execute();
$resultBookCount=$queryBook->fetch();
?>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <title>HOME</title>
    </head>
<body>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">HOME</h3>
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
            <div><p>There're currently <?php echo implode($resultMemCount)[0].implode($resultMemCount)[1] ?> members registered</p></div>
            <div><p>There're currently <?php echo implode($resultBookCount)[0].implode($resultBookCount)[1] ?> books registered</p></div>
			<!--<h5>This is a list of registered user, nothing important, really.</h5>
			<br />
			<div style="text-align: left;"><form method="post">
                <table border="1px">
                    <tr>
                        <td>STT</td>
                        <td>Username</td>
                        <td>Role</td>
                        <td>Actions</td>
                    </tr>

                    <?php /*foreach ($results as $key => $item): */?>
                    <tr>
                        <td><?php /*echo ++$key*/?></td>
                        <td><?php /*echo $item['username']*/?></td>
                        <td><?php /*if($item['role'] == 1){echo 'Admin';}
                            else
                                {echo 'Member';}*/?>
                        <td>
                            <?php /*if ($_SESSION['user']['role'] == 1):*/?>
                            <a href="users/delete.php?id=<?php /*echo $item['mem_id']*/?>">Delete</a><br>
                                <a href="users/makeAdmin.php?id=<?php /*echo $item['mem_id']*/?>">Make Admin</a>
                            <?php /*endif; */?>
                        </td>
                    </tr>
                    <?php /*endforeach;*/?>
                </table>
                </form></div>

			<a href = "users/addRandomUser.php">Add random user</a>
			<a href = "logout.php">Logout</a>-->
            <a href="users/display.php" class="btn btn-primary">View users</a>
            <a href="books/display.php" class="btn btn-primary">View books</a>
		</div>
	</div>
</body>
</html>