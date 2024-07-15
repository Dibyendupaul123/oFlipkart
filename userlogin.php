<?php
include('MyMethods.php');
ob_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .sek{
            padding:50px;
        }
    </style>
</head>
<body>
<!-- navbar -->

<?php
include('header.php');
?>

<form method="post" action="">
      <div class="padding">
      <h1  class="text-center">USER LOGIN</h1>

      <div class="sek" id="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email:</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="text" class="form-control"name="useremail" id="inlineFormInputGroupUsername" placeholder="Username">
    </div>
  </div>

  <div class="row mb-3">
    <label class="form-label">Password</label>
    <div class="col">
    <input type="password" class="form-control" name="userpassword" id="pass" placeholder="Enter Password">
    </div><br><br>

    <div class=" mb-3-col">
    <button type="submit" class="btn btn-success" name="login">login</button>
 
</div>

 
                    <?php
                        if (isset($_POST['login']))
                        {
                            $response = loginuser($_POST);

                            $res = mysqli_num_rows($response);

                                if($res > 0)
                                {
                                    //session_start();

                                    $_SESSION['useremail'] = $_POST['useremail'];

                                    header('location:index.php');
                                }
                                else
                                {
                                    echo "invaid login";
                                }
                        }
                        
                      ?>
                      <h6 style="color:black">New user?<a href="userreg.php">cerate account</a></h6>

                      <p style="color:black">forgot password?<a href="forgotpass.php"><b>CLICK</b> </a></p>
  </div>
  </div>
</from>

   <!-- Footer Start -->
   <?php
include('footer.php');
ob_end_flush();
?>
    <!-- Footer End -->
    
                   <!-- JavaScript Libraries -->
                   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>