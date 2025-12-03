<?php
require ('../include/conected.php');
?>

<?php 
@$id = $_GET['id'];
if (isset($id))
{
    @$query = "select * from product where id = '$id' ";
    @$result = mysqli_query($conn,$query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
    }

}

if (isset($_POST['pro_update']))
{
    $id_new = $_GET['id_new'];
    if (isset($id_new))
    {
@$pro_name = $_POST['pro_name'];
@$pro_price = $_POST['pro_price'];
@$pro_section = $_POST['pro_section'];
@$pro_descrip = $_POST['pro_descrip'];
@$pro_size = $_POST['pro_size'];
@$pro_unv = $_POST['pro_unv'];

// img 
@$imagename = $_FILES['pro_img']['name'];
@$imageTmp =$_FILES['pro_img']['tmp_name'];

//    --- img --- 

if(empty($pro_descrip) || empty($pro_size))
{
    echo '<script>alert("It Is Find Empty Fild, Pleas Full All Filds! ")</script>';
}else{
        @$proimg = rand(0,5000)."_".$imagename;
        move_uploaded_file($imageTmp,"../uploads/img//".$proimg); 
      @$query = "update product set 
        pro_name = '$pro_name',
        pro_img = '$pro_img',
        pro_price = '$pro_price',
        pro_section = '$pro_section',
        pro_descrip = '$pro_descrip',
        pro_size = '$pro_size',
        pro_unv = '$pro_unv'
        where id = '$id_new' ";
      @$result = mysqli_query($conn,$query);
      if (isset($result))
      {
        echo '<script>alert("The Updated Is successfully! ")</script>';
        header("LOCATION:../index.php");
      }else{
        echo '<script>alert("The Updated Has Problem..! ")</script>';
      }
}

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="./styleAdmin.css">
</head>
<body>
    <center>
        <main>
            <div class="product_form">
                <h1>Add Product</h1><br>
                <form action="./update.php?id_new=<?php echo @$row['id'] ?>" method="post" enctype="multipart/form-data">

                    <label for="name">Product Name</label>
                    <input type="text" name="pro_name" id="name" 
                     value=" <?php echo $row['pro_name'] ?>">

                    <label for="file">Product Picture</label>
                    <input type="file" name="pro_img" id="file"
                    value=" <?php echo $row['pro_img'] ?>">

                    <label for="Price">Product Price</label>
                    <input type="text" name="pro_price" id="Price"
                    value=" <?php echo $row['pro_price'] ?>">

                    <label for="decription">Product decription</label>*
                    <input type="text" name="pro_descrip" id="decription"
                    value=" <?php echo $row['pro_descrip'] ?>">

                    <label for="size">Available size For Product </label>
                    <input type="text" name="pro_size" id="size"
                    value=" <?php echo $row['pro_size'] ?>">

                    <label for="unv">Product Available</label>
                    <input type="text" name="pro_unv" id="unv"
                    value=" <?php echo $row['pro_unv'] ?>">
                    
                    <!-- product section  -->
                    <div>
                      <label for="form_control">Choise Section</label>
                      <select name="pro_section" id="form_control"
                      value=" <?php echo $row['pro_section'] ?>"><br>

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

                    <input class="button" type="submit" name="pro_update" value="Update The Product Now "></input>

                </form>
            </div>
        </main>
    </center>
</body>
</html>