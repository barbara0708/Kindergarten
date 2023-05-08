<?php  include('functions.php');
    if(!isLoggedIn()||!isAdmin()){
        $_SESSION['msg'] = "You must log in first";
	    header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../src/style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <navbar class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img alt="big-logo.png" style="height:90%;width:30%;" src="../src/big-logo.png" />
                </a>
                <ul style="font-size: 23px;" class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="create_kid.php" class="nav-link px-2 text-secondary m-3">Add Kid</a>
                    </li>
                    <li>
                        <a href="create_user.php" class="nav-link px-2 text-danger m-3">Add User</a>
                    </li>
                    <li>
                        <a href="create_group.php" class="nav-link px-2 text-warning m-3">Add Classes</a>
                    </li>
                </ul>
                <div class="col-md-3 text-end">
                    <button style="font-size: 20px;" type="button" class="btn btn-success" name="logout"><a  style="color:white;" href="logout.php">Logout</a></button>
                </div>
            </div>
    </navbar>
    </body>
</html>