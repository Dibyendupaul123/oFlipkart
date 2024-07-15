<?php
    include('MyMethods.php');
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodDonor Admin</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
<?php
session_start();
if(!isset($_SESSION['adminemail']))
{
    header('location:index.php');
}

?>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <h1>ADMIN</h1>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="adminlog.php"><i class="fa fa-user fa-fw"></i>Login</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logoutadmin.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="img/deep.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong>Dibyendu Paul</strong></div>
                                <div class="user-text-online">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    
                    <li class="selected">
                        <a href="adminpanelindex.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fa fa-flask fa-fw"></i>Users</a>
                    </li>
                 
                    <li>
                        <a href="products.php"><i class="fa fa-flask fa-fw"></i>Products</a>
                    </li>
                    
                    <li>
                        <a href="orders.php"><i class="fa fa-flask fa-fw"></i>Orders</a>
                    </li>
                    
                    
                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

           


            <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-calendar fa-3x"></i>&nbsp;<b><?php echo countproducts();?> </b>Products 

                    </div>
                </div>
               
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-rss fa-3x"></i>&nbsp;<b><?php echo countcartadmin();?></b>Orders

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b><?php echo countusers();?></b>Users
                    </div>
                </div>
             
                <!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8">

        
                <h1 class="text-center">ADMIN</h1>
<table class="table table-dark table-striped p-5">
        <tr>
            <th>SNo.</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PASSORD</th>
            <th>Action</th>
        </tr>
        <?php
            $response = getalladmin();

            $records = mysqli_num_rows($response);

            if($records > 0)
            {
                $sno = 1;
                while($data = mysqli_fetch_assoc($response))
                {
                    echo '
                        <tr>
                            <td>'.$sno.'</td>
                            <td>'.$data["adminname"].'</td>
                            <td>'.$data["adminemail"].'</td>
                            <td>'.$data["adminpassword"].'</td>
                           
                            <td>
                            
                            <a href ="admindelete.php?adminemail='.$data["adminemail"].'"class="btn btn-danger">delete</a>
                            </td>
                        </tr> 
                    ';
                    $sno++;
                }
            }
            else
            {
                echo '
                    <tr>No Data Available....!!!!</tr>
                ';
            }
        ?>
        </div>
    </table>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <?php
    ob_end_flush();
    ?>

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
