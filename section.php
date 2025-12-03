<?php 
include 'files/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sections</title>
</head>
<body>
    <main>
        <?php 
        @$section = $_GET['seaction'];
        @$query = "select * from product where pro_section = '$section' order by id desc ";
        @$result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result))
            {
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
            <a href="productDetails.php?id=<?php echo $row['id'];?>"><?php echo $row['pro_section']; ?></a>
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
            <select name="" id="" class="quantity" >
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div><br>

        <div class="submit">
            <a href=""><button class="addto_cart" type="submit" name="">Add To Cart &nbsp; <i class="fas fa-shopping-cart" style="color: #FFD43B;"></i></button></a>
        </div>

    </div>

        <?php
            }
        }else{
            echo '<div class="nothing">
                     <h1>Not Found Any Product In This Section..!</h1>
                  </div>';

   
        }
        ?>
    </main>
</body>
</html>