<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Заявка на обратный звонок</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'libs/vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

  $mail->setLanguage('ru');//, 'vendor/phpmailer/phpmailer/language');
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();
  $mail->Host='smtp.mail.ru';
  $mail->SMTPAuth=true;                               // Enable SMTP authentication
  $mail->Username='noreply@argus-eko.ru';                 // SMTP username
  $mail->Password='sN2dD5Uy';                           // SMTP password
  $mail->SMTPSecure='ssl';                   // Enable TLS encryption, `ssl` also accepted
  $mail->Port='465';                                    // TCP port to connect to
  $mail->isHTML(true);                                  // Set email format to HTML

    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->setFrom('noreply@argus-eko.ru');
    $mail->addAddress('arguseko@yandex.ru');     // Add a recipient
    $mail->addAddress('argus@argus-eko.ru');               // Name is optional
    // $mail->addAddress('merlin.jury@gmail.com');               // Name is optional
    
    if (isset($_FILES['file']['tmp_name'])) $mail->addAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);         // Add attachments

    $mail->Subject = 'Заявка на обратный звонок';
    $mail->Body    = 'Имя: '.$_POST['name'].'<br> Телефон: '.$_POST['phone'];
    $mail->AltBody = 'Имя: '.$_POST['name'].'
Телефон: '.$_POST['phone'];

    $mail->send();
    $st='Благодарим за интерес к нашей компании!<br>В ближайшее время мы обязательно Вам перезвоним.<br><br>Мы работаем в будни с 9 до 18 часов.';
} catch (Exception $e) {
    $st='Какая-то ошибка при отправке письма:</br>'. $mail->ErrorInfo;
}



?>
        <header class="page-header">
            <div class="container" style="text-align:center">
                <div class="row">
                    <div class="col-xs-8 col-sm-3 col-sm-pull-6">
                        <a href="http://el.argus-eko.ru" class="logo">Аргус-<span>Эко</span></a>
                    </div>
                    <div>
                        <p style="font-size:18px; font-weight:bold">
                            <br><?php echo $st; ?><br></br>
                        </p>
                        <a href="/" style="font-weight:bold">Вернуться на сайт</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter37189515 = new Ya.Metrika({
                            id: 37189515
                            , clickmap: true
                            , trackLinks: true
                            , accurateTrackBounce: true
                            , webvisor: true
                            , trackHash: true
                        });
                    } catch (e) {}
                });

                var n = d.getElementsByTagName("script")[0]
                    , s = d.createElement("script")
                    , f = function () {
                        n.parentNode.insertBefore(s, n);
                    };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/37189515" style="position:absolute; left:-9999px;" alt="" /></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->
</body>

</html>
