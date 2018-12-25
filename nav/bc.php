<!DOCTUPE HTML>
<html>
<head>
    <title>Клиентская База</title>
    <meta http-equiv="Content-Type" content="text/html; charset=uth-8" />
    <meta name="description" content="Добавить заказ на визитки" />
    <meta name="keywords" content="Добавить заказ на визитки" />
    <link href="http://mysite.local/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="http://client.base/css/main.css">
</head>
<body>
    <?php 
        if (!empty($_POST['quant'])) // если запрос отправлен
            {   
                $quant = htmlspecialchars($_POST['quant']);
                if (is_int($quant) == true) $quant = 1;
            }
    ?>

    
    <div class="add">
    <form name="add" action="index.php" method="post">
        <div class="column">
            <table>
                <tr>
                    <td>
                        <label for="add">Заказчик: </label><br/><br/>
                        <label for="add">Контакт: </label><br/><br/>
                        <label for="add">Почта/тел.: </label>
                    </td>
                    <td>
                        <input id="name" type="text" name="name" required/><br/><br/>
                        <input id="contact" type="text" name="contact" required /><br/><br/>
                        <input id="contact" type="text" name="order_info" />
                    </td>
                </tr>
            </table>
        </div>
        
        
        
        
        <div class="column_2">
           <table>
                <tr>
                    <td>
                        <label for="add">Бумага: </label><br/><br/>
                        <label for="add">Ламинация: </label><br/><br/>
                        <label for="site"> Количество: </label>
                    </td>
                    <td>
                        <select id="paper" name="paper">
                            <option value="Обычная"  <?php if($paper == '0') echo "selected"; ?> >Обычная</option> <!-- Проценты наценки за тип бумаги -->
                            <option value="Лён" <?php if($paper == '20') echo "selected"; ?> >Лён</option>
                            <option value="touche cover" <?php if($paper == '40') echo "selected"; ?> >touche cover</option>
                        </select><br/><br/>
                        
                        <select id="lamination" name="lamination">
                            <option value="Нет">Нет</option>
                            <option value="Матовая">Матовая</option>
                            <option value="Матовая">Глянцевая</option>
                        </select><br/><br/>
                        
                        <select id="quant" name="quant">
                            <option value="50" <?php if($quant == '0') echo "selected"; ?> >50</option>
                            <option value="100" <?php if($quant == '1') echo "selected"; ?> >100</option>
                            <option value="200" <?php if($quant == '2') echo "selected"; ?> >200</option>
                            <option value="300" <?php if($quant == '3') echo "selected"; ?> >300</option>
                            <option value="400" <?php if($quant == '4') echo "selected"; ?> >400</option>
                            <option value="500" <?php if($quant == '5') echo "selected"; ?> >500</option>
                            <option value="600" <?php if($quant == '6') echo "selected"; ?> >600</option>
                            <option value="700" <?php if($quant == '7') echo "selected"; ?> >700</option>
                            <option value="800" <?php if($quant == '8') echo "selected"; ?> >800</option>
                            <option value="900" <?php if($quant == '9') echo "selected"; ?> >900</option>
                            <option value="1000" <?php if($quant == '10') echo "selected"; ?> >1000</option>
                            <option value="2000" <?php if($quant == '11') echo "selected"; ?> >2000</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        
        
        <div class="column_3">
            <table>
                <tr>
                    <td>
                        <input type="radio" name="parties" value="1" required="required" <?php if($parties == '1') echo "checked"; ?>/>Двусторонние<br/> <!-- +4 -->
                        <input type="radio" name="parties" value="2" required="required" <?php if($parties == '2') echo "checked"; ?>/>Односторонние<br/><br/> <!-- +0 -->
                        
                        <input type="radio" name="color" value="1" required="required" <?php if($color == '1') echo "checked"; ?>/>Цветные <br/> <!-- 4 -->
                        <input type="radio" name="color" value="2" required="required" <?php if($color == '2') echo "checked"; ?>/>Черно-белые<br/> <!-- 1 -->
                        <br/>
                        
                    </td>
                </tr>
            </table>  
        </div>
    
        <div class="column_4">
            <table>
                <tr>
                    <td>
                        <label for="add">Скр. углов: </label><br/><br/>
                    </td>
                    <td valign="top">
                        <input  type="checkbox" name="corners" value="Yes" <?php if($corners == '30') echo "checked"; ?>/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="column_add_button">
                            <input type="submit" name="add" value="Добавить" />
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </form>
        <div class="column_5">
    <form name="del" action="index.php" method="post">
            <table>
                <tr>
                    <td>
                        <p>Удаление заказа</p/>
                    </td>
                </tr>
                <tr>
                    <td>
                        № заказа: <input type="number" name="id" required/><br/><br/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="del" value="Удалить" />
                    </td>
                </tr>
            </table>
    </form>
        
        </div>
    </div>

</body>
</html>