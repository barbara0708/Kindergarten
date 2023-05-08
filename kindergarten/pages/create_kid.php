<?php  include('functions.php');
    if(!isLoggedIn()||!isAdmin()){
        $_SESSION['msg'] = "You must log in first";
	    header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Create Kid</title>
  <link rel="stylesheet" href="../src/style.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<navbar class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img alt="logo.png" style="height:90%;width:30%;" src="../src/big-logo.png" />
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
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Create New Kid</h3>
              <form method="POST">

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="firstName">First Name</label>
                      <input type="text" id="firstName" name="firstN" class="form-control form-control-lg" />
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="lastName">Last Name</label>
                      <input type="text" id="lastName" name="lastN" class="form-control form-control-lg" />
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">

                    <div class="form-outline datepicker w-100">
                      <label for="birthdayDate" class="form-label">Birthday Year</label>
                      <input type="text" name="birthday" class="form-control form-control-lg" id="birthdayDate" />
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 d-flex align-items-center">

                    <div class="form-outline datepicker w-100">
                      <label for="startDate" class="form-label">Start Date</label>
                      <input type="date" name="startDate" class="form-control form-control-lg" id="startDate" />
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <label class="form-label" for="fParent">Parent</label>
                      <select name="idP" id="fParent" class="form-control form-control-lg">
                      <?php
                        while ($parent = mysqli_fetch_array(
                        $all_parents,MYSQLI_ASSOC)):;
                      ?>
                <option value="<?php echo $parent['id'];
                ?>">
                    <?php echo $parent['name'].' '.$parent['lastname'];
                    ?>
                  </option>
                  <?php
                    endwhile;
                    ?>

                      </select>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <label class="form-label" for="group">Groups</label>
                      <select name="idG" id="group" class="form-control form-control-lg">
                      <?php
                        while ($group = mysqli_fetch_array(
                        $all_groups,MYSQLI_ASSOC)):;
                      ?>
                <option value="<?php echo $group['id'];
                ?>">
                    <?php echo $group['name'];
                    ?>
                </option>
            <?php
                endwhile;
            ?>

                      </select>

                      </select>
                    </div>

                  </div>
                </div>
                <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="address">Home Address</label>
                    <input type="text" id="address" name="address" class="form-control form-control-lg" />
                  </div>

                </div>
                  <div class="col-md-6 mb-4 pb-2">

                    
                    <div class="form-outline">
                    <label class="form-label" for="address">PESEL</label>
                    <input type="text" id="pesel" name="pesel" class="form-control form-control-lg" />
                  </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                  <div class="mt-2">
                  <input class="btn btn-primary btn-lg" name="addKid" type="submit" value="Submit" />
                </div>
                  </div>
                  <div class="col-md-6 mb-4">
                  <div class="form-outline">
                      <?php
                        echo "<h2>".display_errors()."</h2>";
                      ?>
                    </div>
                  </div>
                </div>
                

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  


  <section class="vh-95">
    <div class="container py-4 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Create New Kid</h3>
              <form method="POST">

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <label class="form-label" for="kid">Groups</label>
                      <select name="kid_delete" id="kid" class="form-control form-control-lg">
                      <?php
                      $query="SELECT * FROM kids;";
                      $res=mysqli_query($db, $query);
                        while ($kid = mysqli_fetch_array(
                        $res,MYSQLI_ASSOC)):;
                      ?>
                <option value="<?php echo $kid['id'];
                ?>">
                    <?php echo $kid['name'].' '.$kid['lastname'];
                    ?>
                </option>
            <?php
                endwhile;
            ?>

                      </select>

                      </select>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                  <div class="mt-2">
                  <input class="btn btn-primary btn-lg" name="deleteKid" type="submit" value="Submit" />
                </div>
                  </div>
                  <div class="col-md-6 mb-4">
                  <div class="form-outline">
                      <?php
                        echo "<h2>".display_errors()."</h2>";
                      ?>
                    </div>
                  </div>
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