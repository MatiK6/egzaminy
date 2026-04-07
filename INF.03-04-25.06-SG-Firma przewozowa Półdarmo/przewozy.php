<?php
$conn = new mysqli('localhost', 'root', '', 'przewozy');
?>

<?php
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM zadania WHERE id_zadania = ".$id.";";
        mysqli_query($conn, $sql);
    }


?>


<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Firma Przewozowa</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Firma przewozowa Półdarmo</h1>
        </header>

        <nav>
            <a href="kw1.png">kwerenda1</a>
            <a href="kw2.png">kwerenda2</a>
            <a href="kw3.png">kwerenda3</a>
            <a href="kw4.png">kwerenda4</a>
        </nav>

        <main>
            <section id="lewy">
                <h2>Zadania do wykonania</h2>
                <table>
                    <tr>
                        <th>Zadanie do wykonania</th>
                        <th>Data realizacji</th>
                        <th>Akcja</th>
                    </tr>
                    <?php
                        // Skrypt 1
                        $sql = "SELECT id_zadania, zadanie, data FROM zadania;";
                        $response = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($response)){
                            echo "<tr>";
                                echo "<td>".$row['zadanie']."</td>";
                                echo "<td>".$row['data']."</td>";
                                echo "<td><a href='?delete=".$row['id_zadania']."'>Usuń</a></td>";
                            echo "</tr>";
                        }
                    ?>
                    
                </table>
                <form action="przewozy.php" method="post">
                    <label for="zadanie">Zadanie do wykonania: </label>
                    <input type="text" name="zadanie" id="zadanie"><br>
                    <label for="data">Data realizacji: </label>
                    <input type="date" name="data" id="data">
                    <input type="submit" value="Dodaj">
                </form>
                <?php
                    // Skrypt 2

                    if(isset($_POST['zadanie']) && $_POST['data']){
                            $zadanie = $_POST['zadanie'];
                            $data = $_POST['data'];    

                            $sql2 = "INSERT INTO zadania VALUES (NULL, '".$zadanie."', '".$data."', 1);";
                            mysqli_query($conn, $sql2);
                    }

                ?>
            </section>

            <section id="prawy">
                <img src="auto.png" alt="auto firmowe">
                <h3>Nasza specjalność</h3>
                <ul>
                    <li>Przeprowadzki</li>
                    <li>Przewóz mebli</li>
                    <li>Przesyłki gabarytowe</li>
                    <li>Wynajem pojazdów</li>
                    <li>Zakupy towarów</li>
                </ul>
            </section>
        </main>

        <footer>
            <p>Stronę wykonał: 252523235</p>
        </footer>
    </body>
</html>
<?php
$conn->close();
?>