<?php
  $conn = mysqli_connect('localhost', 'root','','matura');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Matura</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  
<header>
  <h1>System informacji dla maturzystów</h1>
</header>

<aside>
<img src="ma.jpg" alt="Matura">
<img src="tu.jpg" alt="Matura">
<img src="ra.jpg" alt="Matura">

</aside>  
<a href=""></a>
<section id="pierwszy"> 

  <?php 

    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $imie = $_GET['imie'];
      $nazwisko = $_GET['nazwisko'];

      echo "<h2>".$imie." ".$nazwisko."</h2>";

      $sql = "SELECT arkusz.rok, arkusz.sesja, arkusz.przedmiot, wynik.punkty FROM wynik JOIN arkusz ON arkusz.symbol = wynik.symbol WHERE maturzysta_id = ".$id." ;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_row($result)){
        echo "<h3>".$row[0]." ".$row[1]."</h3>";
        echo "<p>".$row[2].": ".$row[3]."</p>";
      }

    }



  ?>

</section>

<section id="drugi">
  <article class="bloki">
    <h4>Przedmioty</h4>
    <?php 

      $sql = 'SELECT DISTINCT(`przedmiot`) FROM arkusz;';
      $result = mysqli_query($conn, $sql);
      if($result){
        while($row = mysqli_fetch_assoc($result)){
          echo $row['przedmiot']." ";
        }
      }

    ?>

  </article>

  <article class="bloki">
    <h4>Lata</h4>

      <?php 

        $sql = 'SELECT MIN(rok), MAX(rok) FROM arkusz;';
        $result = mysqli_query($conn, $sql);
        if($result){
          while($row = mysqli_fetch_row($result)){
            echo $row[0]." - ".$row[1];
          }
        }

    ?>

  </article>

  <article class="bloki">
    <h4>Najlepszy wynik</h4>

    <?php 

        $sql = 'SELECT maturzysta_id, AVG(punkty) AS `Wynik` FROM wynik GROUP BY punkty DESC LIMIT 1;';
        $result = mysqli_query($conn, $sql);
        if($result){
          while($row = mysqli_fetch_row($result)){
            echo $row[1]."%";
          }
        }

    ?>

  </article>

  <article class="bloki">
    <h4>Najgorszy wynik</h4>

        <?php 

        $sql = 'SELECT maturzysta_id, AVG(punkty) AS `Wynik` FROM wynik GROUP BY punkty ASC LIMIT 1;';
        $result = mysqli_query($conn, $sql);
        if($result){
          while($row = mysqli_fetch_row($result)){
            echo $row[1]."%";
          }
        }

    ?>
    
  </article>
  
</section>

<footer>
  <p>Stronę wykonał: 900729</p>
</footer>

</body>
</html>

<?php
  mysqli_close($conn);
?>