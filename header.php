<nav class="navbar navbar-expand-lg navbar-blue bg-blue shadow sticky-top p-2">
  <div class="container-fluid">
    <img src="img/flip.png" alt="" width="30px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-5 mb-sm-0">

        <li>
        <form class=" nav-item d-flex mx-2">
          <input class="form-control ms-2 mt-2" type="search" placeholder="Search" aria-label="Search"style="height:40px;">
          <i class="fa-sharp fa-solid fa-magnifying-glass mx-1 btn btn-outline"style="margin-top:15px;"></i>
        </li>
      </ul>
   
    <div class="mrgn" style="margin-left:40%;">
      <div class="dropdown">

            <button class="btn btn-outline dropdown-toggle mt-2" type="button" id="bttn" data-bs-toggle="dropdown" aria-expanded="false">
            <i class=" bi-person custom-icon"style="color:black;"></i>
            </button>

          <ul class="dropdown-menu">

                  <?php
                  
                    session_start();
                    if(!isset($_SESSION['useremail']))
                      {
                          echo "<p style='margin-left:10px;'>no user found</p>";
                      }
                    else 
                      {
                        
                      $useremail = $_SESSION['useremail'];

                      $response = getuserbyemail($useremail);

                    if(mysqli_num_rows($response)>0)
                        {
                        $data = mysqli_fetch_assoc($response);
                        
                          echo
                            '<ul>
                                <li>'.$data["useremail"].'</li>
                                <li>'.$data["username"].'</li>
                                <a href="logoutuser.php"class="btn btn-danger">Log out</a>
                            <ul>';
                        }
                      }
                    
                  ?>
            </ul>
          </div>
        </div>
        <ul class="navbar-nav me-auto mb-sm-0">
          <li class="nav-item mt-2">
            <a class="nav-link active" aria-current="page" href="index.php"style="color:black;">Home</a>
          </li>
                    </ul>
        <?php
                  
                 // session_start();
                  if(!isset($_SESSION['useremail']))
                    {
                      echo'
                          <ul class="navbar-nav me-auto mb-sm-0">
                            
                            <li class="nav-item mx-2 mt-2">
                              <a class="nav-link" href="userlogin.php"> User Login</a>
                            </li>
                            <li class="nav-item mx-2 mt-2">
                              <a class="nav-link" href="adminlog.php">ADMIN PANEL</a>
                            </li>
                          </ul>';
                    }
                    ?>
       
        
          <a href="my_cart.php"><img src="img/cart.png" alt="" width="30px"><span id="cartlist">(<?php echo countcart();?>)</span></a>
    
      </div>
    </div>
  </form>
</nav>
