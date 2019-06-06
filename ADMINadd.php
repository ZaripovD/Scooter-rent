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
  if ( isset($data['addcost']) )
  {
    $price = mysqli_query($connection, "INSERT INTO price (`cost`, `id_product`) VALUES ('{$data['cost']}', '{$data['auto']}')");
    if ($price){
        echo "<div class='row text-center'><h4>Успешно добавлено!</h4></div>";
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }

  if ( isset($data['addmodel']) )
  {
    $mod = mysqli_query($connection, "INSERT INTO product_model (`name`, `id_mark`) VALUES ('{$data['amodel']}', '{$data['mark']}')");
    if ($mod){
        echo "<div class='row text-center'><h4>Успешно добавлено!</h4></div>";
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }

  if ( isset($data['addnumber']) )
  {
    $aut = mysqli_query($connection, "INSERT INTO product ( `id_model`, `id_type`, `year`) VALUES ( '{$data['model']}', '{$data['type']}', '{$data['adate']}')");
    if ($aut){
        echo "<div class='row text-center'><h4>Успешно добавлено!</h4></div>";
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }

  if ( isset($data['addmark']) )
  {
    $mark = mysqli_query($connection, "INSERT INTO mark (`name`) VALUES ('{$data['amark']}')");
    if ($mark){
        echo "<div class='row text-center'><h4>Успешно добавлено!</h4></div>";
      }else{
        echo "Ошибка:". mysqli_error($connection);
      }
  }
   
?>


<form action="ADMINadd.php" method="post" class="text-center">
  <section id="description">
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-md-offset-1">
            <h3>Добавление новой марки</h3>            
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Название марки</h3>
            <input type="text" name="amark" placeholder="Марка" id="zzz"> 
          </div>
        <div class="col-md-2 col-md-offset-3">
            <h3> </h3>
            <button name="addmark" type="submit" id="test">Добавить</button>
      </div>
    </div><br>

        <div class="row">
          <div class="col-md-2 col-md-offset-1">
            <h3>Добавление новой модели</h3>            
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Название марки</h3>
            <select name="mark" id="zzz">
        <?php
    $query ="SELECT * FROM mark where id <> 0";
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
          </div>
        <div class="col-md-3">
            <h3>Название модели</h3>
            <input type="text" name="amodel" placeholder="Модель" id="zzz"> 
      </div>
      <div class="col-md-2">
        <h3> </h3> 
        <button name="addmodel" type="submit" id="test">Добавить</button>
      </div>
    </div><br>


    <div class="row">
          <div class="col-md-1">
            <h3>Добавление нового продукта</h3>            
          </div>
          <div class="col-md-1 col-md-offset-1">
            <h3>Категория</h3>
            <select name="type" id="zzz" >
            <?php
    $query ="SELECT * FROM product_types where id <> 0";
    $type = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($type)

    {
    $typerows = mysqli_num_rows($type); // количество полученных строк

    for ($i = 0 ; $i < $typerows ; ++$i)
    {
        $typerow = mysqli_fetch_row($type);
        echo " <option>$typerow[0] $typerow[1] </option>";
    }
    }
     ?> 
   </select>
          </div>
          <div class="col-md-3 col-md-offset-1">
            <h3>Название модели</h3>
            <select name="model" id="zzz" >
            <?php
    $query ="SELECT * FROM product_model where id <> 0";
    $model = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    if($model)

    {
    $modelrows = mysqli_num_rows($model); // количество полученных строк

    for ($i = 0 ; $i < $modelrows ; ++$i)
    {
        $modelrow = mysqli_fetch_row($model);
        echo " <option>$modelrow[0] $modelrow[1] </option>";
    }
    }
     ?> 
   </select>
          </div>
        <div class="col-md-3">
        <h3>Дата выпуска:</h3><input type="date" name="adate" id="zzz">
      </div>

      <div class="col-md-1">
      <h1> </h1>  
        <button name="addnumber" type="submit" id="test">Добавить</button>
      </div>      
    </div><br>
    
    <div class="row" id="premium">
          <div class="col-md-2 col-md-offset-1">
            <h3>Добавление нового товара</h3>            
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
        <button name="addcost" type="submit" id="test">Добавить</button>
      </div>
    </div>
  </div>
</section>
</form>
<?php include("includes/footer.php"); ?>