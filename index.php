<?php
if($_POST['text'] && $_POST['submited']){
	$mysqli = new mysqli('localhost', 'cathar_bitrix', 'rTnU90op.', 'cathar_bitrix');
	if ($mysqli->connect_error) {
	    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	$ip = $mysqli->real_escape_string($_SERVER['REMOTE_ADDR']);
	$text = $mysqli->real_escape_string($_POST['text']);
	$mysqli->query("INSERT INTO `cathar_bitrix`.`variables` (`id` ,`text` ,`data` ,`ip`)VALUES (NULL , '$text',CURRENT_TIMESTAMP , '$ip')");
	if ($mysqli->errno) {
		die('Select Error (' . $mysqli->errno . ') ' . $mysqli->error);
	}	
}
$variables = Array(
	'Можешь поиграть',
	'Посмотри фильм',
	'Заработай денег',
	'Залипни в <a href="http://pikabu.ru">Пикабу</a>',
	'Прочти книгу',
	'Изучи что-нибудь новое',
	'Разгреби завалы на учобе\работе',
	'Выйди на улицу',
	'Займись собой',
	'Позвони другу\подруге',
	'Покатайся на велосипеде',
	'Займись сексом',
	'Сходи в бар\ресторан\кафе',
	'Займись шоппингом',
	'Послушай музыку',
	'Прибирись',
	'Ложись спать',
	'Приготовь покушать',
	'Сходи в гости',
	'Прыгни с парашюта',
	'Выпей чаю\кофе',
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
if($key==1){
	$what.='<br /><a href="http://www.kinopoisk.ru/view_random_film.php">Выбрать можно тут.</a>';
}
?>
<html>
	<head>
		<title>Генератор случайных дел.</title>
		<style type="text/css">
			body{
				margin: 0;
				padding: 0;
				background-color: #F0F0F0;
			}
			#wrapper{
				border: 1px solid #ebebeb;
				border-radius: 8px;
				margin: 25% 40% auto;
				width: 250px;
			}
			#header{
				background-color: #62BE5C;
				border-bottom: 1px solid #EBEBEB;
				border-radius: 8px 8px 0 0;
				color: #FFFFFF;
				padding-bottom: 5px;
				padding-left: 10px;
				padding-top: 10px;
				width: 240px;
			}
			#body{
				border-top: 1px solid #ebebeb;
				border-radius: 0 0 8px 8px;
				background-color: #fff;
				padding-bottom: 5px;
				padding-left: 10px;
				padding-top: 10px;
				width: 240px;
			}
			#social{
				text-align:right;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">Генератор случайных дел.</div>
			<div id="body"><?=$what?></div>
			<div id="social">
				<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
				<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir" data-yashareTheme="counter" ></div> 
			</div>
		</div>
		<form method="post">
			<input type="hidden" name="submited" value="1">
			<input type="text" name="text">
			<input type="submit" value="send">
		</form>
	</body>
</html>