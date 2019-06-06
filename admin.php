<!DOCTYPE html>
<?php include("includes/session.php") ;
include("includes/sideadmin.php");?> 
<section id="description">
  <form action="admin.php" method="post">
    <aside style="width: 10%; float: right">   
      <ul class="nav bd-sidenav">
        <li>
            <select name="type" id="zzz">
        <?php
    $query ="SELECT * FROM product_types where id <> 0";
    $mark = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($mark)

    {
    $markrows = mysqli_num_rows($mark); // количество полученных строк

    for ($i = 0 ; $i < $markrows ; ++$i)
    {
        $markrow = mysqli_fetch_row($mark);
        echo " <option>$markrow[0] $markrow[1] </option>";
    }
    }
     ?>
      </select></li><li>
              <button type="submit" name="sort">Показать</button>
            <button type="submit" name="reset">Сбросить</button>
          </li>
      </ul>
  </aside>
</form>

<?php 

if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
  $del = mysqli_query($connection, "DELETE FROM `price` WHERE `id_product` = {$_GET['del_id']}");
  $up = mysqli_query($connection, "UPDATE `rent` SET `id_price` = 0 where rent.id_price= {$_GET['del_id']}");    
     
    if ($del) {
       if ($up){
      echo "<p>Товар удален.</p>";
    }  
  }else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
    }
 
} 
if (isset($data['sort'])) {
  $type = $data['type'];
  $sql = mysqli_query($connection,
  "SELECT  price.id as 'ID', product_types.name as 'Класс', product_model.name as 'Модель', product.year as 'Дата выпуска', price.cost as 'Цена'
   FROM price
   left join product on price.id_product = product.id
   left JOIN product_model on product.id_model = product_model.id
   left join product_types on product.id_type = product_types.id   
   WHERE price.id <> '0' and product_types.id = '$type'");
  
if (!$sql) {
  echo mysqli_error($connection);
}

echo "<div class='container text-center'>";

while ($result = mysqli_fetch_array($sql)) {
      echo "<div class='row'>  

         <div class='col-md-2'>
              <h4>ИД товара</h4>
              {$result['ID']}
         </div>

     
         <div class='col-md-2'>
              <h4>Класс</h4>
              {$result['Класс']}
         </div>
        
         <div class='col-md-2'>
              <h4>Модель</h4>
              {$result['Модель']}
         </div>
         
         <div class='col-md-2'>
              <h4>Цена за час</h4>
              {$result['Цена']}
         </div>

         <div class='col-md-2'>
         <br>
              <a href='?del_id={$result['ID']}'>Удалить</a>
         </div>          
 </div> <br>";
    }
echo "</div>";
}else{
  if (isset($data['reset'])) {
    header('location:admin.php');
  }else{
$sql = mysqli_query($connection,
  "SELECT price.id as 'ID', product_types.name as 'Класс', product_model.name as 'Модель', product.year as 'Дата выпуска', price.cost as 'Цена'
   FROM price
   left join product on price.id_product = product.id
   left JOIN product_model on product.id_model = product_model.id
   left join product_types on product.id_type = product_types.id
   
   WHERE price.id <> '0'");

if (!$sql) { 
  echo mysqli_error($connection);
}
echo "<div class='container text-center'>";

while ($result = mysqli_fetch_array($sql)) {
      echo "<div class='row'>  

         <div class='col-md-2'>
              <h4>ИД товара</h4>
              {$result['ID']}
         </div>

     
         <div class='col-md-2'>
              <h4>Класс</h4>
              {$result['Класс']}
         </div>
        
         <div class='col-md-2'>
              <h4>Модель</h4>
              {$result['Модель']}
         </div>
         
         <div class='col-md-2'>
              <h4>Цена за час</h4>
              {$result['Цена']}
         </div>

         <div class='col-md-2'>
         <br>
              <a href='?del_id={$result['ID']}'>Удалить</a>
         </div>          
 </div> <br>";
    }
echo "</div>";
}
}
if (isset($_GET['red_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($connection, "SELECT price.id as 'ID', product_types.name as 'Класс', product_model.name as 'Модель', product.year as 'Дата выпуска', price.cost as 'Цена'
   FROM price
   left join product on price.id_product = product.id
   left JOIN product_model on product.id_model = product_model.id
   left join product_types on product.id_type = product_types.id   
   WHERE 'ID' = {$_GET['red_id']}");

  if (!$sql) { 
  echo mysqli_error($connection);
}
echo "<div class='container text-center'>";

while ($result = mysqli_fetch_array($sql)) {
      echo "
      <div class='row'>
         <div class='col-md-1'>
              <h5>ИД автомобиля</h5>
              <input>{$result['ID']}</input>
         </div>
     <div class='info'>
         <div class='col-md-1'>
              <h5>Класс</h5>
              <input>{$result['Класс']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Марка</h5>
              <input>{$result['Марка']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Модель</h5>
              <input>{$result['Модель']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Номер</h5>
              <input>{$result['Номер']}</input>
         </div>         
         <div class='col-md-1'>
              <h5>Цена за час</h5>
              <input>{$result['Цена за час']}</input>
         </div>
         <div class='col-md-1'>
              <h5>Цена за сутки</h5>
             <input> {$result['Цена за сутки']}</input>
         </div>
         <div class='col-md-1'>
         <h5> </h5>
              <a href='?del_id={$result['ID']}'>Удалить</a>
         </div>  
         <div class='col-md-1'>
         <h5> </h5>
              <a href='?red_id={$result['ID']}'>Изменить</a>
         </div>               
         
     </div>
 </div>";
    }
echo "</div>";

}
 ?>

</section>
 
<?php include("includes/footer.php"); ?>


