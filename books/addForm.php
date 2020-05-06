<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>ADD NEW BOOK</title>
</head>
<body>
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <h3 class="text-primary">ADD NEW BOOK</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="add.php" method="POST">
            <h4 class="text-success">Please fill in new book's information</h4>
            <hr style="border-top:1px groovy #000;">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option value="1" selected>Available</option>
                    <option value="0">Unavailable</option>
                </select>
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-primary form-control" name="add">ADD YOUR BOOK</button>
            </div>
            <a href="display.php">Display books list</a>
        </form>
    </div>
</div>
</body>
</html>