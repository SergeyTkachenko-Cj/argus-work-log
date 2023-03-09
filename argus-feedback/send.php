<?
    if(isset($_POST['name'])) {
        $name = '<p>name: '.$_POST['name'].'</p>';
    }
    if(isset($_POST['phone'])) {
        $phone = '<p>phone: '.$_POST['phone'].'</p>';
    }
    if(isset($_POST['email'])) {
        $email = '<p>email: '.$_POST['email'].'</p>';
    }
    if(isset($_POST['file'])) {
        $file = '<p><b>Прикреп: </b>'.$_POST['file'].'</p>';
    }

    $to = 'tka4inni@gmail.com';

    // $to = 'advertising@argus-eko.ru, margo@argus-eko.ru';

    // $to = '126@argus-eko.ru';

    $subject = 'Отправили заявку с attestat';
    $message = '
                    <html>
                        <head>
                            <title>'.$subject.'</title>
                        </head>
                        <body>
                            '. $name .'
                            '. $phone .'
                            '. $email .'
                            '. $file .'
                        </body>
                    </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Argus <argus@argous.group>\r\n";
    mail($to, $subject, $message, $headers);

?>