<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

    $user = new \Nordic\Core\User($_COOKIE['user_id']);

    if($user->getField('user_group') != 2){
      header("Location: http://localhost:8080/eshop/catalog.php");
    }


?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Базовая панель администратора с фиксированной боковой панелью и навигационной панелью.">

    <title>Панель администратора</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <!-- <base target="name"> -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>

  <body>

<script defer>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4481610-59', 'auto');
  ga('send', 'pageview');

</script>

<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(39705265, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39705265" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8588635311388465",
    enable_page_level_ads: true
  });
</script>


    <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Магазин одежды</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="../system/controllers/users/logout.php">Выйти</a>
            </li>
        </ul>
    </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="?page=orders">
              <span data-feather="file"></span>
              Заказы
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=items">
              <span data-feather="shopping-cart"></span>
              Товары
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=users">
              <span data-feather="users"></span>
              Клиенты
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
      </div>

      <? if(isset($_GET['new']) && $_GET['new'] == 'item') {?>
        <form action="../system/controllers/goods/create.php" enctype="multipart/form-data" method="post" style="max-width:400px;">
          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Название товара">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="articul" placeholder="Артикул">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="Цена"> руб.
          </div>

          <div class="form-group">
            Выбрать файл
            <input type="file" class="form-control" name="photo"> руб.
          </div>

          <?  
              $connect = new \Nordic\Core\Connect();
              $result = mysqli_query($connect->getConnection(), "SELECT * FROM `categories`");
              while($info = mysqli_fetch_assoc($result)){
                $arr_category[$info['id']] = $info['title'];
              }
          ?>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" name="category_id">
              <?foreach ($arr_category as $key=>$value){?>
                  <option value="<?=$key?>"><?=$value?></option>
              <?}?>
            </select>
          </div>

          <?  
              $result = mysqli_query($connect->getConnection(), "SELECT * FROM `itemtypes`");
              while($info = mysqli_fetch_assoc($result)){
                $arr_type[$info['id']] = $info['title'];
              }
          ?>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Тип товара</label>
            <select class="form-control" name="type_id">
              <?foreach ($arr_type as $key=>$value){?>
                  <option value="<?=$key?>"><?=$value?></option>
              <?}?>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание товара</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
          </div>

          <div class="form-group form-check">
            Новинка
            <input type="checkbox"  name="is_new" value="1">
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Создать</button>
          </div>
          
        </form>
      <?}elseif(isset($_GET['new']) && $_GET['new'] == 'client'){?>
        <form action="../system/controllers/users/create.php" method="post" style="max-width:400px;">
          <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="Логин">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="E-mail">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Пароль">
          </div>
          <?  
              $connect = new \Nordic\Core\Connect();
              $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_user_groups`");
              while($info = mysqli_fetch_assoc($result)){
                $arr_groups[$info['id']] = $info['title'];
              }
          ?>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Группа пользователя</label>
            <select class="form-control" name="user_group">
              <?foreach ($arr_groups as $key => $value){?>
                  <option value="<?=$key?>"><?=$value?></option>
              <?}?>
            </select>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Создать</button>
          </div>
          
        </form>
      <?} elseif (isset($_GET['change']) && ($_GET['change']=='item') && isset($_GET['id'])) {?>

        <? $good = new \Nordic\Core\Good($_GET['id']); ?>

        <form action="../system/controllers/goods/update.php" enctype="multipart/form-data" method="post" style="max-width:400px;">
          
          <input type="hidden" value="<?=$good->getField('id')?>" name="id">

          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Название товара" value="<?=$good->getField('title')?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="articul" placeholder="Артикул" value="<?=$good->getField('articul')?>">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="Цена" value="<?=$good->getField('price')?>"> руб.
          </div>

          <div class="form-group">
            Выбрать файл
            <img style="width:300px;" src="http://localhost:8080/eshop/<?=$good->getField('photo')?>"/>
            <input type="file" class="form-control" name="photo"> руб.
          </div>

          <?  
              $category = new \Nordic\Core\Category($good->getField('category_id'));

              $connect = new \Nordic\Core\Connect();
              // $arr_category = array();
              $result = mysqli_query($connect->getConnection(), "SELECT * FROM `categories`");
              while($info = mysqli_fetch_assoc($result)){
                $arr_category[$info['id']] = $info['title'];
              }
          ?>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" name="category_id">
              <option value="<?=$category->getField('id')?>"><?=$category->getField('title')?></option>
              <?foreach ($arr_category as $key=>$value){?>
                <?if ($key != $category->getField('id')) {?>
                  <option value="<?=$key?>"><?=$value?></option>
                <?}?>
              <?}?>
            </select>
          </div>

          <?  
              $type = new \Nordic\Core\Type($good->getField('type_id'));

              $result = mysqli_query($connect->getConnection(), "SELECT * FROM `itemtypes`");
              while($info = mysqli_fetch_assoc($result)){
                $arr_type[$info['id']] = $info['title'];
              }
          ?>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Тип товара</label>
            <select class="form-control" name="type_id">
              <option value="<?=$type->getField('id')?>"><?=$type->getField('title')?></option>
              <?foreach ($arr_type as $key=>$value){?>
                <?if ($key != $type->getField('id')) {?>
                  <option value="<?=$key?>"><?=$value?></option>
                <?}?>
              <?}?>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание товара</label>
            <textarea class="form-control" name="description" rows="3"><?=$good->getField('description')?></textarea>
          </div>

          <div class="form-group form-check">
            Новинка
            <input type="hidden" value="0" name="is_new">
            <input type="checkbox"  <? if ($good->getField('is_new')) {?> checked <?}?> name="is_new" value="1">
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
          
        </form>
      <?} elseif (isset($_GET['change']) && ($_GET['change']=='client') && isset($_GET['id'])) {?>
        
        <? $user = new \Nordic\Core\User($_GET['id']); ?>

        <form action="../system/controllers/users/update.php" method="post" style="max-width:400px;">
          
          <input type="hidden" value="<?=$user->getField('id')?>" name="id">
          
          <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="Логин" value="<?=$user->getField('login')?>">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?=$user->getField('email')?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Новый пароль">
          </div>
          <?  
              $group = new \Nordic\Core\UserGroup($user->getField('user_group'));

              $connect = new \Nordic\Core\Connect();
              $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_user_groups`");
              while($info = mysqli_fetch_assoc($result)){
                $arr_groups[$info['id']] = $info['title'];
              }
          ?>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Группа пользователя</label>
            <select class="form-control" name="user_group">
              <option value="<?=$group->getField('id')?>"><?=$group->getField('title')?></option>
              <?foreach ($arr_groups as $key => $value){?>
                  <?if($key != $group->getField('id')){?>
                    <option value="<?=$key?>"><?=$value?></option>
                  <?}?>
              <?}?>
            </select>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
          
        </form>
      <?} else {?>
      

      <?}?>
      <?if (isset($_GET['page']) && $_GET['page'] == 'items') {?>
        <div>
          <a href="?new=item" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">+ создать</a>
        </div>
        <h2>Товары</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
            
              <tr>
                <th>#id</th>
                <th>Название</th>
                <th>Артикул</th>
                <th>Цена</th>
                <th>Описание</th>
                <th>Категория</th>
                <th>Тип товара</th>
                <th>Новинка</th>
              </tr>
            </thead>
            <tbody>
              <?
                $connect = new \Nordic\Core\Connect(); 
                $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_goods`");
                while($info = mysqli_fetch_assoc($result)){
                    $category = new \Nordic\Core\Category($info['category_id']);
                    $type = new \Nordic\Core\Type($info['type_id']);
                    ?>
                    <tr>
                      <td><?=$info['id']?></td>
                      <td>
                        <a href="?change=item&id=<?=$info['id']?>" target="_self">
                          <?=$info['title']?>
                        </a> 
                      </td>
                      <td><?=$info['articul']?></td>
                      <td><?=$info['price']?></td>
                      <td><?=$info['description']?></td>
                      <td><?=$category->getField('title')?></td>
                      <td><?=$type->getField('title')?></td>
                      <td><?=$info['is_new'] != 0 ? 'новинка' : ''?></td>
                    </tr>
                <?}?>
              
            </tbody>
          </table>
        </div>

      <?} elseif (isset($_GET['page']) && $_GET['page'] == 'users') {?>
        <a href="?new=client" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">+ создать</a>
        <h2>Клиенты</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
            
              <tr>
                <th>#id</th>
                <th>Логин</th>
                <th>E-mail</th>
                <th>Группа</th>
                
              </tr>
            </thead>
            <tbody>
              <?
                $connect = new \Nordic\Core\Connect(); 
                $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_users`");
                while($info = mysqli_fetch_assoc($result)){
                    $group = new \Nordic\Core\UserGroup($info['user_group']);
                    
                    ?>
                    <tr>
                      <td><?=$info['id']?></td>
                      <td>
                        <a href="?change=client&id=<?=$info['id']?>" target="_self">
                          <?=$info['login']?>
                        </a>
                      </td>
                      <td><?=$info['email']?></td>
                      <td><?=$group->getField('title')?></td>  
                    </tr>
                <?}?>
              
            </tbody>
          </table>
        </div>
      <?} elseif (isset($_GET['page']) && $_GET['page'] == 'orders') {?>
        <h2>Заказы</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
            
              <tr>
                <th>#id</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>E-mail</th>
                <th>Товары</th>
                <th>Статус</th>
                <th>Время заказа</th>
                <th>Время обработки</th>
                <th style="text-align:center;">Действие</th>
              </tr>
            </thead>
            <tbody>
              <?
                $connect = new \Nordic\Core\Connect(); 
                $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_orders`");
                $result_status = mysqli_query($connect->getConnection(), "SELECT * FROM `statuses`");
                while($info = mysqli_fetch_assoc($result_status)){
                  $arr_statuses[$info['id']] = $info['title'];
                }
                while($info = mysqli_fetch_assoc($result)){
                    $status = new \Nordic\Core\Status($info['order_status']);
                    ?>
                    <tr>
                      <td><?=$info['id']?></td>
                      <td><?=$info['first_name']?></td>
                      <td>
                        <a href="tel:<?=$info['phone']?>">
                          <?=$info['phone']?>
                        </a>
                      </td>
                      <td>
                        <a href="mailto:<?=$info['email']?>">
                          <?=$info['email']?>
                        </a>
                      </td>
                      <td>
                        
                        <? 
                          $items = json_decode($info['goods']);
                          $content = "";
                          foreach($items as $item){
                            $good = new \Nordic\Core\Good($item);
                            $content .= "<div>";
                            $content .= "<h3>".$good->getField('title')."</h3>";
                            $content .= "<img width='100px' src='../".$good->getField('photo')."'>";
                            $content .= "<div>".$good->getField('price')." руб.</div>";
                            $content .= "</div>";
                          }
                          
                        ?>
                        <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Товары заказа" data-content="<?=$content?>">Просмотреть список</button>
                      </td>
                      <td style="color:<?=$status->getField('color')?>; background:<?=$status->getField('background')?>;"><?=$status->getField('title')?></td>
                      <td><?=date('d-m-Y в H:i',$info['publ_time'])?></td>
                      <td><?=$info['last_update'] != 0 ? date('d-m-Y в H:i',$info['last_update']) : 'не просмотрено'?></td>
                      <td style="text-align:center;">
                          <? $order = new \Nordic\Core\Order($info['id']); ?>
                          <form action="../system/controllers/orders/update.php" method="post">
                            <input type="hidden" value="<?=$order->getField('id')?>" name="id">
                            <div class="form-group">
                              <select name="order_status">
                                <option value="<?=$order->getField('order_status')?>"><?=$status->getField('title')?></option>
                                <?foreach ($arr_statuses as $key => $value){?>
                                    <?if($key != $order->getField('order_status')){?>
                                      <option value="<?=$key?>"><?=$value?></option>
                                    <?}?>
                                <?}?>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                          </form>
                      </td>
                    </tr>
                <?}?>
              
            </tbody>
          </table>
        </div>
      <?} else {?>
          

      <?}?>
      
      
    </main>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
  $(function () {
    $('[data-toggle="popover"]').popover({
      container: 'body',
      html: true,
      animation: true,
      trigger: 'focus'
    })

    // $('.popover-dismiss').popover({
    //   trigger: 'focus'
    // })
  })
  // *
</script> 
<style>
  .popover {
    height: 300px;
    overflow-y:scroll;
  }
</style>
</body>
</html>