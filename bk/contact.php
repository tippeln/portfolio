<?php
require_once "libs/util.inc.php";
session_start();

$name     = "";
$kana     = "";
$email    = "";
$phone    = "";
$inquiry  = "";
$mapNone  = TRUE;

if (isset($_SESSION["contact"])) {
 $contact = $_SESSION["contact"];
 $name    = $contact["name"];
 $kana    = $contact["kana"];
 $mail    = $contact["mail"];
 $tel     = $contact["tel"];
 $inquiry = $contact["inquiry"];
 $token   = $contact["token"];
 $mapNone  = FALSE;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

   $isValidated = TRUE;
   $mapNone = FALSE;
   $name     = $_POST["name"];
   $kana     = $_POST["kana"];
   $mail     = $_POST["mail"];
   $tel      = $_POST["tel"];
   $inquiry  = $_POST["inquiry"];
   $token    = $_POST["token"];

   if ($name === "") {
   $nameError = "※お名前を入力してください";
   $isValidated = FALSE;
   }
   // お知らせのバリデーション
   if ($kana === "") {
   $kanaError = "※フリガナを入力してください";
   $isValidated = FALSE;
   }
   elseif(!preg_match("/^[ァ-ヶ－ 　]+$/u", $kana)) {
   $kanaError = "※フリガナの形式が正しくありません";
   $isValidated = FALSE;
   }
   if ($mail === "") {
   $mailError = "※メールアドレスを入力してください";
   $isValidated = FALSE;
   }
   // elseif(!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/u", $mail)) {
   elseif(!preg_match("/^[^@]+@[^@]+\.[^@]+$/", $mail)) {
   $mailError = "※メールアドレスの形式が正しくありません";
   $isValidated = FALSE;
   }
     if ($inquiry === "") {
   $inquiryError = "※お問い合わせ内容を入力してください";
   $isValidated = FALSE;
   }

   if($isValidated == TRUE) {
       $contact = array(
      "name"       => $name,
      "kana"       => $kana,
      "mail"       => $mail,
      "tel"        => $tel,
      "inquiry"    => $inquiry,
      "token"      => $token,
      "mapNone"    => FALSE
      );

    $_SESSION["contact"] = $contact;
    header("Location: contact_conf.php");
   }
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
    <div class="warpper">
        <header>
            <section id="g-nav" class="section">
                <nav>
                    <div class="g-nav pc-mode">
                        <div>
                            <!-- <a href="index.html"><img src="images/logo.png" alt="" height="30px"></a> -->
                            <a href="index.html"></a>
                        </div>
                        <div class="menu"><a href="index.html" alt="">Home</a></div>
                        <div class="menu"><a href="about.html" alt="">About</a></div>
                        <div class="menu"><a href="portfolio.html" alt="">Portfolio</a></div>
                        <div class="menu"><a href="contact.php" alt="">Contact</a></div>
                    </div>
                    <div class="g-nav-m m-mode">
                        <div class="cp_offcm01">
                            <input type="checkbox" id="cp_toggle01">
                            <label for="cp_toggle01"><span></span></label>
                            <div class="cp_menu">
                                <ul>
                                    <li class="menu-m"><a href="index.html" alt="">Home</a></li>
                                    <li class="menu-m"><a href="about.html" alt="">About</a></li>
                                    <li class="menu-m"><a href="portfolio.html" alt="">Portfolio</a></li>
                                    <li class="menu-m"><a href="contact.php" alt="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-contents">
                            <h1><a href="index.html"></a></h1>
                        </div>
                    </div>
                </nav>
            </section>
        </header>
        <main>
                              <h2>Send Message</h2>
            <div class="centering form-size">
                    <form class="centering-text" action="" method="post">
                        <div class="form-group">
                            <label for="inputname" class="col-sm-8 control-label">お名前<span>(必須)</span></label>
                            <div class="col-sm-12">
                                <?php if (isset($nameError)): ?>
                                <div class="text-warning">
                                    <?php echo h($nameError); ?>
                                </div>
                                <?php endif; ?>
                                <input type="text" class="form-control" id="inputname" name="name" required value="<?php echo h($name); ?>">
                                <p class="help-block">(例)山田　太郎</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputkana" class="col-sm-8 control-label">フリガナ<span>(必須)</span></label>
                            <div class="col-sm-12">
                                <?php if (isset($kanaError)): ?>
                                <div class="text-warning">
                                    <?php echo h($kanaError); ?>
                                </div>
                                <?php endif; ?>
                                <input type="text" class="form-control" id="inputkana" name="kana" required value="<?php echo h($kana); ?>">
                                <p class="help-block">(例)ヤマダ　タロウ ※全角カタカナ</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputemail" class="col-sm-8 control-label">メールアドレス<span>(必須)</span></label>
                            <div class="col-sm-12">
                                <?php if (isset($mailError)): ?>
                                <div class="text-warning">
                                    <?php echo h($mailError); ?>
                                </div>
                                <?php endif; ?>
                                <input type="email" class="form-control" id="inputemail" name="mail" required value="<?php echo h($mail); ?>">
                                <p class="help-block">(例)abc@zz.com ※半角英数字</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputtel" class="col-sm-8 control-label">電話番号</label>
                            <div class="col-sm-12">
                                <input type="tel" class="form-control" id="inputtel" name="tel" value="<?php echo h($tel); ?>">
                                <p class="help-block">(例)03-1234-3214　※ハイフンあり　半角数字</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputmessage" class="col-sm-8 control-label">お問い合わせ内容<span>(必須)</span></label>
                            <div class="col-sm-12">
                                <?php if (isset($inquiryError)): ?>
                                <div class="text-warning">
                                    <?php echo h($inquiryError); ?>
                                </div>
                                <?php endif; ?>
                                <textarea rows="10" cols="100" class="form-control" id="message" required maxlength="999" style="resize:none" name="inquiry"><?php echo h($inquiry); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10 centering">
                                <button type="submit" class="send">内容を確認して送信</button>
                            </div>
                            <input type="hidden" name="token" value="<?php echo getToken(); ?>">
                        </div>
                    </form>
            </div>
    </main>
    <footer>
        <p><small class="center">Copyright &copy2019 Tsubomi* All Rights Reserved.</small></p>
    </footer>
    </div>
</body>

</html>