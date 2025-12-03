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
@$Email = $_POST['email'];
@$password = $_POST['password'];
    
 // استعلام اذا يوجد مستخدم قام بتسجيل الدخول
   @$user_query = "select * from user where user_name = '$name' and password = '$password' ";
   @$result = mysqli_query($conn,$user_query); 
   if(mysqli_num_rows($result) > 0)
    {
       echo '<script>alert("Already you have account in a store login pleas ")</script>';        
    } else {
        if ( empty($name) || empty($Email) || empty($password)){
        echo '<script>alert("name or email or password is empty")</script>';
    }else{
 
      @$insert = "insert into user (user_name, email, password) values ('$name', '$Email', '$password' )";
      @$result = mysqli_query($conn,$insert);
      echo '<script>alert("Seginup is successfully login pleas")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup New User</title>
    <link rel="stylesheet" href="./UserStyle.css">
</head>
<body>
    
        <div class="container">
            <h1>Signup New User</h1>
            <form action="./signup.php"method = "post">

             <label for="name">Username&nbsp;&nbsp;&nbsp;</label>
             <input type="text" name="user_name" id="name" require>
             <br><br>
             <label for="email">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
             <input type="email" name="email" id="email" require>
             <br><br>
             <label for="pass">Password&nbsp;&nbsp;&nbsp;&nbsp;</label> 
             <input type="text" name="password" id="pass" require> 
             <br><br>
             <button type="submit" name="add">Signup</button>

            </form>

            <div class="footer">
                <p>Already, Have You Account?</p>
                <a href="login.php">Login</a>
            </div>
        </div>

</body>
</html>