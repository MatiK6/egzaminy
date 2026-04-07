<?php
    $conn = mysqli_connect("localhost", "root", "", "biblioteka");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblioteka miejska</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <?php
                // Skrypt #1    

                for($i=0; $i<=20; $i++){
                  echo "<img src='obraz.png'>";
                }

            ?>
        </header>

        <section id="pierwszy">
            <h2>Liryka</h2>
            <form action="biblioteka.php" method="post">
                <select name="liryka" id="liryka">
                    <?php
                        // Skrypt #2
                      $sql = " SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka';";
                      $response = mysqli_query($conn, $sql);                            

                      while($result = mysqli_fetch_assoc($response)){

                        echo "<option value='".$result['id']."'>".$result['tytul']."</option>";      
                        $id = $row['id'];
                        $title = $row['tytul'];  
                      }                          
                                                  
                    ?>
                </select>
                <input type="submit" value="Rezerwuj" name="buttonliryka" id='buttonliryka'>
            </form>
            <?php
                // Skrypt #3
                if(isset($_POST['buttonliryka'])){
                    $idks = $_POST['liryka'];

                    $sql = "SELECT tytul FROM ksiazka WHERE id = '".$idks."';";
                    $response = mysqli_query($conn, $sql);      
                    
                    while($row = mysqli_fetch_assoc($response)){
                        echo "<p> Ksiązka ".$row['tytul']." została już zarejestrowana</p>";
                    }

                }
            ?>
        </section>

        <section id="drugi">
            <h2>Epika</h2>
            <form action="biblioteka.php" method="post">
                <select name="epika" id="epika">
                    <?php
                        // Skrypt #2
                      $sql = " SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika';";
                      $response = mysqli_query($conn, $sql);                            

                      while($result = mysqli_fetch_assoc($response)){

                        echo "<option value='".$result['id']."'>".$result['tytul']."</option>";      
                        
                        $id = $row['id'];
                        $title = $row['tytul'];  

                      }                          
                                                  
                    ?>
                </select>
                <input type="submit" value="Rezerwuj" name="buttonepika" id='buttonepika'>
            </form>
            <?php
                // Skrypt #3
                if(isset($_POST['buttonepika'])){
                    $idks = $_POST['epika'];

                    $sql = "SELECT tytul FROM ksiazka WHERE id = '".$idks."';";
                    $response = mysqli_query($conn, $sql);      
                    
                    while($row = mysqli_fetch_assoc($response)){
                        echo "<p> Ksiązka ".$row['tytul']." została już zarejestrowana</p>";
                    }

                }
            ?>
        </section>

        <section id="trzeci">
            <h2>Dramat</h2>
            <form action="biblioteka.php" method="post">
                <select name="dramat" id="dramat">
                    <?php
                        // Skrypt #2
                      $sql = " SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat';";
                      $response = mysqli_query($conn, $sql);                            

                      while($row = mysqli_fetch_assoc($response)){

                        echo "<option value='".$row['id']."'>".$row['tytul']."</option>";      
                        $idks = $row['id'];
                        $title = $row['tytul'];  
                      }                          

                    ?>
                </select>
                <input type="submit" value="Rezerwuj" name="buttondramat" id='buttondramat'>
            </form>
                

            <?php
            // Skrypt #3
                if(isset($_POST['buttondramat'])){
                    $idks = $_POST['dramat'];

                    $sql = "SELECT tytul FROM ksiazka WHERE id = '".$idks."';";
                    $response = mysqli_query($conn, $sql);      
                    
                    while($row = mysqli_fetch_assoc($response)){
                        echo "<p> Ksiązka ".$row['tytul']." została już zarejestrowana</p>";
                    }

                }

            ?>
        </section>

        <section id="czwarty">
            <h2>Zaległe książki</h2>
            <ul>
                <?php
                    // Skrypt #4
                    $sql = " SELECT tytul, id_cz, data_odd FROM ksiazka JOIN wypozyczenia ON id = id_ks ORDER BY data_odd LIMIT 15;";
                    $response = mysqli_query($conn, $sql);        
                    
                    while($row = mysqli_fetch_array($response)){
                        echo "<li>".$row[0]." ".$row[1]." ".$row[2]."</li>";
                    }

                ?>
            </ul>
        </section>

        <footer>
            <p><strong>2352 3523</strong></p>
        </footer>
    </body>
</html>

<?php
    $conn->close();
?>