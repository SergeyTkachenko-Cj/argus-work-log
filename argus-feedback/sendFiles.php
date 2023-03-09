<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Pragma: public'); // required
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Cache-Control: no-store, no-cache, must-revalidate");

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';


if(isset($_POST['email'])) {
    $email = $_POST['email'];
}
if(isset($_POST['name'])) {
    $name = $_POST['name'];
}
if(isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
if(isset($_POST['file'])) {
    $file = $_FILES["file"];
}

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
$message = 'Уважаемый '.$name.'. '.$email.'Высылаем Вам коммерческое предложение по регистрации электролаборатории и наш подарок - '.$phone.' (в приложении этого письма). Надеемся на долгосрочное сотрудничество. Наш email: argus@argus-eko.ru и телефон: +7(495)585-09-82. Обращайтесь по любым вопросам.';
$html = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"></head><body>'.$message.'<br/><br/></body></html>';
try {
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.yandex.com';                      // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'argus@argus.group';                // SMTP username
    $mail->Password = 'ARkeyf31';                         // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->From='argus@argus.group';
    $mail->FromName='Группа компаний АРГУС';
    $mail->addAddress("tka4inni@gmail.com", "АРГУС");                            // Add a recipient

    //Attachments
    // $mail->addAttachment($kp, 'КП АРГУС.pdf', 'base64');
    // $mail->addAttachment($file, 'base64');

    // if (isset($_FILES['file'])
    // && $_FILES['file']['error'] == UPLOAD_ERR_OK
    // ) {
    // $mail->addAttachment($_FILES['file']['tmp_name'],
    //                      $_FILES['file']['name']);
    // }

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Коммерческое предложение + подарок';
    $mail->Body    = $html;
    $mail->AltBody = '';
    $mail->send();
    $return = true;
    echo json_encode($return);
} catch (Exception $e) {
    $return = false;
    echo json_encode($return);
}

echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
?>