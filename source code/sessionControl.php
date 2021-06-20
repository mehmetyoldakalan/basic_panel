<?php

include "db.php";
$uye_sor=$db->prepare("SELECT *FROM uyeler where uye_mail=:mail");
$uye_sor->execute(array(
    'mail'=>$_SESSION['uye_mail']
));
$durum=$uye_sor->rowCount();
if($durum<=0){
    header("Location:../index");
}

?>