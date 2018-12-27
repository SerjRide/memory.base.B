<!DOCTUPE HTML>
<html>
<head>
    <title>Клиентская База</title>
    <meta http-equiv="Content-Type" content="text/html; charset=uth-8" />
    <meta name="description" content="Моя статистика" />
    <meta name="keywords" content="Моя статистика" />
    <link href="http://mysite.local/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="http://client.base/css/main.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">
        <h6>Версия: 1.2</h6>
        <label for="nav-toggle" class="nav-toggle" onclick></label>
        
        <h2 class="logo"> 
            <a href="http://client.base/">ClientBase</a> 
        </h2>
        <ul>
            <li><a href="?add=1">Добавить заказ</a>
            <li><a href="?change=1">Изменить заказ</a>
            <li><a href="?del=1">Удалить заказ</a>
            <li><a href="#4">Четыре</a>
            <li><a href="#5">Пять</a>
            <li><a href="#6">Шесть</a>
            <li><a href="#7">Семь</a> 
        </ul>
    </nav>
    <input type="checkbox" id="nav-toggle" hidden>
    <?php $exp = 0; ?>
    <div class="right">
        <div class="search">
            <form name="search" action="index.php" method="post">
                <div class="center">
                    <input id="search" type="text" name="search" placeholder="Поиск заказов"/>
                    <input type="submit" name="found" value=" " />
                    <a href="http://client.base/">Обновить</a>
                </div>
            </form>
        </div>
        <div class="clear"></div>
        <br/>
        <br/>
        <br/>
        <?php 
            if (!empty($_GET['add'])) echo file_get_contents("http://client.base/nav/bc.php");
            elseif (!empty($_GET['change'])) {
                echo '<div class="options"><h2>Изменить заказ ';
                if (empty($_GET['change']) || $_GET['change'] == '1') echo ''; 
                else echo '№'.$_GET['change'];
                echo '</b><br/></h2>';
                echo file_get_contents("http://client.base/nav/change.php");
            }
            elseif (!empty($_GET['del'])) echo file_get_contents("http://client.base/nav/del.php");
            
        ?>
        <?php
            define ('DB_HOST', 'localhost'); // определяем хост
            define ('DB_USER', 'root'); // определяем пользователянты 
            define ('DB_PASSWORD', ''); // пароль пользователя
            define ('DB_NAME', 'client_base'); // имя базы данных
            $mysqli = @new mysqli (DB_HOST, DB_USER, DB_PASSWORD , DB_NAME); // установить соединение
            if($mysqli->connect_errno) exit('Ошибка соединения с БД');
            $mysqli->set_charset('utf8'); // устранение проблем с кодировкой
            
            
//----------------------------------Калькулятор----------------------------------------------------------------------- 
       if(isset($_GET['add']) && $_GET['add'] == 'Добавить') {
            $quant = htmlspecialchars($_GET['quant']);
            if ($quant == '0') $quant_string = 50;
            elseif ($quant == '1') $quant_string = 100;
            elseif ($quant == '2') $quant_string = 200;
            elseif ($quant == '3') $quant_string = 300;
            elseif ($quant == '4') $quant_string = 400;
            elseif ($quant == '5') $quant_string = 500;
            elseif ($quant == '6') $quant_string = 600;
            elseif ($quant == '7') $quant_string = 700;
            elseif ($quant == '8') $quant_string = 800;
            elseif ($quant == '9') $quant_string = 900;
            elseif ($quant == '10') $quant_string = 1000;
            elseif ($quant == '11') $quant_string = 2000;
            if (!empty($_GET['paper'])) $paper = htmlspecialchars($_GET['paper']);
            $parties = htmlspecialchars($_GET['parties']);
            $color = htmlspecialchars($_GET['color']);
            if ($parties == '1' && $color == '1') $parties_string = '4+4';
            elseif ($parties == '2' && $color == '1') $parties_string = '4+0';
            elseif ($parties == '1' && $color == '2') $parties_string = '1+1';
            elseif ($parties == '2' && $color == '2') $parties_string = '1+0';
            if  (!empty($_GET['corners'])) $corners = 30; else $corners = 0;  // Процент за скругление углов
            function calc_paper ($paper,$calc)
            {
                if ($paper == 'Обычная') $paper = 0;
                elseif ($paper == 'Лён') $paper = 20;
                elseif ($paper == 'touche cover') $paper = 40; // Проценты за бумагу
                $p_percent = ($calc / 100) * $paper;
                return $p_percent;
            }
            function corners ($corners,$calc)
            {
                $c_percent = $calc / 100 * $corners;
                return $c_percent;
            }
            $quant_4_4 = [9,6.4,6.2,6,5.8,5.6,5.4,5.2,5,4.8,4.6,4.6]; // 4+4
            $quant_4_0 = [6,4,3.75,3.3,3.25,3.2,3.15,3.1,3.05,3.05,3,3]; // 4+0
            $quant_1_0 = [3,2.5,2.4,2.3,2.2,2.1,2,1.9,1.8,1.7,1.5,1.5]; // 1+0
            $quant_1_1 = [5.6,3.8,3.7,3.6,3.5,3.4,3.3,3.2,3.2,3.2,3.15,3]; // 1+1
            $quant_all = [50,100,200,300,400,500,600,700,800,900,1000,2000]; // количество
            $quant_int = settype($quant, 'integer');
            if ($parties == '1'&& $color == '1') // 4+4
            {                    
                $calc = $quant_4_4[$quant] * $quant_all[$quant]; 
                $product = 'Визитки (4+4)';
            }
            elseif ($parties == '2' && $color == '1') // 4+0
            {                    
                $calc = $quant_4_0[$quant]*$quant_all[$quant];
                $product = 'Визитки (4+0)';
            }
            elseif ($parties == '2' && $color == '2') // 1+0
            {                    
                $calc = $quant_1_0[$quant] * $quant_all[$quant];
                $product = 'Визитки (1+0)';
            }
            elseif ($parties == '1' && $color == '2') // 1+1
            {                    
                $calc = $quant_1_1[$quant] * $quant_all[$quant]; 
                $product = 'Визитки (1+1)';
            }
            $summ = $calc + calc_paper ($paper,$calc) + corners ($corners,$calc);
            if  (!empty($_GET['corners'])) $product = "$product <br/>+ скр. угралов";
        }
 //---------------------------MySQL Запрос на генерацию строки--------------------------------------------------------------------------
            if(isset($_GET['add']) && $_GET['add'] == 'Добавить') 
            {
                $name = $mysqli->real_escape_string(htmlspecialchars($_GET['name']));
                $contact = $mysqli->real_escape_string(@htmlspecialchars($_GET['contact']));
                if ($_GET['order_info'])$order_info = $mysqli->real_escape_string(@htmlspecialchars($_GET['order_info']));
                else $order_info = '';
                if ($_GET['paper']) $paper = $mysqli->real_escape_string(@htmlspecialchars($_GET['paper']));
                else $paper = '';
                if ($_GET['quant'])$quant = $mysqli->real_escape_string(@htmlspecialchars($_GET['quant']));
                else $quant = 'null';
                if ($_GET['quant'])$quant = $mysqli->real_escape_string(@htmlspecialchars($_GET['quant']));
                else $quant = 'null';
                $price='null';
                $query = $query = "INSERT INTO `cb_orders` (`id`, `Заказчик`, `Дата_заказа`, `Контактное лицо`, `Контакты`, `Продукт`, `Материал`, `Тираж`, `Цена`) 
                VALUES (NULL,'$name',UNIX_TIMESTAMP(),'$contact','$order_info','$product','$paper','$quant_string','$summ');";
                $result = $mysqli->query($query);
            }
        ?>
        <div class="clear"></div>
        <?php
//-------------------------------Удаление заказа из базы------------------------------------------------------------
        if (isset($_GET['del']) && $_GET['del'] == 'Удалить'){ 
            $id = $mysqli->real_escape_string(htmlspecialchars($_GET['id']));
            $id_query = "DELETE FROM `cb_orders` WHERE `cb_orders`.`id` = $id";
            $id_result = $mysqli->query($id_query);
            if ($id_result == true) echo "<p><em>Заказ успешно удален</em></p>";
            else echo '<p><strong>Заказ не найден</strong></p>';
        }
         if(isset($_GET['add']) && $_GET['add'] == 'Добавить') 
         {
             if ($result == true) echo "<em>Заказ успешно добавлен<br/>Стоимость: </b>$summ руб.</em>";
                else echo '<strong>Неизвестная ошибка</strong>';
         }
//-------------------------------Изменение данных в таблице------------------------------------------------------------
        if(!empty($_GET['change'])){
            $query_change = "";
            $id_result = $mysqli->query($query_change);
            if ($id_result == true) echo '<p><em>Заказ №'.$_GET['del'].' успешно удален</em></p>';
            else echo '';
         }
//-------------------------------Генерация таблицы------------------------------------------------------------
        $result = $mysqli->query('SELECT * FROM `cb_orders`');
            echo '<table border="1px" width="100%">';
            echo '<div class="сustomers"><tr>
                        <td><b>№</b></td>
                        <td><b>Заказчик</b></td>
                        <td><b>Дата заказа</b></td>
                        <td><b>Контактное лицо</b></td>
                        <td><b>Почта/телефон</b></td>
                        <td><b>Товар</b></td>
                        <td><b>Материал</b></td>
                        <td><b>Тираж</b></td>
                        <td><b>Цена</b></td>
                     </tr></div>';
            while ($row = mysqli_fetch_array($result)) 
            {
                $pole1=$row[0];
                $pole2=$row[1];
                $pole3=$row[2];
                $pole4=$row[3];
                $pole5=$row[4];
                $pole6=$row[5];
                $pole7=$row[6];
                $pole8=$row[7]; // тираж
                $pole9=$row[8];
                $pole10="<a href='?change=$pole1'>И</a></td>";
                echo "<tr>
                        <td>$pole1</td>
                        <td>$pole2</td>
                        <td>".date('j.m.Y || H:i',$pole3)."</td>
                        <td>$pole4</td>
                        <td>$pole5</td>
                        <td>$pole6</td>
                        <td>$pole7</td>
                        <td>$pole8</td>
                        <td>$pole9</td>
                        <td>$pole10</td>
                      </tr>";
            }
        echo "</table>";
        
        ?>
    </div>
    <?php $mysqli->close();?>
</body>
</html>