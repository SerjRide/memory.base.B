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
        <h6>Версия: 1.1</h6>
        <label for="nav-toggle" class="nav-toggle" onclick></label>
        
        <h2 class="logo"> 
            <a href="http://client.base/">ClientBase</a> 
        </h2>
        <ul>
            <li><a href="#1">Один</a>
            <li><a href="#2">Два</a>
            <li><a href="#3">Три</a>
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
        <h2>Добавить заказ: визитки</b><br/></h2>
        <?=file_get_contents("http://client.base/nav/bc.php")?>
        
        <?php
            define ('DB_HOST', 'localhost'); // определяем хост
            define ('DB_USER', 'root'); // определяем пользователянты 
            define ('DB_PASSWORD', ''); // пароль пользователя
            define ('DB_NAME', 'client_base'); // имя базы данных
            $mysqli = @new mysqli (DB_HOST, DB_USER, DB_PASSWORD , DB_NAME); // установить соединение
            $mysqli->set_charset('utf8'); // устранение проблем с кодировкой
            
            
//----------------------------------Калькулятор----------------------------------------------------------------------- 
        if (!empty($_POST['quant'])) // если запрос отправлен
            {   
                $quant = htmlspecialchars($_POST['quant']);
                if (is_int($quant) == true) $quant = 1;
            }
            else $quant = 1; // значение по умолчанию
        if (!empty($_POST['paper'])) // если запрос отправлен
            {   
                $paper = htmlspecialchars($_POST['paper']);
                if (is_int($paper) == true) $paper = 0;
            }
            else $paper = 0; // значение по умолчанию
        if (!empty($_POST['parties'])) // если запрос отправлен
            {   
                $parties = htmlspecialchars($_POST['parties']);
                if (is_int($parties) == true) $parties = 0;
            }
            else $parties = 0;
        if (!empty($_POST['color'])) // если запрос отправлен
            {   
                $color = htmlspecialchars($_POST['color']);
                if (is_int($color) == true) $color = 0;
            }
            else $color = 0;
            
        if  (!empty($_POST['corners'])) 
            $corners = 30; // Процент наценки за скругление углов
            else $corners = 0;
        function calc_paper ($paper,$calc)
        {
            if ($paper == 'Обычная') $paper = 0;
            elseif ($paper == 'Лён') $paper = 20;
            elseif ($paper == 'touche cover') $paper = 40;
            echo 'Наценка за бумагу: '.$paper;
            $p_percent = $calc / 100 * $paper;
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
       
       if(isset($_POST['add'])) {
            if ($parties !== false || $color !== false)
            {
                if ($parties == '1'&& $color == '1') // 4+4
                {                    
                    $calc = $quant_4_4[$quant] * $quant_all[$quant]; 
                    echo $calc;
                }
                elseif ($parties == '2' && $color == '1') // 4+0
                {                    
                    $calc = $quant_4_0[$quant] * $quant_all[$quant];                 
                    echo $calc;
                }
                elseif ($parties == '2' && $color == '2') // 1+0
                {                    
                    $calc = $quant_1_0[$quant] * $quant_all[$quant]; 
                    echo $calc;
                }
                elseif ($parties == '1' && $color == '2') // 1+1
                {                    
                    $calc = $quant_1_1[$quant] * $quant_all[$quant]; 
                    echo $calc;
                }
                echo '<b>Чистая стоимость : </b>'.$calc.' руб.<br/>';
                if ($paper == '20' || $paper == '40') echo '<b>Наценка за бумагу : </b>'.calc_paper ($paper,$calc).' руб.<br/>';
                if ($corners !== 0) echo '<b>Наценка за скругление углов : </b>'.corners ($corners,$calc).' руб.<br/>';
                $summ = $calc + calc_paper ($paper,$calc) + corners ($corners,$calc);
                echo '<br/><b>Итого: </b>'.$summ.' руб.';
            }
        }
        echo '<br/>';
        echo 'Сумм: '.$summ;
        echo '<br/>';
           
            if(isset($_POST['add'])) 
            {
                $name = $mysqli->real_escape_string(htmlspecialchars($_POST['name']));
                $contact = $mysqli->real_escape_string(@htmlspecialchars($_POST['contact']));
                if ($_POST['order_info'])$order_info = $mysqli->real_escape_string(@htmlspecialchars($_POST['order_info']));
                else $order_info = '';
                $product = $mysqli->real_escape_string($_POST['product']);
                if ($_POST['paper']) $paper = $mysqli->real_escape_string(@htmlspecialchars($_POST['paper']));
                else $paper = '';
                if ($_POST['quant'])$quant = $mysqli->real_escape_string(@htmlspecialchars($_POST['quant']));
                else $quant = 'null';
                $price='null';
                $query = $query = "INSERT INTO `cb_orders` (`id`, `Заказчик`, `Дата_заказа`, `Контактное лицо`, `Контакты`, `Продукт`, `Бумага`, `Тираж`, `Цена`) 
                VALUES (NULL,'$name',UNIX_TIMESTAMP(),'$contact','$order_info','$product','$paper',$quant,$summ);";
                $result = $mysqli->query($query);
                if ($result == true) echo "<p><em>Заказ успешно добавлен</em></p>";
                else echo '<p><strong>Неизвестная ошибка</strong></p>';
            }
        ?>
        <div class="clear"></div>
        <br/><h2>База заказов</b></h2>
        <?php
//-------------------------------Удаление заказа из базы------------------------------------------------------------
        if (isset($_POST['del'])){ 
                $id = $mysqli->real_escape_string(htmlspecialchars($_POST['id']));
                $id_query = "DELETE FROM `cb_orders` WHERE `cb_orders`.`id` = $id";
                $id_result = $mysqli->query($id_query);
                if ($id_result == true) echo "<p><em>Заказ успешно удален</em></p>";
                else echo '<p><strong>Заказ не найден</strong></p>';
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
                        <td><b>Бумага</b></td>
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
                $pole8=$row[7];
                $polre9=$row[8];
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
                      </tr>";
            }
        echo "</table>";
        ?>
    </div>
    <?php $mysqli->close();?>
</body>
</html>