<?php
if ($_POST['text'] && $_POST['submited']) {
    $mysqli = new mysqli('localhost', 'cathar_bitrix', 'rTnU90op.', 'cathar_bitrix');
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    $ip = $mysqli->real_escape_string($_SERVER['REMOTE_ADDR']);
    $text = $mysqli->real_escape_string($_POST['text']);
    $mysqli->query(
        "INSERT INTO `cathar_bitrix`.`variables` (`id` ,`text` ,`data` ,`ip`) VALUES (NULL , '$text',CURRENT_TIMESTAMP , '$ip')"
    );
    if ($mysqli->errno) {
        die('Select Error (' . $mysqli->errno . ') ' . $mysqli->error);
    }
}
$variables = Array(
    'Можешь поиграть',
    'Посмотри фильм',
    'Заработай денег',
    'Залипни на <a href="http://pikabu.ru">Пикабу</a>',
    'Залипни на <a href="http://habrahabr.ru">Хабре</a>',
    'Прочти книгу',
    'Изучи что-нибудь новое',
    'Разгреби завалы на учобе/работе',
    'Выйди на улицу',
    'Займись собой',
    'Позвони другу/подруге',
    'Покатайся на велосипеде',
    'Займись сексом',
    'Сходи в бар/ресторан/кафе',
    'Займись шоппингом',
    'Послушай музыку',
    'Прибирись',
    'Ложись спать',
    'Приготовь покушать',
    'Сходи в гости',
    'Прыгни с парашюта',
    'Выпей чаю/кофе',
    'Сходи в бильярд',
    'Сходи в бассейн',
    'Сходи в боулинг',
    'Нарисуй картину',
    'Займись оригами',
    'Познакомься с кем-нибудь',
    'Начни учить иностранный язык',
    'Сделать комплимент первой встреченной девушке',
    'Признайся в любви',
    'Добавь сайт в закладки',
    'Помоги кому-нибудь',
    'Начни делать ремонт',
    'Займись благотворительностью',
    'Выберись на природу'
);
$key = array_rand($variables);
$what = $variables[$key];
if ($key == 1) {
    $what .= '<br /><a href="http://www.kinopoisk.ru/view_random_film.php">Выбрать можно тут.</a>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Чо делать?</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <!--<link rel="shortcut icon" href="favicon.ico">-->
    <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
    <script type="text/javascript">
        function toggleForm() {
            var form = document.getElementById('sendYourMama');

            form.style.display = (form.style.display == 'none' ? 'block' : 'none');
            return false;
        }
    </script>
</head>
<body>
<div class="container">
    <article>
        <h1>Чо делать?</h1>

        <div class="result"><?= $what ?></div>
        <div class="moaaar">
            <a href="./">ещё вариант?</a><br/>
            <a href="#" class="pseudo" onclick="toggleForm();return false;">предложи свой</a>

            <form method="post" id="sendYourMama" class="sendForm" style="display: none;">
                <input type="hidden" name="submited" value="1"/>
                <input type="text" name="text"/>
                <input type="submit" value="Отправить"/>
            </form>
        </div>
    </article>
    <aside>
        <h5>ЧТОЭТААА?</h5>

        <p>Это сайт, который подскажет, чем тебе заняться, если ты, вдруг, не знаешь.</p>

        <p>Он настолько крутой, что может читать твои мысли. Так что осторожнее с ним :-)</p>

        <div class="share">
            <div class="share__title">поделись с миром:</div>
            <div class="yashare-auto-init share__buttons" data-yashareL10n="ru"
                 data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"
                 data-yashareTheme="counter"></div>
        </div>
    </aside>
    <div style="clear: both;"></div>
    <footer>Сделали <a href="http://cathar.ru">Алёшка</a> и <a href="http://paaashka.ru">Пашка</a>.</footer>
</div>
</body>
</html>