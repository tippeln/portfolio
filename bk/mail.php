<?php
require_once('libs/qd/qdmail.php');
require_once('libs/qd/qdsmtp.php');

$mail = new Qdmail();
$mail -> errorDisplay( false );
$mail -> smtp( true );

$param = array(
 "host" => "ssl://smtp.gmail.com", //w1は数字の1
 "port" => 465,
 "from" => "tippeln@gmai.com", //formではなくfrom
 "protocol" => "SMTP_AUTH",
 "user" => "tippeln@gmail.com", // Gmailアカウントのユーザ名
 "pass" => "pwmoigxigrkgjgyj" // Gmailアカウントのパスワード
);
$mail -> smtpServer($param);

$mail->to('tippeln@yahoo.co.jp');
$mail->from('tippeln@gmail.com');
$mail->subject('お知らせ');
$mail->text('テストです。');

if ( $mail->send() ) {
   echo 'メール送信成功';
} else {
   echo 'メール送信失敗';
}
?>
