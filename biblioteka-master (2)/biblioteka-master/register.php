<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1>Register</h1>
                    <p></p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center" style="margin-top: -36px;">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" name="login" placeholder="Login" /></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Register</button></div>
                                <p class="text-muted"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php 
    $servername = "localhost";
    $username = "root";
    $dbpassword = "root";
    $dbname="biblioteka";
    $tablename = "users";
    
    if(isset($_POST["password"]) and isset($_POST["login"])){
    $dbInitialize = mysqli_connect($servername, $username, $dbpassword);
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
    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sqlCreatingTables = "CREATE TABLE IF NOT EXISTS $tablename (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, login VARCHAR(25), password VARCHAR(25))";
    if(mysqli_query($conn, $sqlCreatingTables)){
      
    }
    else {
      echo "Error". mysqli_error($conn);
    }
    $login = $_POST["login"];
    $password = $_POST["password"];
    $sqlInserting = "INSERT INTO $tablename VALUES (null,'".$login."','".$password."')";
    
        if(mysqli_query($conn, $sqlInserting)){
            
        }
        else {
            mysqli_error($conn);
        }
      
    }
    ?>
</body>

</html>