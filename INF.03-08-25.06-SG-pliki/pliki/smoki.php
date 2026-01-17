<?php 
  $conn = mysqli_connect("localhost","root","","smoki");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smoki</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  
<header><h2>Poznaj smoki!</h2></header>

<nav>
  <section id="blok1" onclick="first_blok()">Baza</section>
  <section id="blok2" onclick="second_blok()">Opisy</section>
  <section id="blok3" onclick="third_blok()">Galeria</section>
</nav>

<main>
  <section id="sekcja1">
    <h3>Baza Smoków</h3>
    <form action="smoki.php" method="post">
      <select name="wybor" id="wybor">
        <?php 
          $sql = "SELECT DISTINCT(pochodzenie) FROM smok ORDER BY pochodzenie ASC;"; 
          $result = mysqli_query($conn,$sql);
          
          while($row = $result -> fetch_assoc()){
            echo "<option value=".$row['pochodzenie'].">".$row['pochodzenie']."</option>";
          }
        ?>
      </select>
      <button type="submit">Szukaj</button>
    </form>
   <table>
    <tr>
      <th>Nazwa</th>
      <th>Długoś</th>
      <th>Szerokość</th>
    </tr>
    <?php 
      if(isset($_POST['wybor'])){
        $pochodzenie = $_POST['wybor'];
        $sql = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = '".$pochodzenie."' ;";
        $result = mysqli_query($conn, $sql);
        while($row = $result -> fetch_assoc()){
            echo "<tr>";
              echo "<td>".$row['nazwa']."</td>";
              echo "<td>".$row['dlugosc']."</td>";
              echo "<td>".$row['szerokosc']."</td>";
            echo "</tr>";
          }
        }   


    
    ?>
   </table>
  </section>
 
  <section id="sekcja2">
    <h3>Opisy smoków</h3>
    <dl>
      <dt>Smok czerwony</dt>
      <dd>
        Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.
      </dd>
      <dt>
        Smok zielony
      </dt>
      <dd>
        Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.
      </dd>
      <dt>
        Smok niebieski 
      </dt>
      <dd>
        Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.
      </dd>
    </dl>
  </section>

  <section id="sekcja3">
    <h3>Galeria</h3>
    <img src="smok1.jpg" alt="Smok czerwony">
    <img src="smok2.jpg" alt="Smok wielki">
    <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
  </section>
</main>

<footer>
  <p>Stronę opracował: 25890758902</p>
</footer>

</body>
</html>
<script src="skrypt.js"></script>
<?php 
mysqli_close($conn);
?>