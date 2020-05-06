<?php
include '../conn.php';
$sql='SELECT * FROM books';
$stmt=$conn->query($sql);
$book=$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>UPDATE YOUR BOOK</title>
</head>
<body>
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <h3 class="text-primary">UPDATE YOUR BOOK</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="update.php?id=<?php echo $book['id'] ?>" method="POST">
            <h4 class="text-success">Please fill in book's information</h4>
            <hr style="border-top:1px groovy #000;">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $book['name'] ?>"/>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option value="1" <?php if ($book['status'] == 1): ?>
                        selected
                    <?php endif ?>>Available</option>
                    <option value="0" <?php if ($book['status'] == 0): ?>
                        selected
                    <?php endif ?>>Unavailable</option>
                </select>
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-primary form-control" name="add">UPDATE YOUR BOOK</button>
            </div>
            <a href="display.php">Display books list</a>
        </form>
    </div>
</div>
</body>
</html>