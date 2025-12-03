<?php 
session_start();
include ('../include/conected.php');

// التحقق من تسجيل الدخول
if(isset($_SESSION['user_id']))
{
    echo '<script>alert("Already you have account in a store ")
          window.location.href = "../index.php";</script>'; 
} 

@$name = $_POST['user_name'];
@$password = $_POST['password'];
    
 // استعلام اذا يوجد مستخدم قام بتسجيل الدخول
   @$user_query = "select * from user where user_name = '$name' and password = '$password' ";
   @$result = mysqli_query($conn,$user_query); 
   if(mysqli_num_rows($result) > 0)
   {
     $user_data = mysqli_fetch_assoc($result);
     $_SESSION['user_id'] = $user_data['user_id'];
     $user_id =$user_data['user_id'];
     echo '<script>alert("Logged is successfully ")
          window.location.href = "../index.php";</script>';
   }else{
         echo '<script>alert("Username or Password is false, Are you sure have you account..! ")</script>';
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="./UserStyle.css">
</head>
<body>
           <div class="login_container">
            <h1>Login</h1>
            <form action="./login.php"method = "post">

             <label for="email">Username</label>
             <input type="text" name="user_name" id="email">
             <br><br>
             <label for="pass">Password</label> 
             <input type="text" name="password" id="pass"> 
             <br><br>
             <button type="submit" name="add">Login</button><br><br><br>
             <p>No Already, Have You Account?</p>
             <a href="./signup.php">Signup New User</a>

            </form>
        </div> 
</body>
</html>