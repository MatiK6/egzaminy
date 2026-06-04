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
    <!-- skrypt1 -->
     <?php
      $sql = "SELECT id, nazwa FROM szczyty GROUP BY wysokosc DESC;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_row($result)){
        echo "<span><a href='szczyty.php?idSzczytu=$row[0]'>$row[1]</a></span>";
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