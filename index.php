
   <?php 
   session_start();
   if (!isset($_SESSION['user_id']))
   {
      echo '<script>alert("Please login first to add the products to cart")
      window.location.href = "./User/login.php" </script>';
   }
   $user_id = $_SESSION['user_id'];
   if($user_id <= 0)
   {
     echo '<script>alert("unvalid User")
      window.location.href = "./User/login.php" </script>';
   }

//    $user_id_for_cart = $_GET['user_id'];
   ?>
   <?php 
//    include ('include/conected.php');
   include 'files/header.php';
   ?> 
    <!-------- PRODUCTS ------ -->
   <main>

   <?php 
    @$query = "select * from product";
        @$result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result))
        {
   ?>

    <div class="product">
        <div class="product_img">
            <a href="productDetails.php?id=<?php echo $row['id'];?>">
            <img src="./uploads/img//<?php echo $row['pro_img']; ?>" alt="">
            </a>

            <span class="unvailable" id="unvailable_text">
                <?php 
                echo $row['pro_unv']; 

            ?>
            
            </span>
            <a href=""></a> 
            
        </div>

        <div class="product_section">
            <a href="section.php?seaction=<?php echo $row['pro_section'];?>"><?php echo $row['pro_section']; ?></a>
        </div>

        <div class="product_name">
            <a href="productDetails.php?id=<?php echo $row['id'];?>"><?php echo $row['pro_name']; ?></a>
        </div>

        <div class="product_price">
            <a href="productDetails.php?id=<?php echo $row['id'];?>">Price: &nbsp; <?php echo $row['pro_price']; ?></a>
        </div>

        <div class="product_desctiption">
            <a href="productDetails.php?id=<?php echo $row['id'];?>">To More Details Click Here.. &nbsp;<i class="fa-regular fa-eye" style="color: #FFD43B;"></i></a>
        </div>
        <br>
        <div class="product_quantity">
         <!-- FORM  -->
          <form action="cart.php?id=<?php echo $row['id']; ?>" method="post">
            <select name="quantity" id="" class="quantity" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>

        </div><br>

        <div class="submit">
            <a href="">
                <button class="addto_cart" type="submit" name="add">Add To Cart &nbsp;
                 <i class="fas fa-shopping-cart" style="color: #FFD43B;"></i>
                </button>
            </a>
        </div>
          </form>
          <!-- // FORM // -->

    </div>

     <?php 
        }  // close while
            ?>

    <!-------- //  PRODUCTS //  ------ -->
   </main>
   <br><br><br><br>

    <?php 
   include 'files/footer.php';
   ?> 

