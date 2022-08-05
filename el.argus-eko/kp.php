<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Коммерческое предложение</title>
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

    $mail->Subject = 'Новое коммерческое предложение';
    $mail->Body    = 'Телефон: '.$_POST['phone'];
    $mail->AltBody = 'Телефон: '.$_POST['phone'];

    $mail->send();
    $st='Мы получили ваше коммерческое предложение.<br>В течение 1 рабочего часа мы подготовим более выгодное и обязательно Вам перезвоним.
<br><br>Мы работаем в будни с 9 до 18 часов.';
} catch (Exception $e) {
    $st='Какая-то ошибка при отправке письма:</br>'. $mail->ErrorInfo;
}


//   $picture = "";
//   // Если поле выбора вложения не пустое - закачиваем его на сервер
//   if (!empty($_FILES['file']['tmp_name']))
//   {
//     // Закачиваем файл
//     $path = $_FILES['file']['name'];
//     if (copy($_FILES['file']['tmp_name'], $path)) $picture = $path;
//   }
//   $thm = "Новое коммерческое предложение";
//   $msg = "Телефон: ".$_POST['phone'];
//   //$mail_to = "argus@argus-eko.ru, arguseko@yandex.ru";
//   $mail_to = "merlin.jury@gmail.com";

// send_mail($mail_to, $thm, $msg, $picture);
//   // Вспомогательная функция для отправки почтового сообщения с вложением (Trianon)
//   function send_mail($mail_to, $thema, $html, $path)
//   { if ($path) {
//     $fp = fopen($path,"rb");
//     if (!$fp)
//     { print "Cannot open file";
//      // exit();
//     }
//     $file = fread($fp, filesize($path));
//     fclose($fp);
//     }

// 	//print_r($_FILES['file']);
//     $name = $_FILES['file']["name"]; // в этой переменной надо сформировать имя файла (без всякого пути)
//     $EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
//     $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.
//     $headers    = "MIME-Version: 1.0;$EOL";
//     $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";
//     //$headers   .= "From: alexbelkevich@mail.ru";
//     $headers   .= "From: noreply@argus-eko.ru";
//     $multipart  = "--$boundary$EOL";
//     $multipart .= "Content-Type: text/html; charset=utf-8$EOL";
//     $multipart .= "Content-Transfer-Encoding: base64$EOL";
//     $multipart .= $EOL; // раздел между заголовками и телом html-части
//     $multipart .= chunk_split(base64_encode($html));

//     $multipart .=  "$EOL--$boundary$EOL";
//     $multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";
//     $multipart .= "Content-Transfer-Encoding: base64$EOL";
//     $multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";
//     $multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла
//     $multipart .= chunk_split(base64_encode($file));

//     $multipart .= "$EOL--$boundary--$EOL";

//         if(!mail($mail_to, $thema, $multipart, $headers))
//          {return False;           //если не письмо не отправлено
//       }
//     else { //// если письмо отправлено
//     return True;
//     }
//   //exit;
//   }
?>
    <header class="page-header">
            <div class="container" style="text-align:center">
                <div class="row">
                    <div class="col-xs-8 col-sm-3 col-sm-pull-6">
                        <a href="/" class="logo">Аргус-<span>Эко</span></a>
                    </div>
                    <div>
                        <p style="font-size:18px; font-weight:bold">
                            <br><?php echo $st; ?><br></br>
                        </p>
                        <a href="http://el.argus-eko.ru" style="font-weight:bold">Вернуться на сайт</a>
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
