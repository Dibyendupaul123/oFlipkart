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
      .submit{
        text-decoration:none;
        color:#fff;
      }
    </style>
</head>
<body>
<!-- navbar -->

<?php
include('header.php');
?>

<!-- navbar -->

<!-- card -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/flipkart_slide3.png" class="d-block w-100"  style="height:50vh;">
    </div>
    <div class="carousel-item">
      <img src="img/flipkart_slide2.png" class="d-block w-100"  style="height:50vh;">
    </div>
    <div class="carousel-item">
      <img src="img/flipkart_slide1.png" class="d-block w-100"  style="height:50vh;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- card -->

<div class="card-group p-5">

<?php
      $response = displayAllProducts();

      $records = mysqli_num_rows($response);

      if($records > 0)
      {
         
          while($data = mysqli_fetch_assoc($response))
          {
              echo '
              <div class="q"style="width:200px;">
                <div class="card mx-2 my-2">
                  <img src="'.$data["image"].'" class="card-img-top" alt="..." name="image" style="height:200px"><br>
                  
                  <p style="text-align:left;margin-left:20px;" name="price">'.$data["name"].'</p>
                  <p style="text-align:center;" name="price">'.$data["price"].' Rs.</p>
              
                  <button type="submit" class="btn btn-light p-2" name="submit" onclick="addToCart('.$data["id"].')">Add To Card</button>
                  <a href="checkout.php?id='.$data["id"].'"class="btn btn-warning p-2">BY NOW</a></button>
                </div>
                </div><br>
              ';
             
          }
      }
      else
      {
          echo '
              <tr><th>No Data Available....!!!!</th></tr>
          ';
      }
  ?>
  
</div>

<script>
        function addToCart(id)
        {
          if(confirm("Are you sure to add this record?"))
            {
              $.ajax({
                url:"AddToCart.php",
                method: "get",
                data: {"id": id},
                success: function(response)
                {
                   alert(response);
                   //window.location.href = "index.php";
                
                   $.ajax({
                        url:"CountCart.php",
                        method: "get",
                        data: {},
                        success: function(response1)
                        {
                          //alert(response1);
                           document.getElementById('cartlist').innerHTML =(response1);
                        }

                      })
                }

              })
        }
      }
    </script>
<!-- card -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/flipkart_slide6.png" class="d-block w-100"  style="height:50vh;">
    </div>
    <div class="carousel-item">
      <img src="img/flipkart_slide5.png" class="d-block w-100"  style="height:50vh;">
    </div>
    <div class="carousel-item">
      <img src="img/flipkart_slide4.png" class="d-block w-100"  style="height:50vh;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- card -->


<!-- card -->
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