<!DOCTYPE html>
<?php include("includes/session.php") ?>
<form action="assortment.php" method="post">
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
      </select>
              <button type="submit" name="sort">Показать</button>
              <button type="submit" name="reset">Сбросить</button>
            </a>
          </li>
      </ul>
  </aside>
</form>
<section id="types">
<?php 
if (isset($data['sort'])) {
  $type = $data['type'];
  $sql = mysqli_query($connection,
  "SELECT price.id as 'id', product_types.name as 'Категория', product_model.name as 'Модель', product.year as 'Дата выпуска', mark.name as 'mark', price.cost as 'цена'
   FROM price
   left JOIN product on price.id_product = product.id   
   left JOIN product_model on product.id_model = product_model.id
   left join product_types on product.id_type = product_types.id
   left join mark on  product_model.id_mark = mark.id
   where product.id <> 0 and product_types.id = '$type'");
  
if (!$sql) {
  echo mysqli_error($connection);
}

echo "<div class='container'>";
while ($result = mysqli_fetch_array($sql)) {
      echo "
      <div class='col-md-4'>
     <div class='title'>
         <h3>{$result['mark']}</h3>
         <h3>{$result['Модель']}</h3>
     </div>
     <div class='info'>         
         <p>{$result['Категория']}</p>
         <p>Выпуск: {$result['Дата выпуска']}</p>
         <p>Стоимость за час: {$result['цена']} Р</p>
         <button data-toggle='modal' href='#rent_modal'><a href='?rent_id={$result['id']}'>арендовать</a></button>
     </div>
 </div>";
    }

echo "</div>";
}else{ if (isset($data['reset'])) {
  header('location:assortment.php');
}

$sql = mysqli_query($connection,
	"SELECT price.id as 'id', product_types.name as 'Категория', product_model.name as 'Модель', product.year as 'Дата выпуска', mark.name as 'mark', price.cost as 'цена'
   FROM price
   left JOIN product on price.id_product = product.id   
   left JOIN product_model on product.id_model = product_model.id
   left join product_types on product.id_type = product_types.id
   left join mark on  product_model.id_mark = mark.id
   where product.id <> 0");
if (!$sql) {
  echo mysqli_error($connection);
}

echo "<div class='container'>";
while ($result = mysqli_fetch_array($sql)) {
      echo "
      <div class='col-md-4'>
     <div class='title'>
         <h3>{$result['mark']}</h3>
         <h3>{$result['Модель']}</h3>
     </div>
     <div class='info'>
         <p>{$result['Категория']}</p>
         <p>Выпуск: {$result['Дата выпуска']}</p>
         <p>Стоимость за час: {$result['цена']} Р</p>
         <button data-toggle='modal' href='#rent_modal'><a href='?rent_id={$result['id']}'>арендовать</a></button>
     </div>
 </div>";
    }

echo "</div>";
}
 if (isset($_GET['rent_id'])) {

  $sql = mysqli_query($connection,
 "SELECT price.id as 'ID', product_types.name as 'Класс', mark.name as 'mark', product_model.name as 'Модель', product.year as 'Дата выпуска', price.cost as 'Цена'
   FROM price
   left join product on price.id_product = product.id
   left join product_types on product.id_type = product_types.id
   left JOIN product_model on product.id_model = product_model.id
   left join mark on product_model.id_mark = mark.id
   where price.id = {$_GET['rent_id']}");

if (!$sql) {
  echo mysqli_error($connection);
}

while ($result = mysqli_fetch_array($sql)) {
  echo "
   <form action='assortment.php' method='post'>
 <div class='modal fade' id='rent_modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                  <h1>Аренда <span>{$result['mark']} </span><span>{$result['Модель']}</span></h1>
              </div>
              <div class='modal-body'>
              <div class='row'>
               <div class='col-sm-3'>
  <label> Класс: {$result['Класс']}</label>    
</div>
<div class='col-sm-5'>
  <h4>Начало аренды</h4>
  <input type='datetime-local' name='startR'>
  <h4>Конец аренды</h4>
<input type='datetime-local' name='endR'>
</div>
<div class='col-sm-4'>  
    <input type='hidden' name='costR' value='{$result['Цена']}'>
    <label name='cost' >Цена за час: {$result['Цена']} руб</label>     
    <input type='hidden' name='idi' value='{$result['ID']}'> 
    <input type='hidden' name='what' value='Арендовать {$result['mark']} {$result['Модель']}'>
</div>
</div>
<div class='col-md-12'>

  <button type='submit' name='go_rent' id='test'>Арендовать</button>

</div>
</div>
              </div>
            </div>
          </div>
        
        </form>";
}
}
$mark=$result['Марка'];
      $model=$result['Модель'];
  if ( isset($data['go_rent']) )
    { if (!$ses){
  echo "<div class='row text-center'> <h4>Аренда доступна только авторизованным пользователям!</div></h4>";
 }else{
      
      $startR = strtotime($data['startR']);
      $endR = strtotime($data['endR']);
      $days = ($endR - $startR) / (60 * 60);
      $cd = $data['costR'];      
      $sum = $days * $cd;
       $rent = mysqli_query($connection,"
         INSERT INTO rent
         (`id_client`, `start_rent`, `end_rent`, `id_price`, `summary`) VALUES
         ('$sesid', '{$data['startR']}', '{$data['endR']}', {$data['idi']}, '$sum') ");
      
      if (!$rent) {
  echo mysqli_error($connection);
}else {
    
    $name=$_SESSION['logged_user']->login;
    $phone=$_SESSION['logged_user']->phone;
    $what=$_POST['what'];
    //ящик адресата
    $to = "GonZall00@yandex.ru";
    //тема и сообщение
    $subject = "Заявка с сайта аренды";
    $message = "Письмо отправлено из моей формы. 
    Пользователь хочет: ".htmlspecialchars($what)."
    Логин: ".htmlspecialchars($name)."
    Телефон: ".htmlspecialchars($phone)."
    С: ".htmlspecialchars($data['startR'])."
    По: ".htmlspecialchars($data['endR'])."
    Сумма к оплате: ". htmlspecialchars($sum)." рублей";
    $headers = "From: mysite.ru <site-email@mysite.ru>; Content-type: text/html;
    charset=utf-8";
    mail ($to, $subject, $message, $headers);

    echo "<div class='row text-center'><h4>Товар арендован! Приходите {$data['startR']} и заберите его. Вернуть до: {$data['endR']}.<br> Сумма к оплате: $sum руб</h4></div>";    
}
}
    }
 ?>

     </section>
<?php include("includes/footer.php"); ?>