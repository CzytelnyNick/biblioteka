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
        
        <div><a href="../index.php"><button class="btn btn-danger">Powrót</button></a></div>
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1>Edytuj ksiązke</h1>
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
                                <div class="mb-3"><input type="checkbox" name="turnName" id="name" checked><input class="form-control" name="tytul" placeholder="Tytul" id="tytul"/></div>
                                <div class="mb-3"><input type="checkbox" name="turnAuthor" id="author" checked><input class="form-control" name="autor" placeholder="Autor" id="autor"></div>
                                <div class="mb-3"><input type="checkbox" name="turnYear" id="year" checked><input type="date" class="form-control" name="rokWydania" placeholder="Rok wydania" id="rokWydania"></div>
                                <div class="mb-3"><input class="btn btn-success d-block w-100" type="submit" name="submit" value="Zatwierdź"></button></div>
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
            if(isset($_POST["tytul"]) or isset($_POST["autor"]) or isset($_POST["rokWydania"]) or isset($_POST["submit"])){
            $tytul = $_POST["tytul"];            
            $autor = $_POST["autor"];            
            $rokWydania = $_POST["rokWydania"];            
            $id = $_GET["id"];
            $check = "SELECT * FROM  `$tablename` WHERE id='$id'";
            $results = mysqli_query($conn, $check);

            
            if(mysqli_num_rows($results) > 0){
                $row = mysqli_fetch_assoc($results);
                if(!isset($_POST["turnName"])){
                    $tytul = $row["tytul"];
                }
                if(!isset($_POST["turnAuthor"])){
                    $autor = $row["autor"];
                }
                if(!isset($_POST["turnYear"])){
                    $rokWydania = $row["rokWydania"];
                }
            }
            $update = "UPDATE `$tablename` SET tytul = '$tytul',autor = '$autor', rokWydania='$rokWydania' WHERE id = '$id'";
            if(!mysqli_query($conn, $update)){
                echo "Error: ". mysqli_error($conn);
            }
            else{
                // echo "<h1 class='alert alert-success'>Dodano nową książke</h1>";
                header("Location: ../index.php");
            }

        
        }
        ?>

        </tbody>
    </table>
    <script>
        authorCheckbox = document.querySelector("#author")
        authorText = document.querySelector("#autor")
        yearCheckbox = document.querySelector("#year")
        yearText = document.querySelector("#rokWydania")
        nameCheckbox = document.querySelector("#name");
        nameText = document.querySelector("#tytul");

        nameCheckbox.addEventListener("click", ()=>{
        
        if(nameCheckbox.checked){
            nameText.disabled = false
        }
        else{
            nameText.disabled = true
        }

       

       
        });
        authorCheckbox.addEventListener("click", ()=>{
            if(authorCheckbox.checked){
            authorText.disabled = false
        }
        else{
            authorText.disabled = true
        }


    })
    yearCheckbox.addEventListener("click", ()=>{
        console.log(yearText.value);
    if(yearCheckbox.checked){
            
            yearText.disabled = false
        }
        else{
            yearText.disabled = true
        }
    })
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>