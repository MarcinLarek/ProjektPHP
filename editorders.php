<?php
require_once 'db_utils.php';

$sql = "SELECT * FROM orders";
$results = $db->query($sql);

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
      foreach ($results as $result) {
        $counter++;

        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $result['user_id']);
        $stmt->execute();
        $userresult = $stmt->get_result();
        $user = $userresult->fetch_assoc();

        $sql = "SELECT * FROM products WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $result['product_id']);
        $stmt->execute();
        $productresult = $stmt->get_result();
        $product = $productresult->fetch_assoc();

        echo "<tr>";
        echo "<th scope='row'>".$counter."</th>";
        echo "<td>".$product['name']."</td>";
        echo "<td>".$user['username']."</td>";
        echo "<td>".$result['status']."</td>";
        echo "<td>".$result['date']."</td>";
        $id = $result['Id'];
        echo "<td>
        <a href='editorder.php?id=$id'>
        Edytuj</a></td>";
        echo "</tr>";
      }
       ?>

    </tbody>
  </table>
</div>
