<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $login = $_SESSION["login"];
    
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
    }







    ?>
           <section class="py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1>Dodaj ksiązke</h1>
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
                                <div class="mb-3"><input class="form-control" name="tytul" placeholder="Tytul" /></div>
                                <div class="mb-3"><input class="form-control" name="autor" placeholder="Autor"></div>
                                <div class="mb-3"><input class="form-control" name="rokWydania" placeholder="Rok wydania"></div>
                                <div class="mb-3"><input class="btn btn-success d-block w-100" type="submit" name="submit" value="Dodaj"></button></div>
                                <p class="text-muted"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php

            $servername = "localhost";
            $username = "root";
            $dbpassword = "root";
            $dbname = "biblioteka";
            $tablename = "ksiazki";
            $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if(isset($_POST["tytul"]) and isset($_POST["autor"]) and isset($_POST["rokWydania"])){
            $tytul = $_POST["tytul"];            
            $autor = $_POST["autor"];            
            $rokWydania = $_POST["rokWydania"];            
            
            // $insert = "UPDATE `$tablename` (null, '$tytul','$autor','$rokWydania') WHERE;";
            if(isset($_POST["submit"])){
        //     if(!mysqli_query($conn, $insert)){
        //         echo "Error: ". mysqli_error($conn);
        //     }
        //     else{
        //         echo "<h1 class='alert alert-success'>Dodano nową książke</h1>";
        //         header("Location: index.php");
        //     }
        
        }
    }
            ?>

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>