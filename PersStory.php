<!DOCTYPE html>
<title>Личный кабинет</title>

<?php include("includes/session.php");
include("includes/sidebar.php");  ?>

<div class="container-fluid" >
      

     <section id="description">
      <div class="container">
        <div class="text-center">
            <h1>История операций</h1>
            <div class="col-md-1 col-md-offset-11">
      </div>
    <?php 
$sesid = $_SESSION['logged_user']->id;

$sql = mysqli_query($connection,
  "SELECT rent.id as 'Номер операции', product_types.name as 'Класс', product_model.name as 'Модель', rent.start_rent as 'Начало аренды', rent.end_rent as 'Конец аренды', price.cost as 'Цена за час',  fines.name as 'Штрафы', rent.summary as 'Всего'
   FROM rent     
    join fines on rent.id_fines = fines.id
    join price on rent.id_price = price.id
    join product on price.id_product = product.id
    join product_model on product.id_model = product_model.id
    join product_types on product.id_type = product_types.id
   where id_client = $sesid");
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
     <div class='info'>
         <div class='col-md-1'>
              <h5>Класс</h5>
              {$result['Класс']}
         </div>         
         <div class='col-md-1'>
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
              <h5>Цена за час</h5>
              {$result['Цена за час']}
         </div>
         <div class='col-md-1'>
              <h5>Штрафы</h5>
              {$result['Штрафы']}
         </div>
         <div class='col-md-12'>
              <h3>Всего
              {$result['Всего']} Руб</h3>
         </div>       
         
     </div>
 </div>";
    }
echo "</div>";

 ?>
        
    </div>
 
    </section>
</div>

 <?php include("includes/footer.php"); ?>