<?php
include('functions.php');
if(!isLoggedIn()&&!isTeacher()){
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Teacher Page</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../src/style.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <navbar class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img alt="big-logo.png" style="height:90%;width:30%;" src="../src/big-logo.png" />
                </a>
                <ul style="font-size: 23px;" class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="teacher_page.php" class="nav-link px-2 text-secondary m-3">Kids Information</a>
                    </li>
                                    </ul>
                <div class="col-md-3 text-end">
                    <button style="font-size: 20px;" type="button" class="btn btn-success" name="logout"><a  style="color:white;" href="logout.php">Logout</a></button>
                </div>
            </div>
    </navbar>
    <section>
  <div class="container py-5">
    
  <div class="row ml-5" >
  <?php
             while($row=mysqlI_fetch_array($kids_teacher)):;?>
      
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
          
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 font-weight-bold">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text mb-0" id="fName" ><?php echo $row['first_name']." ".$row['last_name']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 font-weight-bold">Group Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text mb-0" id="gr"><?php 
                $id_group=$row['id_gr'];
                $query_kid_group="SELECT name from groups where id='$id_group'";
                $res=mysqli_query($db,$query_kid_group);
                $group=mysqli_fetch_array($res);
                echo $group['name'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 font-weight-bold">Birthday Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text mb-0" id="birthday"><?php echo strval($row['birthday']); ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 font-weight-bold">PESEL</p>
              </div>
              <div class="col-sm-9">
                <p class="text mb-0" id="birthday"><?php echo strval($row['pesel']); ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 font-weight-bold">Home Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text mb-0" id="address"><?php echo $row['address']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 font-weight-bold">Start Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text mb-0" id="start"><?php echo strval($row['date_start']); ?></p>
              </div>
            </div>
       
          </div>
        </div>

  </div>
  <?php
                    endwhile;
                    ?>


</section>
</body>

</html>