<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// https://api.telegram.org/bot6647593290:AAFATzrEMVhMGSqAPnALAOQ7xW2ajkOBrbE/getUpdates
$token = "6647593290:AAFATzrEMVhMGSqAPnALAOQ7xW2ajkOBrbE";
$chat_id = "-1002046137150";

$name = $_POST['name'];
$thuname = $_POST['thuname'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$arr = array(
    '👤 Имя: ' => $name,
    '👤 Фамилия: ' => $thuname,
    '📞 Телефон: ' => $phone,
    '📍 Город: ' => $city
);

foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'mail.hosting.reg.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@rabota-maria-ra.ru';
    $mail->Password = 'passMail.ru';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('info@rabota-maria-ra.ru', 'Мария-Ра');
    $mail->addAddress('yu.p.pryadko@yandex.ru', 'Получатель');
    $mail->addReplyTo('info@rabota-maria-ra.ru', 'Мария-Ра');

    $mail->isHTML(true);
    $mail->Subject = 'Новая заявка с сайта';
    $mail->Body .= '
            <td style="border: 1px solid #bdbdbd; padding: 5px; width: 180px">Имя</td>
            <td style="border: 1px solid #bdbdbd; padding: 5px;">' . $name . '</td>
        </tr>
        <tr>
            <td style="border: 1px solid #bdbdbd; padding: 5px; width: 180px">Фамилия</td>
            <td style="border: 1px solid #bdbdbd; padding: 5px;">' . $thuname . '</td>
        </tr>
        <tr>
            <td style="border: 1px solid #bdbdbd; padding: 5px; width: 180px">Телефон</td>
            <td style="border: 1px solid #bdbdbd; padding: 5px;">' . $phone . '</td>
        </tr>
        <tr>
            <td style="border: 1px solid #bdbdbd; padding: 5px; width: 180px">Город</td>
            <td style="border: 1px solid #bdbdbd; padding: 5px;">' . $city . '</td>
        </tr>
    </table>';
    $mail->AltBody = 'Новая заявка с сайта!';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
