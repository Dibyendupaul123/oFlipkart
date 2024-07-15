<?php
  include('MyMethods.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hello, world!</title>
    <style>
        .cn
        {
            margin-left: 40%;
            margin-top: 8%;
        }
    </style>
  </head>
  <body>
    <div class="bgimg">
    <div class="cn">
  <div class="card text-center" style="width: 300px;">
    <div class="card-header h5 text-white bg-primary">Password Reset</div>
    <div class="card-body px-5">
        <form action="" method="post">
            <div data-mdb-input-init class="form-outline">
                <input type="password" name="password" class="form-control my-3"placeholder="Enter password"/>
            </div>

            <div data-mdb-input-init class="form-outline">
                <input type="password" name="cpassword" class="form-control my-3"placeholder="Enter confirm password"/>
            </div>

            <button name="updatepassword" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary w-100">Reset password</button>
            <div class="d-flex justify-content-between mt-4">
                <a class="" href="userlogin.php">Login</a>
                <a class="" href="userreg.php">Register</a>
            </div>

            <?php
                if(isset($_POST['updatepassword']))
                {
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    if($password == $cpassword)
                    {
                      $res = updatePassword($password);

                      if($res == 1)
                      {
                        echo '
                        <script>
                        Swal.fire({
                          position: "middle",
                          icon: "success",
                          title: "password created successfully",
                          showConfirmButton: false,
                          timer: 2000

                          }).then((result) => {
                          /* Read more about handling dismissals below */
                          if (result.dismiss === Swal.DismissReason.timer) {
                           window.location.href="userlogin.php";
                          }
                        });                      
                        </script>
                        ';
                        //header("location:userlogin.php");
                      }
                      else{
                        echo "Somthing wrong, Try Again";
                      }
                    }
                    else{
                      echo "Password Not Matched, Try Again";
                    }
                    
                }
            ?>
        </form>
    </div>
</div>
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>