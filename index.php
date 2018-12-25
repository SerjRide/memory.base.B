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
    <?php $exp = 0; ?>
    

   <div class="status">
        База клиентов<br/>Версия: 1.0<br/>Пункт: <?=$exp?>
    </div>
    
    
    <div class="search">
        <form name="search" action="index.php" method="post">
            <div class="center">
                <label for="search">Поиск: </label>
                <input id="search" type="text" name="search" />
                <input type="submit" name="search" value="Найти" />
                <a href="http://client.base/">Обновить</a>
            </div>
        </form>
    </div>
    
    
    
    <div class="clear"></div>
    
    
    
    <h2>Добавить заказ</b><br/></h2>
    <div class="add">
    <form name="add" action="index.php" method="post">
        <div class="column">
            <table>
                <tr>
                    <td>
                        <label for="add">Заказчик: </label><br/><br/>
                        <label for="add">Контакт: </label>
                    </td>
                    <td>
                        <input id="name" type="text" name="name" required/><br/><br/>
                        <input id="contact" type="text" name="contact" required />
                    </td>
                </tr>
            </table>
        </div>
        <div class="column">
            <table>
                <tr>
                    <td>
                        <label for="add">Почта/тел.: </label><br/><br/>
                        <label for="add">Товар: </label>
                    </td>
                    <td>
                        <input id="contact" type="text" name="order_info" /><br/><br/>
                        <select type="text" name="product" />
                            <option value="Визитки">Визитки</option>
                            <option value="Печати">Печати</option>
                            <option value="Печати">Штампы</option>
                            <option value="Таблички">Таблички</option>
                            <option value="Буклеты">Буклеты</option>
                            <option value="Листовки">Листовки</option>
                            <option value="Широкоформатка">Широкоформатка</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="column">
            <table>
                <tr>
                    <td>
                        <label for="add">Материал: </label><br/><br/>
                        <label for="add">Тираж: </label>
                    </td>
                    <td>
                        <select type="text" name="paper">
                        <optgroup label="Малые форматы">
                            <option value="Обычная 200гр.">Обычная 200гр.</option>
                            <option value="Обычная 300гр.">Обычная 300гр.</option>
                            <option value="Лён слоновая кость">Лён слоновая кость</option>
                            <option value="Лён бриллиант">Лён бриллиант</option>
                            <option value="Touch Cover">Touch Cover</option>
                        </optgroup>
                        <optgroup label="Широкоформатка">
                            <option value="Самоклейка">Самоклейка</option>
                            <option value="Плоттер">Плоттер</option>
                        </optgroup>
                        <optgroup label="Ручные Оснастки">
                            <option value="Ручная R40">Ручная R40</option>
                            <option value="Ручная 38*14">Ручная 38*14</option>
                            <option value="Ручная 47*18">Ручная 47*18</option>
                            <option value="Ручная 59*23">Ручная 59*23</option>
                            <option value="Ручная 60*40">Ручная 60*40</option>
                            <option value="Ручная 70*25">Ручная 70*25</option>
                            <option value="Ручная 69*10">Ручная 69*10</option>
                            <option value="Ручная 75*15">Ручная 75*15</option>
                            <option value="Ручная 75*38">Ручная 75*38</option>
                            <option value="Ручная 69*50">Ручная 69*50</option>
                        </optgroup>
                        <optgroup label="Ручные Оснастки">
                            <option value="Автомат R40">Автомат R40</option>
                            <option value="Автомат 38*14">Автомат 38*14</option>
                            <option value="Автомат 47*18">Автомат 47*18</option>
                            <option value="Автомат 59*23">Автомат 59*23</option>
                            <option value="Автомат 60*40">Автомат 60*40</option>
                            <option value="Автомат 70*25">Автомат 70*25</option>
                            <option value="Автомат 69*10">Автомат 69*10</option>
                            <option value="Автомат 75*15">Автомат 75*15</option>
                            <option value="Автомат 75*38">Автомат 75*38</option>
                            <option value="Автомат 69*50">Автомат 69*50</option>
                        </select><br/><br/>
                        <input id="contact" type="text" name="circulation" />
                    </td>
                </tr>
            </table>
        </div>
        <div class="column-right">
            <br/>
            <input type="submit" name="add" value="Добавить" />
        </div>
    </form>
    </div>
    
    
    
    <form name="del" action="index.php" method="post">
        <div class="del">
            № заказа: <input type="number" name="id" required/><br/><br/>
            <input type="submit" name="del" value="Удалить" />
         </div>
    </form>
    
    
    
    <?php
        define ('DB_HOST', 'localhost'); // определяем хост
        define ('DB_USER', 'root'); // определяем пользователянты 
        define ('DB_PASSWORD', ''); // пароль пользователя
        define ('DB_NAME', 'client_base'); // имя базы данных
        $mysqli = @new mysqli (DB_HOST, DB_USER, DB_PASSWORD , DB_NAME); // установить соединение
        $mysqli->set_charset('utf8'); // устранение проблем с кодировкой
        if(isset($_POST['add'])) 
        {
            $name = $mysqli->real_escape_string(htmlspecialchars($_POST['name']));
            $contact = $mysqli->real_escape_string(@htmlspecialchars($_POST['contact']));
            if ($_POST['order_info'])$order_info = $mysqli->real_escape_string(@htmlspecialchars($_POST['order_info']));
            else $order_info = '';
            $product = $mysqli->real_escape_string($_POST['product']);
            if ($_POST['paper']) $paper = $mysqli->real_escape_string(@htmlspecialchars($_POST['paper']));
            else $paper = '';
            if ($_POST['circulation'])$circulation = $mysqli->real_escape_string(@htmlspecialchars($_POST['circulation']));
            else $circulation = 'null';
            $price='null';
            $query = $query = "INSERT INTO `cb_orders` (`id`, `Заказчик`, `Дата_заказа`, `Контактное лицо`, `Контакты`, `Продукт`, `Бумага`, `Тираж`, `Цена`) 
            VALUES (NULL,'$name',UNIX_TIMESTAMP(),'$contact','$order_info','$product','$paper',$circulation,$price );";
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
//----------------------------------Калькулятор----------------------------------------------------------------------- 
        
    function calc_paper ($paper,$calc)
    {
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
    if(isset($_POST['calc'])) {
        if ($parties !== false || $color !== false)
        {
            if ($parties == '1'&& $color == '1') // 4+4
            {                    
                $calc = $quant_4_4[$quant] * $quant_all[$quant]; 
                echo '<br/><b>Заказ: </b>'.$quant_all[$quant].' двусторонних, цветных визиток на ';
            }
            elseif ($parties == '2' && $color == '1') // 4+0
            {                    
                $calc = $quant_4_0[$quant] * $quant_all[$quant];                 
                echo '<br/><b>Заказ: </b>'.$quant_all[$quant].' односторонних, цветных визиток на ';
            }
            elseif ($parties == '2' && $color == '2') // 1+0
            {                    
                $calc = $quant_1_0[$quant] * $quant_all[$quant]; 
                echo '<br/><b>Заказ: </b>'.$quant_all[$quant].' односторонних, черно-белых визиток на ';
            }
            elseif ($parties == '1' && $color == '2') // 1+1
            {                    
                $calc = $quant_1_1[$quant] * $quant_all[$quant]; 
                echo '<br/><b>Заказ: </b>'.$quant_all[$quant].' двусторонних, черно-белых визиток на ';
            }
            if ($paper == '0') echo 'обычной бумаге'; elseif  ($paper == '20') echo 'льне'; elseif  ($paper == '40') echo 'touche cover';
            if ($corners !== 0) echo ' со скругленными углами';
            echo '<br/>';
            echo '<b>Чистая стоимость : </b>'.$calc.' руб.<br/>';
            if ($paper == '20' || $paper == '40') echo '<b>Наценка за бумагу : </b>'.calc_paper ($paper,$calc).' руб.<br/>';
            if ($corners !== 0) echo '<b>Наценка за скругление углов : </b>'.corners ($corners,$calc).' руб.<br/>';
            $summ = $calc + calc_paper ($paper,$calc) + corners ($corners,$calc);
            echo '<br/><b>Итого: </b>'.$summ.' руб.';
        }
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
                $pole9=$row[8];
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
    </div>
    </form>
    <?php $mysqli->close();?>
</body>
</html>