<!DOCTUPE HTML>
<html>
<head>
    <title>База знаний</title>
    <meta http-equiv="Content-Type" content="text/html; charset=uth-8" />
    <meta name="description" content="База знаний, PHP" />
    <meta name="keywords" content="База знаний, PHP" />
    <link href="http://mysite.local/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- BOOTSTRAP v4 -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->

    <!-- BOOTSTRAP v3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- fas icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="http://memory.base.b/css/main.css">
</head>
<body>
    <?php
//-------------------------Подключение MySQL--------------------------------------------------------
        define ('DB_HOST', 'localhost'); // определяем хост
        define ('DB_USER', 'root'); // определяем пользователянты
        define ('DB_PASSWORD', ''); // пароль пользователя
        define ('DB_NAME', 'memory_base'); // имя базы данных
        $mysqli = @new mysqli (DB_HOST, DB_USER, DB_PASSWORD , DB_NAME); // установить соединение
        if($mysqli->connect_errno) exit('Ошибка соединения с БД');
        $mysqli->set_charset('utf8'); // устранение проблем с кодировкой
    ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Навигация</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="/">MemoryBase</a>
      </div>

      <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav ">
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `HTML`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b1" href="http://memory.base.b/categories/HTML.php">HTML (<?=$b[0]?>) <i id="i1"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `CSS`"); $b = mysqli_fetch_array($a);?>
            <input class="catTittle" type="hidden" value="CSS"/>
            <a class="btn" id="b2" href="http://memory.base.b/categories/CSS.php">CSS (<?=$b[0]?>) <i id="i2"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `PHP`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b3" href="http://memory.base.b/categories/PHP.php">PHP (<?=$b[0]?>) <i id="i3"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `MySQL`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b4" href="http://memory.base.b/categories/MySQL.php">MySQL (<?=$b[0]?>) <i id="i4"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `JavaScript`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b5" href="http://memory.base.b/categories/JavaScript.php">JavaScript (<?=$b[0]?>) <i id="i5"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `NodeJS`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b6" href="http://memory.base.b/categories/Nodejs.php">Node.js (<?=$b[0]?>) <i id="i6"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `bash`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b7" href="http://memory.base.b/categories/bash.php">bash (<?=$b[0]?>) <i id="i7"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `bootstrap`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b8" href="http://memory.base.b/categories/bootstrap.php">Bootstrap (<?=$b[0]?>) <i id="i8"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `BI`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b9" href="http://memory.base.b/categories/BI.php">BI (<?=$b[0]?>) <i id="i9"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `other`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b10" href="http://memory.base.b/categories/other.php">Other (<?=$b[0]?>) <i id="i10"></i></a>
          </li>
          <li class="nav-item">
            <?php $a = $mysqli->query("SELECT COUNT(1) FROM `react`"); $b = mysqli_fetch_array($a);?>
            <a class="btn" id="b11" href="http://memory.base.b/categories/react.php">React (<?=$b[0]?>) <i id="i11"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br/>
  <br>
  <br>
<!-- Подключение скриптов после загрузки head для ускорения работы сайта -->
<!-- JQuery-3.3.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
