<!DOCTYPE html>
<style>
  form {
  padding: 150px;
}
form input {
  padding: 15px;
  margin: 2px;
  border: 5px solid #ccc;
  opacity: 0.5;
}
form input:hover,
form input:focus {
  opacity: 1;
}
form input:hover:hover,
form input:focus:hover {
  opacity: 1.5;
}
form button {
  background-color: #ffa042;
  color: #fff;
  padding: 3px;
  border: 4px solid #ff9933;
  text-transform: uppercase;
  font-size: 20px;
  width: 229px;
  height: 60px;
}
form button:hover {
  background-color: #fc8b1a;
}
/*===================== АДАПТИВ ======================*/
@media handheld and (max-width: 500px) {
  form {
    margin-left: -19px;
  }
  button {
    margin-left: 17px;
  }
}
</style>
<?php 
  require 'php/db.php';

  $data = $_POST;
  if ( isset($data['do_login']) )
  {
    $user = R::findOne('client', 'login = ?', array($data['login']));
    if ( $user )
    {
      //логин существует
      if ( md5($data['password'], $user->password) )
      {
        //если пароль совпадает, то нужно авторизовать пользователя
        $_SESSION['logged_user'] = $user;
          header('location: persarea.php');
      }else
      {
        $errors[] = 'Неверно введен пароль!';
      }

    }else
    {
      $errors[] = 'Пользователь с таким логином не найден!';
    }
    
    if ( ! empty($errors) )
    {
      //выводим ошибки авторизации
      echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
    }

  }

?>
<?php include("includes/header.php"); ?>

  
<form action="signin.php" class="text-center" method="POST" class="reg">
  <div class="row">
    <h2>Авторизация</h2>
  </div>
  <div class="row">
    <div class="col-md-12">
        <input type="text" placeholder="Логин" name="login" value="<?php echo @$data['login']; ?>">
      </div>
    <div class="col-md-12">
        <input type="password" placeholder="Пароль" name="password" value="<?php echo @$data['password']; ?>">
      </div>
     </div>
     <div class="row">
      <button type="submit" name="do_login">Войти</button><br>
        <a href="registration.php"><button type="button">Нет аккаунта?</button></a><br>    
     </div> 
</form>

  <?php include("includes/footer.php"); ?>