`<?php
include('MyMethods.php');
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
        .padding{
            padding: 50px;
        }
    </style>
</head>
<body>
<!-- navbar -->


 <?php
        $id = $_GET['id'];

        $res =  getDataByProductId($id);

        $data = mysqli_fetch_assoc($res);
    ?>
<!-- navbar -->
<form method="post" action="" enctype="multipart/form-data">
        <div class="padding">

        <div class="mb-3">
        Id <input type="text" name="price" id="price" value="<?php echo $data["id"]?>" readonly><br>
            </div>

            <div class="mb-3">
        Enter name : <input type="text" name="name" id="name" value="<?php echo $data["name"]?>"><br>
            </div>

        <div class="mb-3">
        Enter Price : <input type="text" name="price" id="price" value="<?php echo $data["price"]?>"><br>
            </div>

            <div class="mb-3">
            <img src="<?php echo $data['image']?>"  style="width:20%;" alt="">
            
            <input class="form-control" type="file" name="image"id="formFile" required>
            </div>

            <div class=" mb-3-col">
                <button type="submit" class="btn btn-success" name="update">update</button>
            </div>
            </div>
</form>
 <?php
        if(isset($_POST['update']))
        {
            $response = updateproduct($_POST);

          return $response;
        }
    ?>
<!-- card -->
       <!-- Footer Start -->
       
<?php
include('footer.php');
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