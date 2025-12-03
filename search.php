<?php 
 include 'files/header.php';
?>

<?php 
@$btn_search = $_GET['btn_search'];
@$search_text = $_GET['search_text'];
if(isset($btn_search))
{
   $query = " select * from product 
   where pro_name like '%$search_text%' or 
   pro_descrip like '%$search_text%' or
   pro_img like '%$search_text%' or
   pro_price like '%$search_text%' or
   pro_section like '%$search_text%' or
   pro_size like '%$search_text%' or
   pro_unv like '%$search_text%'
   ";

   $result = mysqli_query($conn,$query);

   if(mysqli_num_rows($result) > 0)
   {
     while($row = mysqli_fetch_assoc($result))
     {
       ?>

 <div class="product">
        <div class="product_img">
            <img src="./uploads/img//<?php echo $row['pro_img']; ?>" alt="">

            <span class="unvailable" id="unvailable_text">
                <?php 
                 echo $row['pro_unv']; 

             ?>
             
            </span>
            <a href=""></a>
            
        </div>

        <div class="product_section">
            <a href=""><?php echo $row['pro_section']; ?></a>
        </div>

        <div class="product_name">
            <a href=""><?php echo $row['pro_name']; ?></a>
        </div>

        <div class="product_price">
            <a href="">Price: &nbsp; <?php echo $row['pro_price']; ?></a>
        </div>

        <div class="product_desctiption">
            <a href="productDetails.php">To More Details Click Here.. &nbsp;<i class="fa-regular fa-eye" style="color: #FFD43B;"></i></a>
        </div>
        <br>
        <div class="product_quantity">
            <select name="" id="" class="quantity" >
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>

        <div class="submit">
            <a href=""><button class="addto_cart" type="submit" name="">Add To Cart &nbsp; <i class="fas fa-shopping-cart" style="color: #FFD43B;"></i></button></a>
        </div>

    </div>


<?php  
     }
   }else{
echo '<div class="nothing">
<h1>the product not found</h1>
</div>';

   }
}
?>

<?php 
include 'files/footer.php';
?> 