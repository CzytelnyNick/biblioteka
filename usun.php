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
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "biblioteka";
        $tablename = "ksiazki";
        
        $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
        if(!$conn){
            die("Connection problem: " + mysqli_connect_error());
        }
        $id = $_GET["id"];
        echo $id;
        $delete = "DELETE FROM `$tablename` WHERE id = $id";
        mysqli_query($conn, $delete);

        header("Location: ../index.php");
    
    
    ?>
</body>
</html>