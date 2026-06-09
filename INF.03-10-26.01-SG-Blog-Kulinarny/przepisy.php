<?php
$conn = mysqli_connect("localhost", "root", "", "przepisy");

if(isset($_GET['id'])){
  $id = $_GET['id']; 
}
else{
  $id = 7;
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog kulinarny</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  <aside>
    <a href="przepisy.php?id=1">Sernik</a><br>
    <a href="przepisy.php?id=2">Sałatka</a><br>
    <a href="przepisy.php?id=3">Pankejki</a><br>
    <a href="przepisy.php?id=4">Nugetsy</a><br>
    <a href="przepisy.php?id=5">Łosoś</a><br>
    <a href="przepisy.php?id=6">Kociołek</a><br>
    <a href="przepisy.php?id=7">Jagnięcina</a><br>
    <a href="przepisy.php?id=8">Hamburgery</a><br>
    <a href="przepisy.php?id=9">Eklerki</a><br>
    <a href="przepisy.php?id=10">Churros</a>
    <p>Autor: 253235235235</p>
  </aside>
  <main>
    <h1>
      <!-- skrypt1 -->
      <?php 
        $sql1 = "SELECT potrawy.nazwa, rodzaje.rodzaj FROM rodzaje JOIN potrawy ON rodzaje.idRodzaje = potrawy.idRodzaje WHERE potrawy.idPotrawy = $id;";
        $res = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_row($res)){
          echo $row[1];
        }
      ?>
    </h1>
    <!-- skrypt2 -->
    <?php 
        $sql2 = "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = $id;";
        $res = mysqli_query($conn, $sql2);
        while($row = mysqli_fetch_row($res)){
          echo "<h2>$row[0]</h2>";
          if($row[1] == 1){
            $trudnosc = "łatwe";
          }
          if($row[1] == 2){
            $trudnosc = "średnie";
          }
          if($row[1] == 3){
            $trudnosc = "trudne";
          }          
          echo "<p>Trudność: $trudnosc, Kalorie: $row[2]</p>";
        }
    ?>
    <img src="separator.png" alt="przepis">
    <p>Alergeny: 
      <!-- skrypt3 -->
       <?php
        $sql3 = "SELECT potrawy.nazwa, alergeny.alergen FROM potrawy
              JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny
              ON alergeny.idAlergeny = lista_alergenow.idAlergeny WHERE potrawy.idPotrawy = $id;";
        $res = mysqli_query($conn, $sql3);
        while($row = mysqli_fetch_row($res)){
          echo $row[1];
          echo " ";
        }        
       ?>
    </p>
    <h2>Składniki</h2>
    <ul>
      <li>Lorem 1 kg</li>
      <li>Ipsum 2 szt.</li>
      <li>Dolor 200 g</li>
      <li>Sit amet (szczypta)</li>
    </ul>
    <p>
      <!-- skrypt4 -->
       <?php
        $sql4 = "SELECT przepis, plik FROM potrawy WHERE idPotrawy = $id;";
        $res = mysqli_query($conn, $sql4);
        while($row = mysqli_fetch_row($res)){
          echo $row[0];
          $nazwaPliku = $row[1];
        }        
       ?>       
    </p>
  </main>
  <section style="background-image: url(<?php echo $nazwaPliku;?>);">
    <!-- skrypt4^^^ -->
    <h1>Blog kulinarny</h1>
  </section>
</body>
</html>

<?php
mysqli_close($conn);
?>