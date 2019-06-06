<!DOCTYPE html>
<?php 
include("includes/session.php");
include("includes/sideadmin.php");?>

<style>
  #zzz{
      padding: 15px;
      width: 211px;
  margin: 2px;
  border: 5px solid #ccc;
  opacity: 0.5;
  &:hover,
  &:focus {
    opacity: 1;
     &:hover {
      opacity: 1.5;
     } 
}
  }
button#test {
  font-family: "11211";
  border: none;
  background-color: #ff9933;
  color: #fff;
  padding: 17px 15px;
  font-size: 21px;
  text-transform: uppercase;
}
 button#test:hover {
  background-color: #d67513;
}
</style>

<?php
  if ( isset($data['edit']) )
  {
    $price = mysqli_query($connection, "UPDATE price SET cost = '{$data['cost']}' WHERE id_product = '{$data['auto']}'");
    if ($price){
        echo "<div class='row text-center'><h4>Цена успешно изменена!</h4></div>";
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }
   
?>


<form action="ADMINedit.php" method="post" class="text-center">
  <section id="description">
      <div class="container">
    <div class="row" id="premium">
          <div class="col-md-2 col-md-offset-1">
            <h3>Изменение цены товара</h3>            
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>ИД и год продукта</h3>
            <select name="auto" id="zzz" >
            <?php
    $query ="SELECT * FROM product where id <> 0";
    $auto = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($auto)

    {
    $autorows = mysqli_num_rows($auto); // количество полученных строк

    for ($i = 0 ; $i < $autorows ; ++$i)
    {
        $autorow = mysqli_fetch_row($auto);
        echo " <option>$autorow[0] $autorow[1] </option>";
    }
    }
     ?> 
   </select>
          </div>
        
      <div class="col-md-3">
            <h3>Цена за час</h3>            
           <input type="text" name="cost" placeholder="Цена" id="zzz"> 
      </div>
      <div class="col-md-2">
        <h3> </h3>
        <button name="edit" type="submit" id="test">Добавить</button>
      </div>
    </div>
  </div>
</section>
</form>
<?php include("includes/footer.php"); ?>