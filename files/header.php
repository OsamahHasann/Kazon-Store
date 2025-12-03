<?php
require ('../kazon_store/include/conected.php');  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=2">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  //  FONT AWESOME  // -->

    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Pacifico&family=Satisfy&display=swap" rel="stylesheet">
    
    <title>Home</title>
</head>
<body>
    <!-- ======= THE FLAOR DIV ========== -->
    <div class="flaor">
    <header>
        <!-- start logo -->
         <div class="logo">
            <h1>Kazon Store</h1>
         </div>
        <!-- //  start logo //  -->

        <!--  search bar   -->
           <div class="search">
            <div class="search_bar">
                <form action="search.php" method="get">
                    <input type="text" name="search_text" id="" class="search_input" placeholder="Enter to search...">
                    <button class="button_search" name="btn_search">Search</button>
                </form>
            </div>
           </div>
        <!-- //  search bar   //  -->
    </header>

    
     <nav>
        <!-- social -->
        <div class="social">
            <ul>
                <li><a href="http://" target="_blank" ><i class="fa-brands fa-facebook fa-beat" style="color: #3374e6;"></i></a></li>
                <li><a href="http://" target="_blank" ><i class="fa-brands fa-instagram fa-beat" style="color: #cd7de3;"></i></a></li>
                <li><a href="http://" target="_blank" ><i class="fa-regular fa-envelope fa-beat" style="color: #ffd64f;"></i></i></a></li>

            </ul>
        </div>
        <!--  //  social  // -->

        <!-- sections -->
        <div class="section"> 
          <ul>
            <li><a href="./index.php">Home</a></li>

             <?php
                @$query = "select * from section";
                @$result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>

            <li><a href="section.php?seaction=<?php echo $row['Section_name']; ?>" >
                <?php echo $row['Section_name']; ?>
            </a></li>

            <?php
                } // close while
            ?>

          </ul>
        </div>
        <!-- //  sections  // -->

     </nav>
    
     <!------- last_post ------>
    <div class="last_post">
        <h4>New added</h4>
        <ul>

         <?php 
    @$query = "select * from product order by id desc limit 2";
        @$result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result))
        {
         ?>

            <li><a href="productDetails.php?id=<?php echo $row['id']; ?>"><span class="span-img">
                <img src="./uploads/img//<?php echo $row['pro_img']; ?>" alt="">
                </span></a>
            </li>

             <?php 
        }  // close while
            ?>

        </ul>

        <!-- cart -->

        <?php 
        @$cont = "select * from cart where user_id = '$user_id' ";
        @$result = mysqli_query($conn,$cont);
       if ($result)
       {
        $row_count = mysqli_num_rows($result);
       }else{
        $row_count = 0;
       }
        ?>
         <div class="cart">
            <ul>
               <li class="cart-icon"><a href="cart.php"><i class="fas fa-shopping-cart" style="color: #FFD43B;"></i></a>
                <span class="cart-count"><?php echo $row_count; ?></span></li>
                <li><a href="User/logout.php"><i class="fa-solid fa-user" style="color: #FFD43B;"></i></a></li>
            </ul>
         </div>
        <!--  // cart  //  -->

    </div>
    <!-------//  last_post // ------>
