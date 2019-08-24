<?php 
    session_start();
    if (isset($_SESSION['user']) and $_SESSION['user']!="")
    {
        header ("Location: http://192.168.43.171/single_bin.php");
    }
?>

<html>
    <head>
        <title>FUSION | Console</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>


    <body style="background: url('background.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="container-fuid" style="display: block;">
            <div class="row">
                <div class="col-lg-6"  style="margin-top: 100px;">
                <center><img src="fusion_logo.png" width="80%" alt="Fusion Logo Here"></center>
                </div>
                <div class="col-lg-6" style="margin-top: 100px;">
                <center>
                <div class="card col-lg-8" >

  <h5 class="card-header bg-primary text-center py-4">
    <strong><b>Sign in</b></strong>
  </h5><br><br>
  

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" style="color: #757575;" action="login.php" method="post">

      <!-- Email -->
      <div class="md-form">
      <label for="materialLoginFormEmail"><b>Username</b></label>
        <input type="text" name="user" id="materialLoginFormEmail" class="form-control">
        
      </div>
        <br>
      <!-- Password -->
      <div class="md-form">
      <label for="materialLoginFormPassword"><b>Password</b></label>
        <input type="password" name="pass" id="materialLoginFormPassword" class="form-control">
        
      </div>

      <br><br>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="subbtn"><b>Sign in</b></button>


      

    </form>
    <!-- Form -->
    <br>
  </div>

</div>
                </center>
                </div>
            </div>
        </div>
    </body>
</html>
