<?php
require ('../include/conected.php');
?>

<?php 

@$pro_name = $_POST['pro_name'];
@$pro_price = $_POST['pro_price'];
@$pro_section = $_POST['pro_section'];
@$pro_descrip = $_POST['pro_descrip'];
@$pro_size = $_POST['pro_size'];
@$pro_unv = $_POST['pro_unv'];
@$pro_add = $_POST['pro_add'];

// img 
@$imagename = $_FILES['pro_img']['name'];
@$imageTmp =$_FILES['pro_img']['tmp_name'];

//    --- img --- 

?>

<?php  
   if(isset($pro_add))
 {
    if(empty($pro_name) || empty($pro_price) || empty($pro_section)
         || empty($pro_descrip) || empty($pro_size) )
        {
            echo '<script>alert("Find Empty Fild, Pleas Full All Filds! ")</script>';
        }else{
           @$proimg = rand(0,5000)."_".$imagename;
           move_uploaded_file($imageTmp,"../uploads/img//".$proimg); 
        

  $query = " insert into product (pro_name, pro_img, pro_price, pro_section,
             pro_descrip,  pro_size, pro_unv) values ('$pro_name', '$proimg',
             '$pro_price', '$pro_section', '$pro_descrip', '$pro_size', '$pro_unv')";   
  $result =  mysqli_query($conn,$query);
  if(isset($result)){
    echo '<script>alert("Added The Product is Successfully..! ")</script>';
    header("location:products.php");
  }else{
    echo '<script>alert("it is problem in added process..! ")</script>';
  }

           }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="./styleAdmin.css">
</head>
<body>
    <center>
        <main>
            <div class="product_form">
                <h1>Add Product</h1><br>
                <form action="./addProduct.php" method="post" enctype="multipart/form-data">

                    <label for="name">Product Name</label>
                    <input type="text" name="pro_name" id="name">

                    <label for="file">Product Picture</label>
                    <input type="file" name="pro_img" id="file">

                    <label for="Price">Product Price</label>
                    <input type="text" name="pro_price" id="Price">

                    <label for="decription">Product decription</label>
                    <input type="text" name="pro_descrip" id="decription">

                    <label for="size">Available size For Product </label>
                    <input type="text" name="pro_size" id="size">
                    
                    <!-- product section  -->
                    <div>
                      <label for="form_control">Choise Section</label>
                      <select name="pro_section" id="form_control">

                      <?php
                @$query = "select * from section";
                @$result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result))
                { 
                     echo '<option>'.$row['Section_name'].'</option>'; 
                    }
                    ?>

                      </select> 
                    </div>
                    <!--  //  product section  //  -->

                    <input class="button" type="submit" name="pro_add" value="Add The Product Now "></input>

                </form>
            </div>
        </main>
    </center>
</body>
</html>