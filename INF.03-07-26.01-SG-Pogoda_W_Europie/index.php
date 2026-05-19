<?php 
  $conn = mysqli_Connect('localhost','root','','pogoda');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Pogoda</title>
</head>
<link rel="stylesheet" href="styl.css">
<body>
  
<header id="nag1">
  <img src="slonce.png" alt="Słonecznie">
  
</header>

<header id="nag2">
  <h1>Pogoda w Europie</h1>
</header>

<main>

  <section id="lewy">
    <h2>Temperatury w lipcu</h2>

    <table>
      <tr>
        <th>Miasto</th>
        <th>Kraj</th>
        <th>Temperatura</th>
        <th>Pogoda</th>
      </tr>


        <?php

          $sql = "SELECT miejscowosc.nazwa, miejscowosc.kraj, pomiary.temperatura FROM miejscowosc JOIN pomiary ON id_miejscowosc = miejscowosc.id WHERE pomiary.id_miesiac = 7;";
          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_array($result)){
            echo "<tr>";

              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>".$row[2]."</td>";
            
              $temp_check = $row[2];
              if($temp_check > 30){
                echo "<td><img src='slonce.png'></td>";
              }
              elseif($temp_check < 26){
                echo "<td><img src='deszcz.png'></td>";
              }
              else{
                echo "<td><img src='chmury.png'></td>";
              }


              echo "</tr>";

          }

        ?>

    </table>
    

  </section>

  <section id="prawy">
    <h2>Średnie temperatury w roku</h2>
    <a href="index.php?id=1">Styczeń</a>
    <a href="index.php?id=2">Luty</a>
    <a href="index.php?id=3">Marzec</a>
    <a href="index.php?id=4">Kwiecień</a>
    <a href="index.php?id=5">Maj</a>
    <a href="index.php?id=6">Czerwiec</a>
    <a href="index.php?id=7">Lipiec</a>
    <a href="index.php?id=8">Sierpień</a>
    <a href="index.php?id=9">Wrzesień</a>
    <a href="index.php?id=10">Paździenik</a>
    <a href="index.php?id=11">Listopad</a>
    <a href="index.php?id=12">Grudzień</a>
    
    <p>Średnia temperatura dla wybranego miesiąca wynosi:</p>

    <?php

      if(isset($_GET['id'])){
        
        $id = $_GET['id'];
        $sql = "SELECT ROUND(AVG(temperatura),2) FROM pomiary WHERE id=$id;";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)){
          echo "<h3>".$row[0]."</h3>";

        }
      
      }

    ?>


  </section>

</main>

<footer><p>Numer zdającego: 2819476908</p></footer>

</body>
</html>

<?php
mysqli_close($conn);
?>