<!DOCTUPE HTML>
<html>
<head>
    <title>База знаний</title>
    <meta http-equiv="Content-Type" content="text/html; charset=uth-8" />
    <meta name="description" content="База знаний" />
    <meta name="keywords" content="База знаний" />
    <link href="http://mysite.local/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- <link type="text/css" rel="stylesheet" href="http://memory.base/css/main.css"> -->
</head>
<body>
    <td><?=file_get_contents("http://memory.base.b/nav/nav.php");?></td>
    <div class="index-list">
      <div class="container text-left">
        <br/>
        <br/>
        <!-- Модальное окно -->
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
          <i class="fas fa-window-maximize"></i>
        </button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                Области видимости в JavaScript всегда были непростой темой, особенно в сравнении с более строго
                организованными языками, такими, как C и Java. В течение многих лет области видимости в JS особенно широко не обсуждались, так как в
                языке попросту не было средств, которые позволяли бы существенно повлиять на сложившуюся ситуацию. Но в ECMAScript 6 появились
                некоторые новые возможности, которые позволяют разработчикам лучше контролировать области видимости переменных. Эти возможности в
                наши дни уже очень хорошо поддерживают браузеры, они вполне доступны для большинства разработчиков. Однако новые ключевые слова для
                объявления переменных, учитывая ещё и то, что старое ключевое слово var никуда не делось, означают не только новые возможности, но и
                появление новых вопросов. Когда использовать ключевые слова let и const? Как они себя ведут? В каких ситуациях всё ещё актуально
                ключевое слово var? Материал, перевод которого мы сегодня публикуем, направлен на исследование проблемы областей видимости переменных
                в JavaScript.
              </div>
            </div>
          </div>
        </div>
        <!-- Выпадающий блок -->
        <button class="btn btn-primary" data-toggle="collapse" data-target="#hideDiv"><i class="fas fa-angle-down"></i></button>
        <br/>
        <br/>
        <div class="collapse panel panel-primary" id="hideDiv">
          <div class="panel-heading text-left">Скрытая панель</div>
          <div class="panel-body text-left">Области видимости в JavaScript всегда были непростой темой, особенно в сравнении с более строго
            организованными языками, такими, как C и Java. В течение многих лет области видимости в JS особенно широко не обсуждались, так как в
            языке попросту не было средств, которые позволяли бы существенно повлиять на сложившуюся ситуацию. Но в ECMAScript 6 появились
            некоторые новые возможности, которые позволяют разработчикам лучше контролировать области видимости переменных. Эти возможности в
            наши дни уже очень хорошо поддерживают браузеры, они вполне доступны для большинства разработчиков. Однако новые ключевые слова для
            объявления переменных, учитывая ещё и то, что старое ключевое слово var никуда не делось, означают не только новые возможности, но и
            появление новых вопросов. Когда использовать ключевые слова let и const? Как они себя ведут? В каких ситуациях всё ещё актуально
            ключевое слово var? Материал, перевод которого мы сегодня публикуем, направлен на исследование проблемы областей видимости переменных
            в JavaScript.</div>
        </div>
        <br/>
        <br/>
      </div>
    </div>
        <!-- Панель с вкладками -->
        <br/>
        <br/>
        <ul class="nav nav-tabs" role="tablist">
          <li><a href="#home" role="tab" data-toggle="pill">Домой</a></li>
          <li><a href="#profile" role="tab" data-toggle="pill">Профиль</a></li>
          <li class="active"><a href="#message" role="tab" data-toggle="pill">Сообщения</a></li>
          <li><a href="#settings" role="tab" data-toggle="pill">Настройки</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade" id="home">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
          </div>
          <div role="tabpanel" class="tab-pane fade" id="profile">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
          </div>
          <div role="tabpanel" class="tab-pane active fade in" id="message">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
          </div>
          <div role="tabpanel" class="tab-pane fade" id="settings">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
          </div>
        </div>
        <hr>
        <script type="text/javascript">
          var random = Math.floor(Math.random() * 100);
          $("#settings").text(random);
        </script>
</body>
</html>
