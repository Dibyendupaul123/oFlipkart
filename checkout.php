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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      $id = $_GET['id'];
      $response = getDataByProductId($id);

      $records = mysqli_num_rows($response);

      $total_amount=0;

     


      if($records > 0)
      {
       
    $data = mysqli_fetch_assoc($response);
          {
            $amt = $data["price"];
            $total_amount =  $total_amount + $amt;

              echo '
              <div class="q"style="width:200px;border:5px solid yellow;">
                <div class="card mx-2 my-2">
                  <img src="'.$data["image"].'" class="card-img-top" alt="..." name="image" style="height:200px"><br>
                  
                  <p style="text-align:left;margin-left:20px;" name="price">'.$data["name"].'</p>
                  <p style="text-align:center;" name="price">'.$data["price"].' Rs.</p>
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
  

            <div class="mx-5 p-2">

                  

                    <h3>Enter Shipping Address : </h3> <br>
                    <textarea name="" id="shipping_address" cols="30" rows="3"></textarea> <br>

                    <h3>Select Mode of Payment</h3><br>
                    <select name="" id="mop">
                        <option value="">Select Payment Option</option>
                        <option value="cash">Cash</option>
                        <option value="online">Online</option>
                    </select>
                
                    <b>Total Amount:</b>

                    <b>Rs. <span id="total_amount"><?php echo $total_amount; ?></span></b>

                    
                    <a onclick="payNow()" class="btn btn-warning mx-2">PAY NOW</a>
                
            </div>

            </div>
        </div>
<!-- card -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
        function payNow()
        {
           
            var sa = document.getElementById('shipping_address').value;
            var mop = document.getElementById('mop').value;
            var tamt = document.getElementById('total_amount').innerHTML;
            
            if(sa=="")
            {
                alert('Anter Address');
            }
            else
            {
                if(mop == "cash")
            {
                Swal.fire({
                position: "middle",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 2000
                }).then((result) => {
                          /* Read more about handling dismissals below */
                          if (result.dismiss === Swal.DismissReason.timer) {
                           window.location.href=" index.php";
                          }
                        });   
            }

            else if(mop == "online")
            {
                var options = {
                        "key": "rzp_test_1UzBowbCdt8v2Y", // Enter the Key ID generated from the Dashboard
                        "amount": tamt*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Fruitables", //your business name
                        "description": "Place order",
                        "image": "https://cdn4.iconfinder.com/data/icons/logos-brands-in-colors/92/amazon-prime-logo-512.png",
                        "handler": function (response){
                            var tid = response.razorpay_payment_id
                            $.ajax
                                ({
                                    url:"",
                                    method: "post",
                                    data: { "sa": sa, "mop":mop, "tamt": tamt,  "status": "success"},
                                    success: function(response)
                                    {
                                        alert(response);
                                        window.location.href = "";
                                    }
                                })
                            //add data into 
                        }
                    };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
            else
            {
                alert('select Mode of Payment')
            }
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