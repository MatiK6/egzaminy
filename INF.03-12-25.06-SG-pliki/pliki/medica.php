<?php 
$conn = mysqli_connect('localhost','root','','medica');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia  Medica</title>
    <link rel="shortcut icon" href="obraz2.png" type="image/x-icon">
    <link rel="stylesheet" href="styl.css">

</head>
<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php 
            $sql = 'SELECT nazwa, cena, opis FROM abonamenty;';
            $result = mysqli_query($conn, $sql);
            while($row = $result -> fetch_assoc()){
                echo "<h3>"."Pakiet ".$row['nazwa']." - cena ".$row['cena']." zł"."</h3>";
                echo "<p>".$row['opis']."</p>";
            }        
        ?>
        
        <a href="opis.html">Dowiedz się więcej</a>
    </article>
    <main>
        <section>
            <h2>Standardowy</h2>
                <ul>
                    <?php 
                        $sql = 'SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id =
                         Cechy_id WHERE abonamenty.id = 1;';
                        $result = mysqli_query($conn, $sql);
                        while($row = $result -> fetch_assoc()){
                            echo "<li>".$row['cecha']."</li>";

                        }                           
                    ?>
                </ul>
        </section>
        <section>
            <h2>Premium</h2>
            <ul>
                <?php 
                    $sql = 'SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id =
                        Cechy_id WHERE abonamenty.id = 2;';
                    $result = mysqli_query($conn, $sql);
                    while($row = $result -> fetch_assoc()){
                        echo "<li>".$row['cecha']."</li>";

                    }                           
                ?>
            </ul>
        </section>
        <section>
            <h2>Dziecko</h2>
            <ul>
                <?php 
                    $sql = 'SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id =
                    Cechy_id WHERE abonamenty.id = 3;';
                    $result = mysqli_query($conn, $sql);
                    while($row = $result -> fetch_assoc()){
                        echo "<li>".$row['cecha']."</li>";

                    }                           
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p><img src="obraz2.png" alt="przychodnia">Stronę przygotował: 02357892</p>
    </footer>

</body>
</html>
<?php 
    mysqli_close($conn);
?>