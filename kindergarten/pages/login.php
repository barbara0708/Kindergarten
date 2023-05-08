<?php  include('functions.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../src/style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
          
            <div class="row">
              <div class="col-sm-6 text-black">
          
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                  <form style="width: 23rem;" method="post" action="">
                  <a href="index.html" class="pb-5" >
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 
  4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a>
                    <h1 class="fw-normal mt-5 mb-3 pb-3" style="letter-spacing: 1px;">Log in</h1>
                    <div class="form-outline mb-4">
                      <label class="form-label h-2" for="email">Email address</label>
                      <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="pass">Password</label>
                      <input type="password" name="pass" id="pass" class="form-control form-control-lg" />
                    </div>
                    <div class="pt-1 mb-4">
                      <button class="btn btn-info btn-lg btn-block" type="submit" name="login">Login</button>
                    </div>
        
                    <div class="pt-1 mb-4">
                    <?php 
                    echo display_errors();
                    ?>
                    </div>
                  </form>
                  
                </div>
        
              </div>
              <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="../src/pexels-yan-krukau-8612974.jpg"
                  alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
              </div>
            </div>
          </div>
    </body>
</html>