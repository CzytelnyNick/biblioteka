<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }

    $servername = "localhost";
    $username = "root";
    $dbpassword = "root";
    $dbname="biblioteka";
    $tablename = "ksiazki";
    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();
    $login = $_SESSION["login"];
    echo "<h1> Witaj $login</h1>";
    

    ?>
</body>
</html>