<?php
require_once 'db_utils.php';

//Pobieramy wszystkie zamówienia z bazy danych
$sql = "SELECT * FROM orders";
$results = $db->query($sql);

//Sprawdzamy czy użytkownik jest zalogowany, i ma prawa administratora. Jeśl itak, wyświetlamy stronę.
if (isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
?>
<div class="container pt-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">LP</th>
        <th scope="col">Produkt</th>
        <th scope="col">Użytkownik</th>
        <th scope="col">Status</th>
        <th scope="col">Data</th>
        <th scope="col">Edytuj</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $counter = 0;
      //Tworzymy tabelę w której, za pomocy foreacha, wyświetlamy każde zamówienie.
      foreach ($results as $result) {
        $counter++; //służy do wyświetlania liczby porządkowej

        //Pobieramy dane użytwkownika przypisane do zamówienia
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $result['user_id']);
        $stmt->execute();
        $userresult = $stmt->get_result();
        $user = $userresult->fetch_assoc();

        //Pobieramy dane produktu przypisane do zamówienia
        $sql = "SELECT * FROM products WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $result['product_id']);
        $stmt->execute();
        $productresult = $stmt->get_result();
        $product = $productresult->fetch_assoc();

        //Wyświetlanie danych w tabeli
        echo "<tr>";
        echo "<th scope='row'>".$counter."</th>";
        echo "<td>".$product['name']."</td>";
        echo "<td>".$user['username']."</td>";
        echo "<td>".$result['status']."</td>";
        echo "<td>".$result['order_date']."</td>";
        $id = $result['Id'];
        //Przycisk Edytuj, zawiera w sobie zmienną id, przesyłaną GETem na stronę z edycją zamówienia.
        //Dzięki temu wiemy które zamówienie chcemy edytować.
        echo "<td>
        <a href='editorder.php?id=$id'>
        Edytuj</a></td>";
        echo "</tr>";
      }
       ?>

    </tbody>
  </table>
</div>

<?php
}
//Jeśli użytkownik nie ma praw administratora wyświetlamy odpowiedni komunikat
else {
?>
<div style='margin-bottom:0px !important;' class='alert alert-danger' role='alert'>Brak uprawnień do przeglądania strony</div>
<?php
}
 ?>
