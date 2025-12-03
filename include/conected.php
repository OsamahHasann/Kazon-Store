<?php 

$host = "localhost";
$username = "root";
$password = "";
$dbname = "kazon_store";

$conn = mysqli_connect($host, $username, $password, $dbname );
if(isset($conn))
{
    echo "";
}else {
    echo "connected failure";
}

?>