<?php
//прием постовых данных
$name=$_POST['name'];
$phone=$_POST['phone'];
$what=$_POST['what'];
//ящик адресата
$to = "GonZall00@yandex.ru";
//тема и сообщение
$subject = "Заявка с сайта аренды";
$message = "Письмо отправлено из моей формы. <br />
Пользователь хочет: ".htmlspecialchars($what)."<br />
Имя: ".htmlspecialchars($name)."<br />
Телефон: ".htmlspecialchars($phone);
$headers = "From: ScooterShare;
charset=utf-8";

mail ($to, $subject, $message, $headers);
header('location: index.php');
exit();
?>