<?php
$conn = mysqli_connect("localhost","root","","korona");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Korona gór polskich</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  
  <header id="header1">
    <img src="logo.png" alt="Logo">
  </header>
  <header id="header2">
    <h2>Korona Gór Polskich</h2>
  </header>
  <main>
    <!-- skrypt3 -->
    <?php
      if(isset($_GET['idSzczytu'])){
        $idSzczytu = $_GET['idSzczytu'];

        $sql = "SELECT szczyty.plik, szczyty.nazwa, szczyty.wysokosc, szczyty.pasmo, opis.opis FROM szczyty
                JOIN opis ON opis.szczyty_id = szczyty.id WHERE szczyty.id = $idSzczytu;";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_row($result)){
          echo "<img src='$row[0]' alt='szczyt'>";
          echo "<h2>$row[1]</h2>";
          echo "<h3>wysokość: $row[2] metrów n.p.m.</h3>";
          echo "<h3>pasmo górskie:: $row[3]</h3>";
          echo "<p>$row[4]</p>";

        }
      }


    ?>
  </main>
  <section>
    <!-- skrypt2 -->
    <?php
      $sql = "SELECT plik, nazwa FROM szczyty LIMIT 10;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_row($result)){
        echo "<img src='$row[0]' alt='$row[1]' class='miniatury'>";
      }
    ?>
  </section>
  <footer id="footer1">
    <h3>Kontakt</h3>
    <ul>
      <li>Zadzwoń do nas: 111 222 333</li>
      <li><a href="mailto:korona@gory.pl">Napisz do nas</a></li>
    </ul>
  </footer>
  <footer id="footer2">
    <h3>&reg; Wkonane przez: 73267235789</h3>
  </footer>

</body>
</html>

<?php
  mysqli_close($conn);
?>