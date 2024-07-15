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
</head>
<body>
<!-- navbar -->

<?php
include('header.php');

?>

<!-- navbar -->

<!-- card -->
<?php
//session_start();
if(!isset($_SESSION['useremail']))
{
    header('location:index.php');
}

?>


  
<div class="card-group p-5">
        
        <?php
            $email = $_SESSION['useremail'];

            $response =  getDataByEmail($email);

            $records = mysqli_num_rows($response);

            $total_amount = 0;

            if($records >0)
            {

                while($data = mysqli_fetch_assoc($response))
                {
                    $pid = $data['pid'];
                    $qty = $data['quantity'];

                    $response1 = getDataByProductId($pid);
                    $pdetails = mysqli_fetch_assoc($response1);

                    $amt = $pdetails["price"] * $qty;
                    $total_amount =  $total_amount + $amt;

                    echo '
                    <div class="q"style="width:200px;">
                    <div class="card mx-2 my-2">
                      <img src="'.$pdetails["image"].'" class="card-img-top" alt="..." name="image" style="height:150px;"><br>
                  
                      <p style="text-align:left;margin-left:20px" name="price">'.$pdetails["name"].'</p>
                     
                  
                      <div class="col-md-3 col-lg-5 d-flex"style="margin-left:22%;">
                   
                      <a href="decreaseitem.php?cartid='.$data["cartid"].'&qty='.$qty.'"><i class="fas fa-minus p-2 my-2"></i></a>
      
                      <b  class=" form-control form-control-lg ">'.$qty.'</b>
      
                     <a href="increaseitem.php?cartid='.$data["cartid"].'"> <i class="fas fa-plus p-2 my-2"></i></a>
                    
                     </div>
                     
                     <b class="mx-3 p-2">Rs. '.$amt.'</b>
                      
                      <button type="submit" class="btn btn-danger p-2" name="submit" onclick="cartid('.$data['cartid'].')">DELETE</button>
                    </div>
                    </div></br>
                       
                    ';
                  
                }
              
            }
            else
            {
                echo '
                    No Data Available....!!!!
                ';
            }
           
        ?>
        
        </div>
                    <div class="mx-5 p-2">
                        
                            <b>Total Amount:</b>

                            <b>Rs. <?php echo $total_amount; ?></b>

                           
                            <a href="" class="btn btn-warning mx-2">PAY NOW</a>
                       
                    </div>
<!-- card -->

<script>
        function cartid(cartid)
        {
            if(confirm("Are you sure to delete this record?"))
            {
              $.ajax
                ({
                    url:"userdelcart.php",
                    method: "get",
                    data: {"cartid": cartid},
                    success: function(response)
                    {
                    alert(response);
                    window.location.href = "";
                    }
                })
            }
        }
    </script>
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