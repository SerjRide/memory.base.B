<!DOCTUPE HTML>
<html>
<head>
    <title>База знаний</title>
    <meta http-equiv="Content-Type" content="text/html; charset=uth-8" />
    <meta name="description" content="Добавить запись" />
    <meta name="keywords" content="Добавить запись" />
    <link href="http://mysite.local/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- <link type="text/css" rel="stylesheet" href="http://memory.base/css/main.css"> -->
</head>
<body>
        <div class="column">
        <form name="add" action="http://memory.base/PHP.php" method="get">
            <table>
                <tr>
                    <td colspan="2">
                        <textarea type="text" name="text" placeholder="Текст вопроса"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea type="text" name="answer" placeholder="Текст ответа"></textarea><br/><br/>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="add" value="Добавить" /></td>
                    <td></td>
                </tr>
            </table>
        </form>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>
