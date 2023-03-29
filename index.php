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
    <div class="container">
        <?php
        session_start();
        $login = $_SESSION["login"];
        $log = $_SESSION["login"][0];
        echo "<h1> Witaj $log</h1>";
        // print_r($login);
        if (!isset($_SESSION["login"])) {
            header("Location: login.php");
        }







        ?>
        <div class="row">
            <div class="col-11"><a href="dodaj.php"><button class="btn btn-success">Dodaj książke</button></a></div>
            <div class="col-1"><a href="./logout.php"><button class="btn btn-danger">Wyloguj</button></a></div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Rok Wydania</th>
                    <th scope="col">Akcje</th>
                </tr>

            </thead>
            <tbody>

                <?php

                $servername = "localhost";
                $username = "root";
                $dbpassword = "";
                $dbname = "biblioteka";
                $tablename = "ksiazki";
                $initializeDatabase = mysqli_connect($servername, $username, $dbpassword, $dbname);
                if (!$initializeDatabase) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $booksInitialize = "CREATE TABLE IF NOT EXISTS ksiazki(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, tytul VARCHAR(25), autor VARCHAR(25), rokWydania DATE, image VARCHAR(25))";
                if (!mysqli_query($initializeDatabase, $booksInitialize)) {
                    echo mysqli_error($initializeDatabase);
                }
                $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $check = "SELECT * FROM  `$tablename`";
                $results = mysqli_query($conn, $check);
                


                if (mysqli_num_rows($results) > 0) {
                    $row = mysqli_fetch_assoc($results);
                    $i = 0;
                    

                    while ($row = $results->fetch_assoc()) {
                        if ($login[1] == "USER") {
                            $i += 1;
                            echo "<tr><th scope='row'>" . $i . "</th><td><a href='uploads/".$row['image']."'</td><td>" . $row['tytul'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['rokWydania'] . "</td><td><a href='usun.php/?id=" . $row["id"] . "'><button class='btn btn-danger'>Usuń książke</button></a> <a href='edytuj.php/?id=" . $row["id"] . "'><button class='btn btn-primary'>Edytuj książke</button></a></td></tr>";
                        }
                        elseif($login[1] == "ADMIN"){
                            echo "<tr><th scope='row'>" . $row["id"] . "</th><td>" . $row['tytul'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['rokWydania'] . "</td><td><a href='usun.php/?id=" . $row["id"] . "'><button class='btn btn-danger'>Usuń książke</button></a> <a href='edytuj.php/?id=" . $row["id"] . "'><button class='btn btn-primary'>Edytuj książke</button></a></td></tr>";
                        }
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>