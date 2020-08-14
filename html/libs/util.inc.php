<?php
function getWareki($seireki)
{
    if(!is_numeric($seireki)){//空白か文字
        $wareki = "未対応";
    }
    elseif($seireki < 1868){//0～1867
        $wareki = "未対応";
    }
    else{//1868～

        if($seireki <= 1911){//1868～1911

            if($seireki == 1868){
                $wareki = "明治元年";
            }else{
                $year = $seireki - 1867;
                $wareki = "明治".$year."年";
            }

        }elseif($seireki <= 1925){//1912～1925)

            if($seireki == 1912){
                $wareki = "大正元年";
            }else{
                $year = $seireki - 1911;
                $wareki = "大正".$year."年";
            }

        }elseif($seireki <= 1988){//1926～1988)

            if($seireki == 1926){
                $wareki = "昭和元年";
            }else{
                $year = $seireki - 1925;
                $wareki = "昭和".$year."年";
            }

        }elseif($seireki <= 2018){//1989～2018)

            if($seireki == 1988){
                $wareki = "平成元年";
            }else{
                $year = $seireki - 1988;
                $wareki = "平成".$year."年";
            }

    }else {//2019～

            if($seireki == 2019){
                $wareki = "令和元年";
            }else{
                $year = $seireki - 2018;
                $wareki = "令和".$year."年";
            }

        }
    }
    return $wareki;
}

function h($string)
{
    return htmlspecialchars($string,ENT_QUOTES);
}

function s($link, $flink)
{
session_start();
if($_SESSION["authenticated"] == TRUE) {
header("Location:" .$link);
 exit;
} else {
    header("Location:" .$flink);
 exit;
}
}

function del_session()
{
session_start();
$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(), "", time() - 36000,
 $params["path"], $params["domain"],
 $params["secure"], $params["httponly"]);
session_destroy();
}

function getToken()
{
return hash('sha256',session_id());
}