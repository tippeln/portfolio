<?php
require_once "libs/util.inc.php";
require_once "libs/qd/qdsmtp.php";
require_once "libs/qd/qdmail.php";
session_start();

if (isset($_SESSION["contact"])) {
 $contact = $_SESSION["contact"];
 $name    = $contact["name"];
 $kana    = $contact["kana"];
 $mail    = $contact["mail"];
 $tel     = $contact["tel"];
 $inquiry = $contact["inquiry"];
 $token   = $contact["token"];
}
if ($_POST["send"] == "send") {
if($token !== getToken()) {
exit('処理を正常に完了できませんでした');
header("Location:contact.php");
}

$body = <<<EOT
■お名前
{$name}

■フリガナ
{$kana}

■メールアドレス
{$mail}

■電話番号
{$tel}

■問い合わせ内容
{$inquiry}
EOT;
// var_dump($body);

// SMTPの設定
$param = array(
 "host" => "ssl://smtp.gmail.com", //w1は数字の1
 "port" => 465,
 "from" => "tippeln@gmai.com", //formではなくfrom
 "protocol" => "SMTP_AUTH",
 "user" => "tippeln@gmail.com", // Gmailアカウントのユーザ名
 "pass" => "pwmoigxigrkgjgyj" // Gmailアカウントのパスワード
);
// メールの送信
$mail = new Qdmail();
$mail->errorDisplay(FALSE);
$mail->smtpObject()->error_display = FALSE;
$mail->from("tippeln@gmail.com", "Tsubomi* Portfolio");
$mail->to("tippeln@gmail.com","tippeln*");
$mail->subject("Tsubomi* Portfolio（お問い合わせ）");
$mail->text($body);
$mail->smtp(TRUE);
$mail->smtpServer($param);
$flag = $mail->send();
// var_dump($mail);
// var_dump($flag);
// exit;

if($flag == TRUE){//もし送信に成功したならば
    unset($_SESSION["contact"]);//セッション変数を破棄
    header("Location: contact_done.php");
}
else{//送信失敗した場合は、セッション変数はそのままで
   header("Location: contact_error.php");
}

} elseif ($_POST["back"] == "back") {
   header("Location: contact.php");
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tsubomi* | tippeln's Portfolio</title>
    <meta name="keywords" content="Portfolio">
    <meta name="description" content="Portfolio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="。" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap_min.css">
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/common.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body class="delayed-image">
    <div class="wrapper">
        <header>
            <section id="g-nav" class="section">
                <nav>
                    <div class="g-nav pc-mode">
                        <div>
                            <!-- <a href="index.html"><img src="images/logo.png" alt="" height="30px"></a> -->
                            <a href="index.php"></a>
                        </div>
                        <div class="menu"><a href="https://tsubomiworks.com/portfolio/">Home</a></div>
                        <div class="menu"><a href="index.php#portfolio" alt="">Portfolio</a></div>
                        <div class="menu"><a href="index.php#about" alt="">About</a></div>
                        <div class="menu"><a href="index.php#contact" alt="">Contact</a></div>
                    </div>
                    <div class="g-nav-m m-mode">
                        <div class="cp_offcm01">
                            <input type="checkbox" id="cp_toggle01">
                            <label for="cp_toggle01"><span></span></label>
                            <div class="cp_menu">
                                <ul>
                                    <li class="menu-m"><a href="https://tsubomiworks.com/portfolio/">Home</a></li>
                                    <li class="menu-m"><a href="index.php#portfolio" alt="">Portfolio</a></li>
                                    <li class="menu-m"><a href="index.php#about" alt="">About</a></li>
                                    <li class="menu-m"><a href="index.php#contact" alt="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-contents">
                            <h1><a href="index.php"></a></h1>
                        </div>
                    </div>
                </nav>
            </section>
        </header>
        <main>
          <section>
          <h2>Message Confirmation</h2>
    <div class="centering">




            <table class="centering">
              <tbody class="centering-text">
                <tr>
                  <td colspan="2"><p>内容を修正される場合は「修正する」ボタンを、送信される場合は「送信する」ボタンを押してください。</p></td>
                </tr>
              <tr>
                <th>お名前</th>
                <td><?php echo h($name); ?></td>
              </tr>
              <tr>
                <th>フリガナ</th>
                <td><?php echo h($kana); ?></td>
              </tr>
              <tr>
                <th>メールアドレス</th>
                <td><?php echo h($mail); ?>.com</td>
              </tr>
              <tr>
                <th>電話番号</th>
                <td><?php echo h($tel); ?></td>
              </tr>
              <tr>
                <th>お問い合わせ内容</th>
                <td><?php echo h($inquiry); ?></td>
              </tr>
</tbody>
            </table>
            <form action="" method="post">
                <!-- <div class="centering-text"> -->
                <!-- <div class="col-sm-10"> -->
                  <button type="submit" name="send" value="send">送信する</button>　　
                  <button type="submit" name="back" value="back">修正する</button>
                <!-- </div> -->
              <!-- </div> -->
            </form>
          </div>
</section>
        </main>
        <footer>
            <p><small class="center">Copyright &copy2019 Tsubomi* All Rights Reserved.</small></p>
        </footer>

    </body>
</html>