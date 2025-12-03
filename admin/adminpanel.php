<?php 
session_start();
require ('../include/conected.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  //  FONT AWESOME  // -->
      <link rel="stylesheet" href="./styleAdmin.css">
    <title>Dashbord</title>
</head>
<body>
    <?php
    // if the user go to admin panel without login rechang to home page 
    if(!isset($_SESSION['email'])){
        header('location:../index.php');
    }else{
    ?>

    <?php
    @$sectionName = $_POST['Section_name'];
    @$secAdd = $_POST['secadd'];
    @$id = $_GET['id'];

    if(isset($secAdd))
    {
        if(empty($sectionName))
        {
            echo '<script>alert("The fild of new section name is empty, Please enter that! ")</script>';
        }elseif($sectionName < 50)
        {
            echo '<script>alert("The name of new section is so long, Please enter that again! ")</script>';
        }else
        {
            $query = "insert into section (Section_name) values ('$sectionName')"; 
            $result = mysqli_query($conn,$query);
            echo '<script>alert("Added Successfully! ")</script>';
        }

    }

    ?>

    <?php 
   #delete section 
    // @$id = $_GET['id'];
   if (isset($id))
   {
    $delete = "delete from section where id = '$id' ";
    mysqli_query($conn,$delete);
    if(isset($delete))
    {
       echo '<script>alert("Deleted Successfully ")</script>'; 
    }else{
       echo '<script>alert("No Deleted ")</script>'; 
    }
   }
    ?>



<!-- sidebar part  -->

<div class="sidebar_container">

  <!-- sider bar -->
    <div class="sidebar">
        <h1>Dashbord Mangements</h1>
        <ul>
            <li><a href="../index.php" target="_blank"><i class="fa-solid fa-house" style="color: #FFD43B;"></i>Home</a></li>
            <li><a href="./products.php" target="_blank"><i class="fa-solid fa-hat-cowboy" style="color: #FFD43B;"></i>Products Pags</a></li>
            <li><a href="./addProduct.php" target="_blank"><i class="fa-solid fa-folder-plus" style="color: #FFD43B;"></i>Add Product</a></li>
            <li><a href="../index.php" target="_blank"><i class="fa-solid fa-users" style="color: #FFD43B;"></i>Members Information</a></li>
            <li><a href="../index.php" target="_blank"><i class="fa-solid fa-folder-open" style="color: #FFD43B;"></i>Customer Orders</a></li>
            <li><a href="./logout.php" target="_blank"><i class="fa-solid fa-right-from-bracket" style="color: #FFD43B;"></i>Logout</a></li>
        </ul>
    </div>
    <!--  //  sider bar //  -->

    <!-- section  -->
     <div class="content_sec">
        <form action="adminpanel.php" method="post">
            <label for="section"> Add New Section</label>
            <input type="text" name="Section_name" id="section" placeholder="Enter Your Section...">
            <br>
            <button class="add" type="submit" name="secadd">Add Section</button>
        </form>
        <br>

        <!-- table -->

        <table>
            <tr>
                <th>Id</th>
                <th>Section Name</th>
                <th>Section Delete</th>
            </tr>
            <tr>
                <?php
                $query = "select * from section";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>

                
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Section_name']; ?></td>

                <td><a href="./adminpanel.php?id=<?php echo $row['id']; ?>"><button class="delete" type="submit">Delete</button></a></td>
            </tr>

            <?php
                } // close while
            ?>
            
        </table><!-- // table // -->

     </div><!--  //  section  //  -->

</div><!--   //  sidebar part  //  -->


<?php 
    } // close else
?>


</body>
</html>