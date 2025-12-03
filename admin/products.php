<?php
require ('../include/conected.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link rel="stylesheet" href="./styleAdmin.css">
  
</head>
<body>

<?php 
// ------ DELETED THE PRODUCRT  -----
  @$id = $_GET['id'];
  if (isset($id)){
    $query = "delete from product where id='$id' ";
    @$del = mysqli_query($conn,$query);
    if(isset($del))
    {
          echo '<script>alert("Deleted Successfully ")</script>'; 
    }else{
       echo '<script>alert("No Deleted ")</script>'; 
    }
    
  }
//  -----  //  DELETED THE PRODUCRT  // -----
?>


    <div class="sidebar_container">
        <table>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Picture </th>
                <th>Product Price </th>
                <th>Product decription </th>
                <th>Available size </th>
                <th>Product Available </th>
                <th>Product Section</th>
                <th>Product Updated</th>
                <th>Product Deleted</th>
            </tr>

<?php 
        @$query = "select * from product";
        @$result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result))
        {
?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['pro_name']; ?></td>
                <!-- img -->
                <td><img src="../uploads/img//<?php echo $row['pro_img']; ?>" alt="">
                    </td>
                <!--  //  img  // -->
                <td><?php echo $row['pro_price']; ?></td>
                <td><?php echo $row['pro_descrip']; ?></td>
                <td><?php echo $row['pro_size']; ?></td>
                <td><?php echo $row['pro_unv']; ?></td>
                <td><?php echo $row['pro_section']; ?></td>

                <td><a href="./update.php?id=<?php echo $row['id'] ?>"><button class="update_btn" type="submit">Update</button></a></td>
                <td><a href="./products.php?id=<?php echo $row['id'] ?>"><button class="delete_btn" type="submit">Delete</button></a></td>
            </tr>

            <?php 
        }  // close while
            ?>

        </table>
    </div>
</body>
</html>