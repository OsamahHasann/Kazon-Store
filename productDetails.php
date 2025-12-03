<?php 
include 'files/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<style>
  .container{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    justify-items: center;
    width: 90%;
    height: auto;
    margin: 20px auto;
    border-radius: 8px;
    color: #e0e0e0;
  }  
  .product_img{
    display: flex;
    width: 300px;
    flex-wrap: wrap;
    margin-bottom: 20px;

  }
  .product_img img{
    width: 100%;
    height: 400px;
    margin-bottom: 20px;
  }
  .product_details{
    width: 600px;
    height: 400px;
    text-align: center;
    font-size: 20px;
    padding: 10px 10px;
    margin-top: 30px;
  }
  .product_details a{
    text-decoration: none;
  }
  .product_title{
    margin: 5px 0;
    color: #FFD43B;

  }
  .product_price{
    margin: 10px 0;
  }
  .product_description{
    font-size: 16px;
    line-height:1.5 ;
  }
  .product_details p{
    margin: 10px;
  }
</style>
<body>
    <main>

    <?php 
    $id = $_GET['id'];
    if(isset($id))
    {
      @$query = "select * from product where id='$id' ";
      @$result = mysqli_query($conn,$query);
      @$row = mysqli_fetch_assoc($result);
        
    }
    ?>
        <div class="container">

            <div class="product_img">
                <img src="./uploads/img//<?php echo $row['pro_img']; ?>" alt="">
            </div>

            <div class="product_details">
              <a href="section.php?seaction=<?php echo $row['pro_section'];?>">
                <h1 class="product_title"><?php echo $row['pro_section']; ?></h1>
              </a>
                <h3 class="product_price">Price: &nbsp; <?php echo $row['pro_price']; ?></h2>
            
                <h3>Sizes: &nbsp; <?php echo $row['pro_size']; ?></h3>
                <h4 class="product_description">The Product Details</h4>
                <p><?php echo $row['pro_descrip']; ?></p>
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
        </div>
    </main>
</body>
</html>