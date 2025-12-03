<?php 
session_start();
require ('../include/conected.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        background: linear-gradient(
         135deg,
         rgba(20, 20, 20, 0.95),
         rgba(40, 40, 40, 0.8),
         rgba(10, 10, 10, 0.9)
                                   );
         background-attachment: fixed;
         color: #ffd64f;
    }
    .container{
        width: 300px;
        height: 220px;
        background-color: #0a0a0aff;
        position: fixed;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px;
        margin: auto auto;
        text-align: center;
        border-radius: 40px;
        box-shadow: 0px 6px 45px rgba(245, 213, 79, 0.2);
    }
    button{
        background-color: #ffd64f;
        border: none;
        width: 100px;
        height: 20px;
        margin-top: 10px;
        border-radius: 5px;
    }
    button:hover {
        background-color: rgba(0, 255, 119, 0.349);
        color: #e0e0e0;
    }
    input{
      background-color: rgba(40, 40, 40, 0.8); 
      border: none; 
      border-radius: 5px;
      height: 20px;
    }
</style>

<body>
    <main>

    <?php 
    @$adEmail = $_POST['email'];
    @$adpassword = $_POST['password'];
    @$adButton = $_POST['add'];

    if(isset($adButton))
    {
        if(empty($adEmail) || empty($adpassword))
        {
            echo '<script>alert("Enter the email and the password, Please!")</script>';
        }
        else{
            $query = " select * from admin where email='$adEmail' and password = '$adpassword' ";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['email'] = $adEmail;
                echo '<script>alert("Hello maneger we will trast you to Dashbord!")</script>';
                header("REFRESH:2; URL = adminpanel.php");
            }else{
                echo '<script>alert("You can not go to Dashbord You will go to home page!")</script>';
                header("REFRESH:2; URL = ../index.php");
            }
        }
    }
    ?>
  
        <div class="container">
            <h1>Login</h1>
            <form action="admin.php" method = "post">

             <label for="email">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
             <input type="email" name="email" id="email">
             <br><br>
             <label for="pass">Password</label> 
             <input type="text" name="password" id="pass"> 
             <br><br>
             <button type="submit" name="add">Login</button>

            </form>
        </div>
    </main>
    
</body>
</html>