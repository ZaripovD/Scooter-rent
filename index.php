<!DOCTYPE html>
<?php include("includes/session.php") ?>


    <section id="main">
      <div class="container">
        <div class="row wow fadeInUp main-header">
          <h1><span>Возьми электросамокат в аренду</span><br><span>и будь счастлив</span></h1>
        </div>
          <div class="row">
            <h3 class="wow fadeInLeft">Устрой тест-драйв в нашем парке. <span>Это бесплатно!</span></h3>
          </div>
          <div class="row main_buttons">
            <button data-toggle="modal" href="#test_modal" id="test" class="wow fadeInLeft">Записаться на тест-драйв</button>
            <a href="#types"><button class="wow fadeInLeft" id="get_types">Посмотреть ассортимент</button></a>
          </div>
      </div>
    </section>

    <section id="description">
      <div class="container">
        <div class="row wow slideInLeft" data-wow-delay="0.2s" id="about">
          <div class="row text-center">
            <h2>О нас</h2>
          </div>
          <div class="col-md-4 col-md-offset-1">
             <p></p>
             <h3>Первый и неповторимый сервис по прокату ЭЛЕКТРОСАМОКАТОВ, ГИРОСКУТЕРОВ и ЭЛЕКТРОСКЕЙТБОРДОВ!</h3>
             <h3>Такое количество классных электротранспортных товаров в </h3><h2>Альметьевске</h2><h3>Где такое видано вообще?!</h3>             
          </div>
             <div class="col-md-4 col-md-offset-3">
               <h2>Почему мы?</h2>
               <h3>Потому что мы единственные, кто предоставляет услуги проката в Альметьевске!</h3>
               <h4>Да ещё и по такой невысокой цене.</h4>
               <h5>оплата только почасовая</h5>
              </div>
       </div>
    </section>

    <section id="types">
     <div class="container">
       <div class="row">
         <div class="section_header text-center">
           <h2>Ассортимент</h2>
         </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
           <div class="card wow bounceInUp" data-wow-delay="0.2s">
             <img src="images/types/1.jpg" alt="Электросамокаты" class="img-responsive center-block">
             <h4>Электросамокаты</h4>
             <br>
              <button class="more" data-toggle="modal" href="#more_scooter">Подробнее</button>
              <button class="rent"><a href="assortment.php">В каталог</a></button>
           </div>
         </div>
          <div class="col-md-4">
           <div class="card wow bounceInUp" data-wow-delay="0.4s">
             <img src="images/types/2.jpg" alt="Гироскутеры" class="img-responsive center-block">
             <h4>Гироскутеры</h4>
             <br>
              <button class="more" data-toggle="modal" href="#more_gyroscooter">Подробнее</button>
              <button class="rent"><a href="assortment.php">В каталог</a></button>
           </div>
         </div>
          <div class="col-md-4">
           <div class="card wow bounceInUp" data-wow-delay="0.6s">
             <img src="images/types/3.jpg" alt="Электроскейтборды" class="img-responsive center-block">
             <h4>Электроскейтборды</h4>
             <br>
              <button class="more" data-toggle="modal" href="#more_scate">Подробнее</button>
              <button class="rent"><a href="assortment.php">В каталог</a></button>
           </div>
        </div>
        </div>
      </div>
    </section>

    


    <section id="feedback">
      <div class="container">
        <div class="row">
          <div class="section_header wow fadeInUp text-center">
            <h2>Отзывы</h2>
          </div>
        </div>
        <div class="row">
          <div class="feedback_slider">
       <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="30000">
         <!-- Индикаторы -->
         <ol class="carousel-indicators">
           <li data-target="#carousel" data-slide-to="0" class="active"></li>
           <li data-target="#carousel" data-slide-to="1"></li>
           <li data-target="#carousel" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
           <div class="item active">
             <div class="row">
               <div class="col-md-4">
                  <img src="images/feedback/1/ph.jpg" alt="...">
               </div>
               <div class="col-md-8">
                 <div class="row">
                   <div class="col-md-2"><img id="avatar" src="images/feedback/1/avatar.jpg" alt="ава" class="img-circle center-block">
                   </div>
                   <div class="col-md-10">
                     <h5>Александр Дугин<br> <a href="https://vk.com/stpdfckndck">vk.com/stpdfckndck</a></h5>
                     
                   </div>
                 </div>
                 <div class="row">
                   <h4>Я никогда вещи в аренду не брал, но сейчас возьму! Сервис проката от народа!</h4>
                 </div>
               </div>
             </div>
           </div>
           <div class="item">
             <div class="row">
               <div class="col-md-4">
                  <img src="images/feedback/2/ph.jpg" alt="...">
               </div>
               <div class="col-md-8">
                 <div class="row">
                   <div class="col-md-2"><img id="avatar" src="images/feedback/2/avatar.jpg" alt="ава" class="img-circle center-block">
                   </div>
                   <div class="col-md-10">
                     <h5>Валентин Григорьев<br> <a href="https://vk.com/tima_basota">vk.com/tima_basota</a></h5>
                     
                   </div>
                 </div>
                 <div class="row">
                   <h4>Я вообще никогда не был за подобные виды транспорта. Самокаты всегда считал детскими игрушками и ездил на своей ВАЗ 2114! Как хорошо, что я решил попробовать всё же что-то новое. Сервис очень удобный и приятный.</h4>
                 </div>
               </div>
             </div>
           </div>
           <div class="item">
              <div class="row">
               <div class="col-md-4">
                  <img src="images/feedback/3/ph.jpg" alt="...">
               </div>
               <div class="col-md-8">
                 <div class="row">
                   <div class="col-md-2"><img id="avatar" src="images/feedback/3/avatar.jpg" alt="ава" class="img-circle center-block">
                   </div>
                   <div class="col-md-10">
                     <h5>Кейси Нейстат<br> <a href="https://ru-ru.facebook.com/cneistat/">facebook.com/cneistat</a></h5>
                     
                   </div>
                 </div>
                 <div class="row">
                   <h4>Ради этого сервиса я выучил русский язык. Очень удобно взять электроскейтборд в аренду, когда у тебя их и так куплено несколько штук. Кстати, подписывайтесь на мой канал.</h4>
                 </div>
               </div>
             </div>
           </div>

       </div>
</div>
          </div>
        </div>
    </section>
            <!-- Подробнее самокаты -->
        <div class="modal fade" id="more_scooter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

              </div>
              <div class="modal-body">
               <div class="row">
                   <div class="header_modal_info">
                     <h4>Электросамокаты</h4>
                   </div>
               </div>
               <div class="row">
                 <div class="col-sm-5">
                   <div class="fotorama">
                     <img src="images/more/scooter/1.jpg" alt="">
                     <img src="images/more/scooter/2.jpg" alt="">
                     <img src="images/more/scooter/3.jpg" alt="">
                   </div>
                 </div>
                 <div class="col-sm-7">
                   <p>С ним нет проблем в транспорте, а большой ресурс батареи позволяет комфортно использовать его для прогулок и в качестве транспортного средства для поездки на работу или учебу, если сядет батарейка его совсем не обязательно тащить на себе, да и дома для него всегда найдется место.</p><br>
                   <h3>Тарифы</h3>
            <p>От 55 рублей</p>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                    <input type="hidden">
                     <a href="#"><button type="button">Арендовать</button></a>
                   </div>
               </div>
              </div>
            </div>
          </div>
        </div>

                    <!-- Подробнее гироскутеры -->
        <div class="modal fade" id="more_gyroscooter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

              </div>
              <div class="modal-body">
               <div class="row">
                   <div class="header_modal_info">
                     <h4>Гироскутеры</h4>
                   </div>
               </div>
               <div class="row">
                 <div class="col-sm-5">
                   <div class="fotorama">
                     <img src="images/more/gyroscooter/1.jpg" alt="">
                     <img src="images/more/gyroscooter/2.jpg" alt="">
                     <img src="images/more/gyroscooter/3.jpg" alt="">
                   </div>
                 </div>
                 <div class="col-sm-7">
                   <p>Уличное электрическое транспортное средство, выполненное в форме поперечной планки с двумя колёсами по бокам. Использует электродвигатели, питаемые от электроаккумулятора, и ряд гироскопических датчиков для самобалансировки и поддержания горизонтального положения площадки для ног.</p><br>
                   <h3>Тарифы</h3>
            <p>От 20 рублей</p>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                    <input type="hidden">
                     <a href="#"><button type="button">Арендовать</button></a>
                   </div>
               </div>
              </div>
            </div>
          </div>
        </div>

                    <!-- Подробнее скейтборды -->
        <div class="modal fade" id="more_scate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

              </div>
              <div class="modal-body">
               <div class="row">
                   <div class="header_modal_info">
                     <h4>Электроскейтборды</h4>
                   </div>
               </div>
               <div class="row">
                 <div class="col-sm-5">
                   <div class="fotorama">
                     <img src="images/more/scate/1.jpg" alt="">
                     <img src="images/more/scate/2.jpg" alt="">
                     <img src="images/more/scate/3.jpg" alt="">
                   </div>
                 </div>
                 <div class="col-sm-7">
                   <p>Это как обычный скейт, только электронный. Олли за вас не сделает, но от необходимости отталкиваться от земли избавит. Не самый тяжелый, очень эргономичный и удобный для перевозки транспорт.</p><br>
                   <h3>Тарифы</h3>
            <p>От 100 рублей</p>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                    <input type="hidden">
                     <a href="#"><button type="button">Арендовать</button></a>
                   </div>
               </div>
              </div>
            </div>
          </div>
        </div>

        
<?php include("includes/footer.php"); ?>