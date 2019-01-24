<!DOCTUPE HTML>
<html>
<head>
    <title>MB-MySQL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=uth-8" />
    <meta name="description" content="MB-MySQL" />
    <meta name="keywords" content="MB-MySQL" />
    <link href="http://mysite.local/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <script type="text/javascript">
        var i = 0;
        function startFunc(){
            var quiestion = document.getElementById("hidden_question").value;
            document.getElementById("question").innerHTML = quiestion;
        }
        function check(){
            var right_answer = document.getElementById("hidden_answer").value;
            var user_answer = document.getElementById("user_answer").value;
            if (user_answer == right_answer) return true;
            else {
                alert('Ответ не верный');
                return false;
            }
        }
        function dknow(){
            var right_answer = document.getElementById("hidden_answer").value;
            document.getElementById("user_answer").value = right_answer;
        }
    </script>
    <?php
    //-------------------------Подключение MySQL--------------------------------
    define ('DB_HOST', 'localhost');define ('DB_USER', 'root');
    define ('DB_PASSWORD', '');define ('DB_NAME', 'memory_base');
    $mysqli = @new mysqli (DB_HOST, DB_USER, DB_PASSWORD , DB_NAME);
    if($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');
    $id_array = array();
    //Функция добавляет новые вопросы
    function newQuestion($mysqli,$query){
      $result = $mysqli->query($query);
      if ($result == true) return true;
      else return false;
    }
    ?>
</head>
<body>
    <!-- Подключение верхнего меню -->
    <td><?=file_get_contents("http://memory.base.b/nav/nav.php");?></td>
    <script>$("#b4").addClass("active");</script>

    <!-- Подключение sql таблицы -->
    <?php
      $thisLink = "MySQL";
      $result_set = $mysqli->query("SELECT * FROM $thisLink");
      $table = [];
      // возвращает текущую строку до тек пор пока не будет false
      while (($row = $result_set->fetch_assoc()) != false) {
          $table[] = $row;
      }
      $a = $mysqli->query("SELECT COUNT(1) FROM $thisLink");
      $b = mysqli_fetch_array($a);
      $c = $b[0]-1; // максимальное число строк
      $id = $mysqli->query("SELECT id FROM $thisLink");

      //Алгоритм выведения следующего вопроса
      if (isset($_GET['next'])) {
          $i = $_GET['i']+1;
          if ($i == $c+1) $i = 0;
      }
      else {
        if (!empty($_GET['lastAdded'])){
          $i = $_GET['lastAdded'];
        }
        else $i=0;
      }
      if (!empty($table[$i]['text']) || !empty($table[$i]['answer'])) {
          $quiestion = $table[$i]['text'];
          $answer = $table[$i]['answer'];
      }
      else echo '';
      $answerId = $table[$i]['id'];
    ?>
    <div class="container-fluid">
      <br/>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" id="form-add-newQuestion" style="display:none">
          <!-- Форма добавления новых вопросов -->
          <form role="form" name="add" action="http://memory.base.b/categories/<?=$thisLink?>.php" method="get">
            <div class="form-group">
              <h2><?=$thisLink?>. Добавить вопрос</h2>
              <textarea class="form-control" type="text" name="text" placeholder="Текст вопроса" required></textarea>
              <textarea class="form-control" type="text" name="answer" placeholder="Текст ответа" required></textarea>
              <input class="form-control btn-info" type="submit" name="add" value="Добавить" /></td>
            </div>
          </form>
        </div>
        <div class="col-md-6" id="form-answer-newQuestion">
          <div class="row">
            <div class="col-md-12">
                <!-- Меню "Старт" -->
                <?php
                  if (!empty($_GET['next']) || !empty($_GET['start']))
                      echo
                  '
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Вопрос: '.($i+1).' из '.($c+1).'</label>
                    </div>
                    <div class="col-sm-4 text-center">
                      <input class="myButton-left" id="backButton" type="button" value="<"/>
                      <input class="myNumberForm" type="number" id="nextQ" class="nextQ" min="1" max="'.($c+1).'"/>
                      <input class="myButton-right" id="skipButton" type="button" value=">"/>
                    </div>
                    <div class="col-sm-4 text-right">
                      <input class="myButton-left myBtn-info" type="button" data-toggle="tooltip" title="Показать ответ" name="dontKnow" value="Help" onclick="dknow()"/>
                      <input class="myButton myBtn-warning" type="button" data-toggle="tooltip" title="Начать с первого вопроса" id="button-ref-form"  value="&#8634;"/>
                      <input class="myButton myBtn-success" type="button" data-toggle="tooltip" title="Добавить вопрос" id="button-newQuestion-form" value="&#10010;"/>
                      <input class="myButton-right myBtn-danger" type="submit" data-toggle="tooltip" title="Удалить вопрос" id="button-delQuestion-form" value="&#10006;"/>
                    </div>
                  </div>
                  ';
                ?>
            </div>
            <div class="col-md-12">
              <form role="form" name="add" action="http://memory.base.b/categories/<?=$thisLink?>.php" method="get">
                <div class="form-group">
                  <!-- Поле вопроса question-------------------------------------------->
                  <!-- <h2><?=$thisLink?></h2> -->
                  <textarea class="form-control questionCl" type="text" id="question" name="question" readonly="true"><?php
                  if (!empty($_GET['start']) && $_GET['start'] == 'Старт') echo $quiestion;
                  elseif (!empty($_GET['next'])) echo $quiestion;
                  else echo ''
                  ?></textarea>

                  <!--Поле ответа-------------------------------------------->
                  <textarea class="form-control" id="user_answer" name="answer_2" placeholder="Ответ" ></textarea>

                  <!--Кнопка "Отправить"--------------------------------------------->
                  <?php
                    if (!empty($_GET['next']) || !empty($_GET['start'])) {
                      echo '<input class="form-control btn-info" type="submit" name="next" value="Следующий" onclick="return check()"/>';
                    }
                    elseif (empty($_GET['start'])) {
                      echo '<input  class="form-control btn-info" type="submit" name="start" value="Старт" onclick="startFunc()"/>';
                    }
                  ?>

                  <!--Кнопка "Показать ответ"--------------------------------------------->
                  <?php
                      // if (!empty($_GET['next']) || !empty($_GET['start'])) {
                      //   echo
                      //   '<input class="btn-info" type="button" name="dontKnow" value="H" onclick="dknow()"/>';
                      // }
                      // elseif (empty($_GET['start'])) echo '';
                  ?>

                  <!---Скрытые поля------------------------------------------->
                  <input type="hidden" id="hidden_question" value="<?=$quiestion?>" />
                  <input type="hidden" id="hidden_answer" value="<?=$answer?>" />
                  <input type="hidden" id="hidden_i" name="i" value="<?=$i?>" />
                  <input type="hidden" id="hidden_c" name="c" value="<?=$c+1?>" />
                  <input type="hidden" id="hidden_id" name="answerId" value="<?=$answerId?>" />
                  <input type="hidden" name="category" value="<?=$thisLink?>" />
                  <input type="hidden" name="lastAdded" value=""/>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">


          <!-- Алгоритм добавления новых вопросов -->
          <?php
            if(isset($_GET['add']) && $_GET['add'] == 'Добавить')
            {
                $text = $mysqli->real_escape_string(htmlspecialchars($_GET['text']));
                $answer = $mysqli->real_escape_string(@htmlspecialchars($_GET['answer']));
                $query = "INSERT INTO $thisLink (`id`, `text`, `answer`, `md5 text`) VALUES (NULL,'$text','$answer',md5('$text'));";
                $result = newQuestion($mysqli,$query);
                if ($result == true) echo "<p class='text-success'>Запись успешно добавлена</p>";
                else echo '<p class="text-danger">Неизвестная ошибка</p>';
            }

          ?>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $("#button-newQuestion-form").click(function(){
      if(document.querySelector("#form-add-newQuestion").style.display == 'none'){
        $(this).attr("value","+");
        $("#form-add-newQuestion").show();
        $("#form-answer-newQuestion").hide();
      }
      else {
        $(this).attr("value","+");
        $("#form-add-newQuestion").hide();
        $("#form-answer-newQuestion").show();
      }
    });
    </script>
    <?=file_get_contents("http://memory.base.b/js/scr.php");?>
<?php $mysqli->close(); ?>
</body>
</html>
