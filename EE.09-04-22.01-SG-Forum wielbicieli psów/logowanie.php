<?php 
$conn = mysqli_connect('localhost','root','','psy');

?>


<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum o psach</title>
        <link rel="stylesheet" href="styl4.css">
    </head>
    <body>
        <header>
            <h1>Forum wielbicieli psów</h1>
        </header>

        <div id="lewy">
            <img src="obraz.jpg" alt="foksterier">
        </div>

        <div id="prawy1">
            <h2>Zapisz się</h2>
            <form action="logowanie.php" method="post">
                <label for="login">login:</label> <input type="text" name="login" id="login"><br>
                <label for="haslo">hasło:</label> <input type="password" name="haslo" id="haslo"><br>
                <label for="haslo2">powtórz hasło:</label> <input type="password" name="haslo2" id="haslo2"><br>
                <button type="submit">Zapisz</button>
            </form>
            <?php
                // Skrypt #1
                if(isset($_POST['login']) && isset($_POST['haslo']) && $_POST['haslo2']){
                    $login = $_POST['login'];
                    $haslo = $_POST['haslo'];
                    $haslo2 = $_POST['haslo2'];

                    $sql = "SELECT login FROM uzytkownicy;";
                    $return = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($return)){
                        if($row['login'] == $login){
                            $czyLoginJuzIstnieje = true;
                            
                        }
                        else{
                            $czyLoginJuzIstnieje = false;
                        }
                    }
                    if($czyLoginJuzIstnieje == false){
                        if($haslo != $haslo2){
                            echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                        }
                        else{
                            $zaszyfrowaneHaslo = sha1($haslo);
                            $sql2 = "INSERT INTO uzytkownicy VALUES ('NULL', '".$login."', '".$zaszyfrowaneHaslo."');"; 
                            mysqli_query($conn, $sql2);
                            echo "<p>Konto zostało dodane</p>";
                        }
                    }
                    else{
                        echo '<p>login występuje w bazie danych, konto nie zostało dodane</p>';
                    }

                }
                else{
                    echo "<p> wypełnij wszytkie pola";
                }



            ?>
        </div>

        <div id="prawy2">
            <h2>Zapraszamy wszystkich</h2>
            <ol>
                <li>właścicieli psów</li>
                <li>weterynarzy</li>
                <li>tych, co chcą kupić psa</li>
                <li>tych, co lubią psy</li>
            </ol>
            <a href="regulamin.html">Przeczytaj regulamin forum</a>
        </div>

        <footer>
            Stronę wykonał: 45636346</a>
        </footer>
    </body>
</html>

<?php
mysqli_close($conn);
?>