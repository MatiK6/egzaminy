<?php
$conn = mysqli_connect('localhost','root','','zgloszenia');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZGŁOSZENIA</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  
<header>
  <h1>Zgłoszenia wydarzeń</h1>
</header>

<main>

  <section id="sectionLeft">
    <h2>Personel</h2>
    <form action="index.php" method="post">
      <input type="radio" name="personelOption" id="personelPolicjant" checked value="Policjant"> Policjant
      <input type="radio" name="personelOption"  id="personelRatownik" value="Ratownik"> Ratownik
      <button type="submit">Pokaż</button>
    </form>
    <table>
      <tr>
        <th>Id</th>
        <th>Imię</th>
        <th>Nazwisko</th>
      </tr>
        <?php
          if(isset($_POST['personelOption'])){
            $pOption = $_POST['personelOption'];
            echo "<h3> Wybrano opcję: ".$pOption."</h3>";
            $sql ="SELECT id, imie, nazwisko FROM personel WHERE status = '$pOption';";
            $res = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_row($res)){
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>".$row[2]."</td>";
              echo "</tr>";

            }

          }
          else{
            $sql ="SELECT id, imie, nazwisko FROM personel WHERE status = 'policjant';";
            echo "<h3> Wybrano opcję: Policjant</h3>";
            $res = mysqli_query($conn,$sql);  
            while($row = mysqli_fetch_row($res)){
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>".$row[2]."</td>";
              echo "</tr>";
            }
          }

        ?>
    </table>
  </section>
  
  
  <section id="sectionRight">
    <h2>Nowe zgłoszenie</h2>
    <ol>
      <?php
        $sql = "SELECT personel.id, personel.nazwisko FROM personel LEFT JOIN rejestr ON personel.id = rejestr.id_personel WHERE rejestr.id_personel IS NULL;";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_row($res)){
          echo "<li>".$row[0]." ".$row[1]."</li>";
        }
      ?>
    </ol>
    <form action="index.php" method="post">
      <label for="idOsoby">Wybierz id osoby z listy</label>
      <input type="number" name="idOsoby" id="idOsoby">
      <button type="submit">Dodaj zgłoszenie</button>
    </form>

  </section>


</main>

<footer>
<p>Stronę wykonał: 27356890211</p>
</footer>

</body>
</html>

<?php
if(isset($_POST['idOsoby'])){
  $idOsoby = $_POST['idOsoby'];
  $sql = "INSERT INTO `rejestr` (`id`, `data`, `id_personel`, `id_pojazd`) VALUES (NULL, CURRENT_DATE(), '$idOsoby', '14');";
  mysqli_query($conn,$sql);
}


mysqli_close($conn)
?>