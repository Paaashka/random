<?php
$random = mt_rand(0,7);
switch ($random) {
	case 0: $what = 'Можешь поиграть.';break;
	case 1: $what = 'Посмотри фильм.';break;
	case 2: $what = 'Заработай денег.';break;
	case 3: $what = 'Залипни в <a href="http://pikabu.ru">Пикабу</a>';break;
	case 4: $what = 'Прочти книгу.';break;
	case 5: $what = 'Изучи что-нибудь новое.';break;
	case 6: $what = 'Разгреби завалы на учобе\работе.';break;
	case 7: $what = 'Выйди на улицу.';break;
	#case : $what = '';break;
	default: $what = 'Займись собой.'; break;
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
	</body>
</html>