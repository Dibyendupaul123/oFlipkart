
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
    <div class="card-header h5 text-white bg-primary">otp validation</div>
    <div class="card-body px-5">
        <form action="" method="post">
            <div data-mdb-input-init class="form-outline">
                <input type="number" name="userotp" class="form-control my-3" placeholder="otp"/>
            </div>
            <button name="verify" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary w-100">Verify</button>
            <div class="d-flex justify-content-between mt-4">
                <a class="" href="userlogin.php">Login</a>
                <a class="" href="userreg.php">Register</a>
            </div>

            <?php
                $i = 1;
                session_start();
                if(isset($_SESSION['i']))
                {
                    $i = $_SESSION['i'];
                    
                }
                else{
                    $_SESSION['i'] = 1;
                    
                }
                if(isset($_POST['verify']))
                {
                    $userotp = $_POST['userotp'];

                    $otp = $_SESSION['otp'];

                    if($userotp == $otp)
                    {
                        echo '
                        <script>
                        let timerInterval;
                        Swal.fire({
                          title: "verification completed",
                          html: "please wait a minute",
                          timer: 2000,
                          timerProgressBar: true,
                          didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                              timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                          },
                          willClose: () => {
                            clearInterval(timerInterval);
                          }
                        }).then((result) => {
                          /* Read more about handling dismissals below */
                          if (result.dismiss === Swal.DismissReason.timer) {
                           window.location.href=" resetuserpass.php";
                          }
                        });                            
                        </script>
                        ';
                        //header('location: resetuserpass.php');
                    }
                    else{
                        if($i == 3)
                        {
                            unset($_SESSION['otp']);
                            unset($_SESSION['i']);
                            header('location: userlogin.php?error=1');
                        }
                        else{                           
                            echo "<p class='up' style='color:red;'>OTP not matched, Try Again ". (3-$i). " left more</p>";
                            $i++;
                            $_SESSION['i'] = $i;
                        }
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