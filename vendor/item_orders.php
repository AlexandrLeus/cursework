<?php
session_start();

require_once 'connect.php';
if ($_SESSION['user']['password'] == "4297f44b13955235245b2497399d7a93" && $_SESSION['user']['email'] == "admin@admin") {

  $orders = mysqli_query($connect, "SELECT * FROM `orders` ORDER BY `id` ");

  while ($row = mysqli_fetch_assoc($orders)) :
    $id = $row['id'];
?>
    <tr class="orders_block text_size18">
      <td><?php echo $id ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><?php echo $row['product_name'] ?></td>
      <td><?php echo $row['product_info'] ?></td>
      <td><?php echo $row['final_price'] ?> $</td>
      <td><?php echo $row['status'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><button type="button" class="control" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id ?>">Управление заказом</button></td>
    </tr>
      <!-- modal window -->
      <div class="modal fade" id="exampleModal<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Панель управления заказом #<?php echo $id ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Выберите опцию:
          </div>
          <div class="modal-footer">
            <button type="button" onclick="document.location='../vendor/confirm_and_cancel.php?cancel_id=<?php echo $id ?>'" class="cancelbtn">Отменить заказ</button>
            <button type="button" onclick="document.location='../vendor/confirm_and_cancel.php?status_id=<?php echo $id ?>'" class="confirmbtn">Подтвердить заказ</button>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  <?php } else {


  $user_id = $_SESSION['user']['id'];
  $orders = mysqli_query($connect, "SELECT * FROM `orders` WHERE `id_user` = '$user_id'");

  while ($row = mysqli_fetch_assoc($orders)) :
    $id = $row['id'];
  ?>
    <tr class="orders_block text_size18">
      <td><?php echo $id ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><?php echo $row['product_name'] ?></td>
      <td><?php echo $row['product_info'] ?></td>
      <td><?php echo $row['final_price'] ?> $</td>
      <td><?php echo $row['status'] ?></td>
      <td><button type="button" onclick="document.location='../vendor/confirm_and_cancel.php?cancel_id=<?php echo $id ?>'" class="cancelbtn" style="font-weight: bold;">Отменить заказ</button></td>
    </tr>
<?php endwhile;
} ?>
