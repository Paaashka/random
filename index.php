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
require_once('variables.php');
if ((int)$_GET['id']) {
    if (isset($variables[(int)$_GET['id']])) {
        $what = $variables[(int)$_GET['id']];
    } else {
        header("Location: http://cathar.ru/random/" . array_rand($variables) . "/");
        exit;
    }
} else {
    header("Location: http://cathar.ru/random/" . array_rand($variables) . "/");
    exit;
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
    <link rel="stylesheet" type="text/css" href="/random/css/style.css"/>

    <link rel="shortcut icon" href="favicon.ico">
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
            <a href="/random/">ещё вариант?</a><br/>
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

        <p>Это сайт, который подскажет, чем заняться, если ты, вдруг, не знаешь.</p>

        <p>Он настолько крутой, что может читать твои мысли. Так что осторожнее с ним :-)</p>

        <div class="share">
            <div class="share__title">поделись с миром:</div>
            <div class="yashare-auto-init share__buttons" data-yashareL10n="ru"
                 data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir"
                 data-yashareTheme="counter" data-yashareLink="http://cathar.ru/random/"></div>
        </div>
    </aside>
    <div style="clear: both;"></div>
    <footer>Сделали <a href="http://cathar.ru">Алёшка</a> и <a href="http://paaashka.ru">Пашка</a>.</footer>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter25254488 = new Ya.Metrika({
                    id: 25254488,
                    clickmap: true,
                    trackLinks: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="//mc.yandex.ru/watch/25254488" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>