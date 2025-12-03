<?php

session_start();

include '../include/conected.php';

if(isset($_SESSION['user_id']))
{
  session_unset();

  session_destroy();

       echo '<script>alert(" the logout is successfully ")
      window.location.href = "login.php" </script>';

}else{
    echo '<script>alert(" You have not login, first login")
    window.location.href = "login.php" </script>';
}


?>