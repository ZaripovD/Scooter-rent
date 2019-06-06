<!doctype html>
<?php include("includes/session.php"); ?>

<div class="container-fluid" >
  <?php include("includes/sideadmin.php") ?>
     

     <section id="types">
      <form action="ADMINstory.php" method="post">
    <aside style="width: 10%; float: right">   
      <ul class="nav bd-sidenav">
        <li>
          <input type="text" name="name" placeholder="ИД клиента">    
          <button type="submit" name="sort">Показать</button>
          <button type="submit" name="reset">Сбросить</button>
        </li>
      </ul>
  </aside>
</form>
      <div class="container">
        <div class="text-center">
            <h1>История операций</h1>
            <div class="col-md-1 col-md-offset-11"></div>
      </div>
<?php
if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
  $del = mysqli_query($connection, "DELETE FROM `rent` WHERE `id` = {$_GET['del_id']}"); 
     
    if ($del) {       
      echo "<div class='row text-center'><h4>Мир забыл об этой операции.</h4></div>";
    } 
  else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
    }
 
}
if (isset($data['sort'])) {
  $idc = $data['name'];
  $sql = mysqli_query($connection,
  "SELECT rent.id as 'Номер операции', product_types.name as 'Класс', mark.name as 'mark', product_model.name as 'Модель', rent.start_rent as 'Начало аренды', rent.end_rent as 'Конец аренды', price.cost as 'Цена за час', fines.name as 'Штрафы', rent.summary as 'Всего',  client.id as 'ID', client.login as 'login'
   FROM rent
   left join client on rent.id_client = client.id 
   left JOIN price on rent.id_price = price.id
   left join product on price.id_product = product.id    
   left JOIN product_model on product.id_model = product_model.id
   left join mark on product_model.id_mark = mark.id
   left join fines on rent.id_fines = fines.id
   left join product_types on product.id_type = product_types.id
   where client.id = '$idc'");

if (!$sql) {
  echo mysqli_error($connection);
}

echo "<div class='container'>";

while ($result = mysqli_fetch_array($sql)) {

      echo "
      <div class='row'>
         <div class='col-md-1'>
              <h5>Номер операции</h5>
              {$result['Номер операции']}
         </div>
         <div class='col-md-1'>
              <h5>ИД клиента</h5>
              {$result['ID']}
         </div>
         <div class='col-md-1'>
              <h5>Логин клиента</h5>
              {$result['login']}
         </div>
     <div class='info'>
         <div class='col-md-1'>
              <h5>Класс</h5>
              {$result['Класс']}
         </div>         
         <div class='col-md-1 col-md-offset-1'>
              <h5>Модель</h5>
              {$result['Модель']}
         </div>
         <div class='col-md-2 col-md-offset-1'>
              <h5>Начало аренды</h5>
              {$result['Начало аренды']}
         </div>
         <div class='col-md-2'>
              <h5>Конец аренды</h5>
              {$result['Конец аренды']}
         </div>         
         <div class='col-md-1'>
              <h5>Штрафы</h5>
              {$result['Штрафы']}
         </div>
         <div class='col-md-1'>
              <h3><a href='?del_id={$result['Номер операции']}'>Удалить</a></h3>
         </div>
         <div class='col-md-12'>
              <h3>Всего
              {$result['Всего']} Руб</h3>
         </div>       
         
     </div>
 </div>";
    }
echo "</div>";
}else{if (isset($data['reset'])) {
    header('location:ADMINstory.php');
  }else{
$sql = mysqli_query($connection,
  "SELECT rent.id as 'Номер операции', product_types.name as 'Класс', mark.name as 'mark', product_model.name as 'Модель', rent.start_rent as 'Начало аренды', rent.end_rent as 'Конец аренды', price.cost as 'Цена за час', fines.name as 'Штрафы', rent.summary as 'Всего',  client.id as 'ID', client.login as 'login'
   FROM rent
   left join client on rent.id_client = client.id 
   left JOIN price on rent.id_price = price.id
   left join product on price.id_product = product.id    
   left JOIN product_model on product.id_model = product_model.id
   left join mark on product_model.id_mark = mark.id
   left join fines on rent.id_fines = fines.id
   left join product_types on product.id_type = product_types.id");

if (!$sql) {
  echo mysqli_error($connection);
}

echo "<div class='container'>";

while ($result = mysqli_fetch_array($sql)) {

      echo "
      <div class='row'>
         <div class='col-md-1'>
              <h5>Номер операции</h5>
              {$result['Номер операции']}
         </div>
         <div class='col-md-1'>
              <h5>ИД клиента</h5>
              {$result['ID']}
         </div>
         <div class='col-md-1'>
              <h5>Логин клиента</h5>
              {$result['login']}
         </div>
     <div class='info'>
         <div class='col-md-1'>
              <h5>Класс</h5>
              {$result['Класс']}
         </div>         
         <div class='col-md-1 col-md-offset-1'>
              <h5>Модель</h5>
              {$result['Модель']}
         </div>
         <div class='col-md-2 col-md-offset-1'>
              <h5>Начало аренды</h5>
              {$result['Начало аренды']}
         </div>
         <div class='col-md-2'>
              <h5>Конец аренды</h5>
              {$result['Конец аренды']}
         </div>         
         <div class='col-md-1'>
              <h5>Штрафы</h5>
              {$result['Штрафы']}
         </div>
         <div class='col-md-1'>
              <h3><a href='?del_id={$result['Номер операции']}'>Удалить</a></h3>
         </div>
         <div class='col-md-12'>
              <h3>Всего
              {$result['Всего']} Руб</h3>
         </div>       
         
     </div>
 </div>";
    }
echo "</div>";
}
}
?>
</div>
 
    </section>
</div>
<?php include("includes/footer.php"); ?>