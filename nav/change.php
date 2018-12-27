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
                            <option value="Обычная">Обычная</option> <!-- Проценты наценки за тип бумаги -->
                            <option value="Лён">Лён</option>
                            <option value="touche cover">touche cover</option>
                        </select><br/><br/>
                        
                        <select id="lamination" name="lamination" disabled="disabled">
                            <option value="Нет">Нет</option>
                            <option value="Матовая">Матовая</option>
                            <option value="Матовая">Глянцевая</option>
                        </select><br/><br/>
                        
                        <select id="quant" name="quant">
                            <option value="0" >50</option>
                            <option value="1" >100</option>
                            <option value="2" >200</option>
                            <option value="3" >300</option>
                            <option value="4" >400</option>
                            <option value="5" >500</option>
                            <option value="6" >600</option>
                            <option value="7" >700</option>
                            <option value="8" >800</option>
                            <option value="9" >900</option>
                            <option value="10" >1000</option>
                            <option value="11" >2000</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        
        
        <div class="column_3">
            <table>
                <tr>
                    <td>
                        <input type="radio" name="parties" value="1" required="required"/>Двусторонние<br/> <!-- +4 -->
                        <input type="radio" name="parties" value="2" required="required"/>Односторонние<br/><br/> <!-- +0 -->
                        
                        <input type="radio" name="color" value="1" required="required"/>Цветные <br/> <!-- 4 -->
                        <input type="radio" name="color" value="2" required="required"/>Черно-белые<br/> <!-- 1 -->
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
                        <label for="add">Изг. макета: </label><br/><br/>
                    </td>
                    <td valign="top">
                        <input  type="checkbox" name="corners" value="Yes"/><br/><br/>
                        <input  type="checkbox" name="maket" value="Yes" disabled="disabled"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="column_add_button">
                            <input type="submit" name="add_bc" value="Изменить" />
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </form>
        <div class="column_5">

        
        </div>
    </div>

</body>
</html>