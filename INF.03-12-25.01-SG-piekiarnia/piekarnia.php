<?php 
  $conn = mysqli_connect("localhost", "root", "","piekarnia");

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PIEKARNIA</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <img src="wypieki.png" alt="Produkty naszej piekarni" id="img1">  

  <nav>
    <a href="kw1.png">KWARENDA1</a>
    <a href="kw2.png">KWARENDA2</a>
    <a href="kw3.png">KWARENDA3</a>
    <a href="kw4.png">KWARENDA4</a>
  </nav>

  <header>
    <h1>WITAMY</h1>
    <h4>NA STRONIE PIEKARNI</h4>
    <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
  </header>

  <main>
    <h4>Wybierz rodzaj wypieków:</h4>
    
    <form action="piekarnia.php" method="post" >
      <select name="rodzaj">
        <?php 

          $sql = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY rodzaj DESC; ";
          $result = mysqli_query($conn, $sql);

          while($row = $result -> fetch_assoc()){
            echo "<option value='".$row["Rodzaj"]."'>".$row["Rodzaj"]."</option>";

          }


        ?>
      </select>
      <input type="submit"> 
    </form>

    <table>
      <tr>
        <th>Rodzaj</th>
        <th>Nazwa</th>
        <th>Gramatura</th>
        <th>Cena</th>
      </tr>

      <?php 

          if(isset($_POST['rodzaj'])){
            $rodzaj = $_POST['rodzaj'];
            $sql = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj';";
            $result = mysqli_query($conn, $sql);

            
              while($row = $result -> fetch_assoc()){
                echo "<tr>";
                  echo "<td>".$row["Rodzaj"]."</td>";
                  echo "<td>".$row["Nazwa"]."</td>";
                  echo "<td>".$row["Gramatura"]."</td>";
                  echo "<td>".$row["Cena"]."</td>";
                echo "</tr>";

              }
            


          }


      ?>

    </table>

  </main>
  
  
  <footer>
    <p>AUTOR: 523790792</p>
    <p>DATA: 10/01/2025</p>
  </footer>



</body>
</html>
<?php 
  mysqli_close($conn);
?>