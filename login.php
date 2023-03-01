<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="login" placeholder="Login" required><br>
            <input type="text" name="password" placeholder="Haslo" required><br>
            <input type="submit" class="btn btn-success" value="Zaloguj sie">
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="biblioteka";
    $dbInitialize = mysqli_connect($servername, $username, $password);
    if (!$dbInitialize) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $sqlDBInitialize = "CREATE DATABASE IF NOT EXISTS biblioteka";
      if(mysqli_query($dbInitialize, $sqlDBInitialize)){
        
      }
      else {
        echo "Error creating database: " . mysqli_error($conn);
      }
      
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sqlCreatingTables = "CREATE TABLE IF NOT EXISTS Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 'login' VARCHAR(25), 'password' VARCHAR(25)";
    if(mysqli_query($conn, $sqlCreatingTables)){

    }
    else {
      echo "Error". mysqli_error($conn);
    }
    $login = $_POST["login"];
    $password = $_POST["password"];
    $sqlInserting = "INSERT INTO $dbname VALUES (null,'".$login."','".$password."')";
    if(isset($_POST["submit"])){
        if(mysqli_query($conn, $sqlInserting)){

        }
        else {
            mysqli_error($conn);
        }
    }
    ?>
</body>

</html>