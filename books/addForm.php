<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>ADD NEW BOOK</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand" href="../home.php">AWESOME LIBRARY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <label class="sr-only" for="Password">Name</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                </div>
                                <input id="Password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Sign In</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </nav>
</div>

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