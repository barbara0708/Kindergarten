<?php  include('functions.php');
    if(!isLoggedIn()||!isAdmin()){
        $_SESSION['msg'] = "You must log in first";
	    header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Group</title>
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
                        <a href="create_group.php" class="nav-link px-2 text-warning m-3">Add Group</a>
                    </li>
                </ul>
                <div class="col-md-3 text-end">
                    <button style="font-size: 20px;" type="button" class="btn btn-success" name="logout"><a  style="color:white;" href="logout.php">Logout</a></button>
                </div>
            </div>
    </navbar>
    <section class="vh-95">
    <div class="container py-4 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add New Group To Database</h3>
              <form method="POST">

                <div class="row">
                  <div class="col-md-9 mb-4 d-flex align-items-center">

                    <div class="form-outline datepicker w-100">
                      <label for="group" class="form-label">Group Name</label>
                      <input type="text" name="group" class="form-control form-control-lg" id="group" />
                    </div>

                  </div>
                  
                </div>
                <div class="row">
                <div class="col-md-10 mb-2 d-flex align-items-center">

                <div class="form-outline datepicker w-100">
                      <label for="fTeacher" class="form-label">Teacher</label>
                      <select name="idTeacher" id="fTeacher" class="form-control form-control-lg">
                      <?php
                        while ($teacher = mysqli_fetch_array(
                        $all_teachers,MYSQLI_ASSOC)):;
                      ?>
                <option value="<?php echo $teacher['id'];
                ?>">
                    <?php echo $teacher['name'].' '.$teacher['lastname'];
                    ?>
                  </option>
                  <?php
                    endwhile;
                    ?>

                      </select>                </div>

                </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <?php
                        echo "<h2>".display_errors()."</h2>";
                      ?>
                    </div>

                  </div>
                </div>

                <div class="mt-2">
                  <input class="btn btn-primary btn-lg" name="addGroup" type="submit" value="Submit" />
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    </body>
</html>