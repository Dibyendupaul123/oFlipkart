<?php
include('phpmailer/PHPMailerAutoload.php');
function dbconnect()
{
    $hostname="localhost";
    $username="root";
    $userpassword="";
    $dbname="tests";

    $conn=mysqli_connect($hostname,$username,$userpassword,$dbname);

    return $conn;
} 

//products section

    function uploadProduct($data)
    {
        $conn=dbconnect();

        $name = $data['name'];

        $price = $data['price'];

        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]); //uploads/hiphop.jpg

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
            {
                $sql = "insert into product(name,image,price) values('$name','$target_file','$price')";
                $response = mysqli_query($conn, $sql);

                if($response == 1)
                {
                    echo "Product has been uploaded & inserted successfully";
                }
                else
                {
                    echo "Not Inserted";
                }
            } 
            else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        //unlink('uploads/hiphop.jpg');

        function  updateproduct($data)
    {
        $conn=dbconnect();

        $id = $_GET['id'];
        $name = $data['name'];

        $price = $data['price'];

        if(!empty(($_FILES["image"]["name"])))
        {
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]); //uploads/hiphop.jpg

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
            {
                $imagepath = getpathbyid($id);
                unlink($imagepath);

                $sql ="update product set  name='$name',image='$target_file', price='$price' where id='$id'";
                $response = mysqli_query($conn, $sql);

                if($response == 1)
                {
                    echo "Product has been uploaded & inserted successfully";
                }
                else
                {
                    echo "Not Inserted";
                }
            } 
            else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        else
        {
            $sql ="update product set name='$name', price='$price' where id='$id'";

            $response = mysqli_query($conn, $sql);

            return $response;
        }
    }

    function getpathbyid($id)
    {
        $conn=dbconnect();

        $sql = "select * from product where id='$id'";

        $response = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($response);

        return $data['image'];
    }

    function delete($id)
    {
        $conn=dbconnect();

        $imagepath = getpathbyid($id);

        $sql = "delete from product where id='$id'";

        $response = mysqli_query($conn, $sql);

        if($response == 1)
        {
            unlink($imagepath);
        }

        return $response;
    }
//cart
    function getDataByProductId($id)
    {
        $conn = dbConnect();
        
        $sql = "select *from product where id='$id'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function getDataByEmail($email)
    {
        $conn = dbConnect();
        
        $sql = "select *from cart where email='$email'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    //..........x........

    function displayAllProducts()
    {
        $conn = dbConnect();

        $sql = "select * from product";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

  
   

    function countproducts()
    {
        $conn = dbconnect();
        $sql = "select *from product";
        $res = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($res);
        return $records;
    }

    function countusers()
    {
        $conn = dbconnect();
        $sql = "select *from user";
        $res = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($res);
        return $records;
    }
    function countcart()
    {
        if(isset($_SESSION['useremail']))
        {
            $email = $_SESSION['useremail'];
            $conn = dbconnect();
            $sql = "select *from cart where email='$email'";
            $res = mysqli_query($conn, $sql);
            $records = mysqli_num_rows($res);
            return $records;
        }
        
        
    }

    function countcartadmin()
    {
       
        $conn = dbconnect();
        $sql = "select *from cart";
        $res = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($res);
        return $records;
    }


    //user section
 
 function addcoustomer($data)
 {
    $username=$data['username'];
    $useremail=$data['useremail'];
    $userpassword=$data['userpassword'];

    $conn=dbconnect();

    $sql="insert into user(username,useremail,userpassword)values('$username','$useremail','$userpassword')";

    $response=mysqli_query($conn,$sql);

    return $response;
 }
 
    //getuserbyid
    function getuserbyemail($useremail)
    {
        $conn = dbconnect();

        $sql = "select *from user where useremail = '$useremail'";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }

    function getalluser()
    {
        $conn = dbConnect();

        $sql = "select * from user";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

     //deleteuser

     function deleteuseremail($useremail)
     {
         $conn = dbconnect();
 
         $sql = "delete from user where useremail = '$useremail'";
 
         $responce=mysqli_query($conn,$sql);
 
         return $responce;
     }

     function userdeletecart($cartid)
     {
         $conn = dbconnect();
 
         $sql = "delete from cart where cartid = '$cartid'";
 
         $responce=mysqli_query($conn,$sql);
 
         return $responce;
     }
     
    function addToCart($pid, $email)
    {
        $conn = dbConnect();
        $sql = "insert into cart(pid, email, quantity) values('$pid', '$email', 1)";
        
        $responce=mysqli_query($conn,$sql);

        return $responce;
    }

    function getallcartadmin()
    {
        $conn = dbConnect();

        $sql = "select * from cart";

        $response = mysqli_query($conn, $sql);

        return $response;
    }
 
    //loginuser
    function loginuser($data)
    {
    $useremail = $data['useremail'];
    $userpassword = $data['userpassword'];

     $conn = dbConnect();

     $sql = "select *from user where useremail = '$useremail' and userpassword = '$userpassword' ";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }

   //admin section

    
 function addadmin($data)
 {
    $adminname=$data['adminname'];
    $adminemail=$data['adminemail'];
    $adminpassword=$data['adminpassword'];

    $conn=dbconnect();

    $sql="insert into admin(adminname,adminemail,adminpassword)values('$adminname','$adminemail','$adminpassword')";

    $response=mysqli_query($conn,$sql);

    return $response;
 }
 
   
 function getalladmin()
 {
     $conn = dbConnect();

     $sql = "select * from admin";

     $response = mysqli_query($conn, $sql);

     return $response;
 }

    //deleteadmin

    function deleteadminemail($adminemail)
    {
        $conn = dbconnect();

        $sql = "delete from admin where adminemail = '$adminemail'";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }
 
    //loginadin
    function loginadmin($data)
    {
    $adminemail = $data['adminemail'];
    $adminpassword = $data['adminpassword'];

     $conn = dbConnect();

     $sql = "select *from admin where adminemail = '$adminemail' and adminpassword = '$adminpassword' ";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }


    function increaseCart($cartid)
    {
        $conn = dbConnect();

        $sql = "update cart set quantity=quantity+1 where cartid = '$cartid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function decreaseCart($cartid)
    {
        $conn = dbConnect();

        $sql = "update cart set quantity=quantity-1 where cartid = '$cartid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function deleteCartByCartId($cartid)
    {
        $conn = dbConnect();

        $sql = "delete from cart where cartid = '$cartid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function check($email)
    {
    //$useremail = $data['$useremail'];
    //$adminpassword = $data['adminpassword'];

     $conn = dbConnect();

     $sql = "select *from user where useremail = '$email' ";

    $responce=mysqli_query($conn,$sql);

    return $responce;
    }
    
    //Forget Password
    function sendOTP($email)
    {
        $response = check($email);

        $res = mysqli_num_rows($response);

        if($res==1)
        {

        $otp = random_int(100000, 999999);
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        $mail = new phpmailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'abirangshu.gc2@gmail.com';
        $mail->Password = 'rjhfogthqdvkdedh';

        $mail->setFrom('abirangshu.gc2@gmail.com','Shopping Site');
        $mail->addAddress($email);
        $mail->addReplyTo('abirangshu.gc2@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'OTP for Password Reset';
        $message = "";
        $message = $message."Hi, </b>.<br>Your OTP(One Time Password) is".$otp.". You can share this OTP to anyone.</i>";
        $mail->Body = $message;

        if($mail->send())
            return 1;
        else
            return 0;
        }
        else
        {
            echo "no email found <br>";
        }
    }

    function updatePassword($password)
    {
        session_start();
        $email = $_SESSION['email'];
        session_destroy();

        $conn = dbConnect();

        $sql = "update user set userpassword='$password' where useremail='$email'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }
?>