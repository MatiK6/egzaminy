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
  <h3>Wybierz ucznia z listy:</h3>
  <?php 

      $sql = "SELECT id, imie, nazwisko FROM maturzysta WHERE szkola = 'T3' GROUP BY nazwisko ASC;";
      $result = mysqli_query($conn, $sql);
      if($result){
        while($row = mysqli_fetch_row($result)){
          echo "<a href='./wynik.php?id=$row[0]&imie=$row[1]&nazwisko=$row[2]'>".$row['0'].". ".$row[1]." ".$row[2]."</a></br>";


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