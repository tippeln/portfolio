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
    <title>Tsubomi* | tsubomi's Portfolio</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148916871-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148916871-1');
</script>
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
                            <a href="index.php"></a>
                        </div>
                        <div class="menu"><a href="https://tsubomiworks.com/portfolio/">Home</a></div>
                        <div class="menu"><a href="https://tsubomiworks.com/portfolio/index.php#portfolio" alt="">Portfolio</a></div>
                        <div class="menu"><a href="https://tsubomiworks.com/portfolio/index.php#about" alt="">About</a></div>
                        <div class="menu"><a href="https://tsubomiworks.com/portfolio/index.php#contact" alt="">Contact</a></div>
                    </div>
                    <div class="g-nav-m m-mode">
                        <div class="cp_offcm01">
                            <input type="checkbox" id="cp_toggle01">
                            <label for="cp_toggle01"><span></span></label>
                            <div class="cp_menu">
                                <ul>
                                    <li class="menu-m"><a href="https://tsubomiworks.com/portfolio/">Home</a></li>
                                    <li class="menu-m"><a href="https://tsubomiworks.com/portfolio/index.php#portfolio" alt="">Portfolio</a></li>
                                    <li class="menu-m"><a href="https://tsubomiworks.com/portfolio/index.php#about" alt="">About</a></li>
                                    <li class="menu-m"><a href="https://tsubomiworks.com/portfolio/index.php#contact" alt="">Contact</a></li>
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
            <center>
                <p class="title_logo"><img src="images/title_logo.png" width="400px" alt=""></p>
                <p class="title_img"><img src="images/photo01.jpg" width="320px" alt=""></p>
            </center>
            <section>
                <div class="container">
                    <section id="portfolio" class="fadein-bottom">
                    <!-- <section id="portfolio"> -->
                        <h2>Portfolio</h2>
                        <article>
                            <div class="s-list">
                                <div class="s-card">
                                    <a href="http://tsubomi.lomo.jp/tsubomi-kindergarden/" target=”_blank”><img src="images/tsubomi_st.jpg" class="s-image">
                                    <p class="s-title">つぼみ幼稚園</p></a>
                                    <p class="s-content">職業訓練学校での卒業制作で架空の幼稚園サイトを制作致しました。<br>
                                        在園児専用メニューを利用するには認証が必要ですので以下のID,パスワードを使用ください。<br>
                                        園児ごとにIDを付与し、クラス単位でのメニューが生成されるようにしています。<br>
                                        ID:tsubomi Pass:kindergarden</p>
                                </div>
                                <div class="s-card">
                                    <a href="http://tsubomi.lomo.jp/nlab/" target=”_blank”><img src="images/nlab_st.jpg" class="s-image">
                                    <p class="s-title">千葉大学 中口研究室 【Nlab】</p></a>
                                    <p class="s-content">職業訓練学校での企業サイト実習で千葉大学、中口教授からのサイトリニューアル案件を受け制作しました。</p>
                                </div>
                                <div class="s-card">
                                    <a href="http://tsubomi.lomo.jp/sql/" target=”_blank”><img src="images/sql_st.jpg" class="s-image">
                                    <p class="s-title">SQL攻略</p></a>
                                    <p class="s-content">Bootstrapのメガメニューを実装し、サイトリニューアルしたいというご相談があり、トップページのみ制作致しました。</p>
                                </div>
                            </div>
                        </article>
                    </section>
                    <section id="about" class="fadein-bottom">
                        <h2>About</h2>
                        <table class="prof-tbl">
                            <tr>
                                <th>Name</th>
                                <td>つぼみ</td>
                            </tr>
                            <tr>
                                <th>Adress</th>
                                <td>東京都</td>
                            </tr>
                            <tr>
                                <th>Certification</th>
                                <td>
                                    第二種情報処理技術者試験（現：基本処理技術者相当）<br>
                                    初級システムアドミニストレータ試験（現：ITパスポート試験相当）<br>
                                    日商簿記2級<br>
                                    全商簿記1級<br>
                                    OracleSilver<br>
                                    DB2グローバルマスター アドバイザー<br>
                                    Webクリエイター能力認定試験　エキスパート<br>
                                </td>
                            </tr>
                            <tr>
                                <th>Skill</th>
                                <td>
                                    COBOL, アセンブラ, JCL, <br>
                                    HTML5, CSS3(SCSS), PHP, Wordpress, JQuery<br>
                                    Github, Illustrator, Photoshop, Slack<br>
                                    DB2, MYSQL
                                </td>
                            </tr>
                        </table>
                    </section>
                    <section id="contact" class="fadein-bottom">
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
                    </section>
                </div>
            </section>
        </main>
        <footer>
            <p><small class="center">Copyright &copy2019 Tsubomi* All Rights Reserved.</small></p>
        </footer>
    </div>
    <script>
    $(function() {
        // 設定
        var $width = 640; // 横幅
        var $height = 480; // 高さ
        var $interval = 6000; // 切り替わりの間隔（ミリ秒）
        var $fade_speed = 2000; // フェード処理の早さ（ミリ秒）
        $("#slide ul li").css({ "position": "relative", "overflow": "hidden", "width": $width, "height": $height });
        $("#slide ul li").hide().css({ "position": "absolute", "top": 0, "left": 0 });
        $("#slide ul li:first").addClass("active").show();
        setInterval(function() {
            var $active = $("#slide ul li.active");
            var $next = $active.next("li").length ? $active.next("li") : $("#slide ul li:first");
            $active.fadeOut($fade_speed).removeClass("active");
            $next.fadeIn($fade_speed).addClass("active");
        }, $interval);
    });
    </script>
    <script>
    jQuery(function() {
        var pagetop = $('#page_top');
        pagetop.hide();
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) { //100pxスクロールしたら表示
                pagetop.fadeIn();
            } else {
                pagetop.fadeOut();
            }
        });
        pagetop.click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500); //0.5秒かけてトップへ移動
            return false;
        });
    });
    </script>
</body>

</html>