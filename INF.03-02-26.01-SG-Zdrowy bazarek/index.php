<?php 
  $conn = mysqli_connect('localhost','root','','bazar');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zdrowy bazarek</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
    
  <header>
    <h1>Zdrowy bazarek</h1>
  </header>

  <nav>
    <!-- skrypt1 -->
     <?php
      $sql = "SELECT nazwa, plik FROM towar LIMIT 10;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_row($result)){
        echo "<img src='$row[1]' alt='$row[0]'>";
      } 
     ?>
  </nav>

  <main>
    <aside>
      <img src="market.png" alt="bazarek">
    </aside>
    <section>
      <p>Wyvbierz owoc lub warzywo i podaj jego wagę:</p>
      <form action="index.php" method="post">
        <select name="idTowaru" id="idTowaru">
          <!-- skrypt2 -->
          <?php
            $sql = "SELECT id, nazwa FROM towar;";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_row($result)){
              echo "<option value='$row[0]'>$row[1]</option>";
            } 
          ?>
        </select>
        <input type="number" name="liczbaKilogramow" id="liczbaKilogramow">
        <button type="submit">Zamów</button>
      </form>
      <!-- skrypt 3 -->
       <?php
        if(isset($_POST['idTowaru']) && isset($_POST['liczbaKilogramow'])){
          $idTowaru = $_POST['idTowaru'];
          $liczbaKilogramow = $_POST['liczbaKilogramow'];

          $sql = "SELECT rodzaj, nazwa, cena FROM towar WHERE id = $idTowaru";
          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_row($result)){
            $wartosc = $row['2'] * $liczbaKilogramow;
            echo "<p>$row[0] $row[1] wartość: $wartosc zł</p>";

          } 
          $sql2 = "INSERT INTO `zamowienie` (`id_towar`, `id_sklep`, `liczba_kg`) VALUES ('$idTowaru','2','$liczbaKilogramow')";
          mysqli_query($conn, $sql2);
        }
       ?>
    </section>
  </main>

  <footer>
    <p>Strone opracował 853268</p>
  </footer>


</body>
</html>

<?php
mysqli_close($conn);
?>
