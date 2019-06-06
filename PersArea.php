<!DOCTYPE html>
<title>Личный кабинет</title>

<?php include("includes/session.php");
include("includes/sidebar.php"); ?>

<div class="container-fluid" >
      

     <section id="description">
      <div class="container">
        <div class="text-center">
            <h1>Личная карточка</h1>
            <div class="col-md-1 col-md-offset-11">
          <a href="PersEdit.php">Обновить информацию</a>
      </div>
          </div>
        <div class="row">
          <div class="row">
          <div class="col-md-3 col-md-offset-1">
            <h3>Фамилия:</h3>
            <p><?php echo $_SESSION['logged_user']->family;?></p>
            <h3>Имя:</h3>
            <p><?php echo $_SESSION['logged_user']->name; ?></p>
            <h3>Отчество:</h3>
            <p><?php echo $_SESSION['logged_user']->father; ?></p>
            <br>
          </div>
          <div class="col-md-3 col-md-offset-1">
            
            <h3>Номер телефона:</h3>
            <p><?php echo $_SESSION['logged_user']->phone; ?></p>
            
            <br>
          </div>
          <div class="col-md-3 col-md-offset-1">            
            <h3>Логин:</h3>
            <p><?php echo $_SESSION['logged_user']->login; ?></p>
            <h3>Электронная почта:</h3>
            <p><?php echo $_SESSION['logged_user']->email; ?></p>            
          </div>        
        </div>
      </div>
    </div>
 
    </section>
</div>

 <?php include("includes/footer.php"); ?>