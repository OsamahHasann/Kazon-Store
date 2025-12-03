   <?php 
   session_start();
   if (!isset($_SESSION['user_id']))
   {
      echo '<script>alert("Please login first to add the product to cart")
      window.location.href = "./User/login.php" </script>';
   }
   $user_id = $_SESSION['user_id'];
   if($user_id <= 0)
   {
     echo '<script>alert("unvalid User")
      window.location.href = "./User/login.php" </script>';
   }
 require 'files/header.php';
 
?>

<?php 
@$add = $_POST['add'];
if(isset($add)){
    @$id = $_GET['id'];
      
    @$add_pro = "select * from product where id ='$id' ";
    @$result_add_pro = mysqli_query($conn,$add_pro);
    @$row = mysqli_fetch_assoc($result_add_pro);

      @$name = $row['pro_name'];
      @$price = $row['pro_price'];
      @$img = $row['pro_img'];
      @$quantity = $_POST['quantity'];

     //التحقق اذا كان المنتج قد تمت اضافته الى السله او لا 
    @$add = "select * from cart where name ='$name' and user_id = '$user_id' ";
    @$result_add = mysqli_query($conn,$add);
    if(mysqli_num_rows($result_add) > 0)
    {
      echo '<script>alert("Already the product found in your cart ")</script>';
    }else{
        if($user_id > 0){
        $insert_cart = "insert into cart(name, price, img, quantity, product_id, user_id) 
                        values ('$name','$price','$img','$quantity', '$id', '$user_id')";
        if(mysqli_query($conn,$insert_cart)){
            echo '<script>alert("the added for cart is successfully ")</script>';
        }else{
            echo '<script>alert("the added for cart is failure ")</script>';
        }  
    }            
    }
}   
?>
<!--   DELETED PRODUCT FROM CART    -->
<?php 
@$cart_pro_id = $_GET['cart_pro_id'];
 if(isset($cart_pro_id)){
    @$query = "delete from cart where id='$cart_pro_id' and user_id = '$user_id' ";
    @$del = mysqli_query($conn,$query);
    if(isset($del))
    {
          echo '<script>alert("Deleted Successfully ")</script>'; 
    }else{
       echo '<script>alert("No Deleted ")</script>'; 
    }
 }
?>
<!--  //  DELETED PRODUCT FROM CART  //  -->




<!--  UPDATE PRODUCT FROM CART -->
  <?php 
  
  ?>
<!--  //  UPDATE PRODUCT FROM CART  // -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./admin/styleAdmin.css?v=2"> -->
    <title>Cart</title>
</head>
<style>
     *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
     }
     h3{
        font-family: arial,sans-serif;
        color: #e0e0e0;
     }
     body{
        font-family: arial,sans-serif;
        color: #ffd64f;
     }

    .update_btn{
    background-color: rgba(0, 255, 119, 0.349);
    color: #e0e0e0;
    border: none;
    width: 100px;
    height: 20px;
    margin-top: 10px;
    border-radius: 5px;
    cursor: pointer;
}
.delete_btn{
    background-color: rgba(255, 0, 0, 0.35);
    color: #e0e0e0;
    border: none;
    width: 100px;
    height: 20px;
    margin-top: 10px;
    border-radius: 5px;
    cursor: pointer;
}
    /*   CART STYLE   */
.complate{
    background-color: #ffd64f;
    width: 120px;
    height: 30px;
    border: none;
    border-radius: 15px;
    cursor: pointer;
    text-align: center;
    transition: transform 0.3s ease;
}
.complate a{
    color: #0d0d0d;
    text-decoration: none;
}
.complate a:hover{
    color: #e0e0e0;
}
.complate:hover{
    background-color: rgba(0, 255, 119, 0.349);
    color: #e0e0e0;
    transform: scale(1.1);
}
.cart_container{
    width: 80%;
    margin: 50px auto;
    padding: 20px;
}
.cont_head{
    padding: 5px;
    width: 100%;
    height: 100px;
}
.cont_head img{
    width: 70px;
    height: 70px;
    float: left;
    border-radius: 20px;
}
.cart_table{
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}
.cart_table th, td{
     padding: 15px;
     text-align: center;
     border: 1px solid #e0e0e0;
}
.cart_table img{
    width: 70px;
    height: 100px;

}
.cart_total #total{
    color: rgba(0, 255, 119, 0.349);
    font-size: large;
}
.cart_total h5{
    font-size: large;
}
/* //  CART STYLE  // */
</style>
<body>
    <div class="cart_container">

        <div class="cont_head">
           <img src="./logo_cart.jpg" alt=""> 
<?php  
    // @$user_id_for_cart = $_GET['$user_id_for_cart'];
    // echo $user_id_for_cart;
    @$user_pro = "select * from user where user_id ='$user_id' ";
    @$result_user_pro = mysqli_query($conn,$user_pro);
    @$row = mysqli_fetch_assoc($result_user_pro);
    // echo $row['user_name'];

    ?>       
           <h1>&nbsp;&nbsp;<?php echo $row['user_name']; ?></h1>
         
           <!-- <h1>ss</h1> -->
           <br>
        </div>

        <div class="table">
            <table class="cart_table">
                <tr>
                <th> Picture </th>
                <th> Id</th>
                <th> Name</th>
                <th> Quantity </th>
                <th> Price </th>
                <th> Total </th>
                <th> Product Id </th>
                <th> Deleted</th>
                </tr>


<?php 
        @$query = "select * from cart where user_id = '$user_id' ";
        @$result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result))
        {
?>

            <tr>
                
                <!-- img -->
                <td><img src="./uploads/img//<?php echo $row['img']; ?>" alt="">
                    </td>
                <!--  //  img  // -->
                <td><h3><?php echo $row['id']; ?></h3></td>
                <td><h3><?php echo $row['name']; ?></h3></td>
                <td><h3><?php echo $row['quantity']; ?></h3></td>
                <td><h3><?php echo $row['price']; ?></h3></td>
                <td><h3>$<?php echo number_format((int)$row['quantity'] * (int)$row['price'],2); ?></h3></td>
                <td><h3><?php echo $row['product_id']; ?></h3></td>

                <td><a href="./cart.php?cart_pro_id=<?php echo $row['id'] ?>"><button class="delete_btn" type="submit">Delete</button></a></td>
            </tr>

            <?php 
            @$total += (int)$row['quantity'] * (int)$row['price'];
        }  // close while
            ?>


            </table>

            <div class="cart_total">
                <h5><span id="total">The Total:</span> &nbsp; $<?php echo number_format(@$total,2); ?></h5><br>
                <button type="submit" class="complate"><a href="./User/login.php">Complit</a></button>
            </div>

        </div>
    </div>
</body>
</html>