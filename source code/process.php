<?php
session_start();
ob_start();
require_once "db.php";
include "sessionControl.php";
if(isset($_POST['giris'])){
    $mail=htmlspecialchars(strip_tags($_POST['mail']));
    $parola=htmlspecialchars(strip_tags(md5($_POST['parola'])));
    $kullanici_sor=$db->prepare("SELECT * FROM uyeler where uye_mail=:mail and uye_parola=:parola");
    $kullanici_sor->execute(array(
        'mail'=>$mail,
        'parola'=>$parola
    ));
    $durum=$kullanici_sor->rowCount();
    if($durum<=0){
        header("Location:index");
    }else{
        $_SESSION['uye_mail']=$mail;
        header("Location:production/anasayfa");
    }
}
if(isset($_POST['uyeSil'])){
    $uye_id=$_POST['uyeId'];
    $uyeSil=$db->prepare("DELETE FROM uyeler where uye_id=:id");
    $delete=$uyeSil->execute(array('id'=>$uye_id));
    if($delete){
        header("Location:production/uyeler");
    }
    else{
        echo "bir hata oluştu";
    }
}
if(isset($_POST['urun_ekle'])){
    $urun_isim=htmlspecialchars(strip_tags($_POST['urun_ekle_isim']));
    $urun_aciklama=htmlspecialchars(strip_tags($_POST['urun_ekle_aciklama']));
    $urun_gorsel=htmlspecialchars(strip_tags($_POST['urun_ekle_gorsel']));
    $urun_fiyat=htmlspecialchars(strip_tags($_POST['urun_ekle_fiyat']));
    $urun_kategori=$_POST['urun_ekle_kategori'];
    $statu=1;
    $urunEkle=$db->prepare("INSERT INTO product set
        urun_isim=:urun_isim,
        urun_aciklama=:urun_aciklama,
        urun_gorsel_url=:urun_gorsel_url,
        urun_fiyat=:urun_fiyat,
        urun_kategori_id=:urun_kategori_id,
        urun_statu=:urun_statu
    ");
    $insert=$urunEkle->execute(array(
        'urun_isim'=>$urun_isim,
        'urun_aciklama'=>$urun_aciklama,
        'urun_gorsel_url'=>$urun_gorsel,
        'urun_fiyat'=>$urun_fiyat,
        'urun_kategori_id'=>$urun_kategori,
        'urun_statu'=>$statu
    ));
    if($insert){
        header("Location:production/urun-ekle?durum=eklendi");
    }
    else{
        echo "bir hata oluştu";
    }

}
if(isset($_POST['kategori_guncelle'])){
    $kategori_isim=htmlspecialchars(strip_tags($_POST['kategori_guncelle_isim']));
    $id=$_POST['kategori_id'];
    $kategori_guncelle=$db->prepare("UPDATE category set category_isim=:isim where category_id=$id");
    $update=$kategori_guncelle->execute(array('isim'=>$kategori_isim));
    if($update){
        header("Location:production/kategoriler");
    }
    else{
        echo "işlem sırasında bir hata meydana geldi";
    }
}
if(isset($_POST['kategori_sil'])){
    $kategori_id=$_POST['kategori_id'];
    $kategori_sil=$db->prepare("DELETE from category where category_id=:id");
    $delete=$kategori_sil->execute(array('id'=>$kategori_id));
    if($delete){
        header("Location:production/kategoriler");
    }
    else{
        echo "işlem sırasında bir hata meydana geldi";
    }
}
if(isset($_POST['kategori_ekle'])){
    $kategori_ekle_isim=htmlspecialchars(strip_tags($_POST['kategori_ekle_isim']));
    $kategori_ekle=$db->prepare("INSERT INTO category set category_isim=:isim");
    $insert=$kategori_ekle->execute(array('isim'=>$kategori_ekle_isim));
    if($insert){
        header("Location:production/kategoriler");
    }
    else{
        echo "işlem sırasında bir hata meydana geldi";
    }
    

}
// if(isset($_GET['islem'])){
//     $islem=$_GET['islem'];
//     if($islem=="gonder"){
//         $gorev_adi=$_POST['gorev_adi'];
//         $gorev_aciklama=$_POST['gorev_aciklama'];
//         $gorev_durum="tamamlanmadı";
//         $gorev_ekle=$db->prepare("INSERT INTO todolist set gorev_adi=:gorev_adi,gorev_ekleyen=:gorev_ekleyen,gorev_aciklama=:gorev_aciklama,gorev_durum=:gorev_durum");
//         $insert=$gorev_ekle->execute(array(
//             'gorev_adi'=>$gorev_adi,
//             'gorev_ekleyen'=>$_SESSION['uye_mail'],
//             'gorev_aciklama'=>$gorev_aciklama,
//             'gorev_durum'=>$gorev_durum
//         ));
//         if($insert){
//             // $gorev_getir=$db->prepare("SELECT * from todolist");
//             // $gorev_getir->execute(array());
//             // while($gorev_yaz=$gorev_getir->fetch(PDO::FETCH_ASSOC)){
//             //     echo $gorev_yaz['gorev_adi']."<br>";

//             // }
            
//         }
//     }
// }
if(isset($_POST['gorev_adi'])){
    $gorev_adi=$_POST['gorev_adi'];
        $gorev_aciklama=$_POST['gorev_aciklama'];
        $gorev_durum="tamamlanmadı";
        $gorev_ekleyen=$_SESSION['uye_mail'];
        $gorev_ekle=$db->prepare("INSERT INTO todolist set gorev_adi=:gorev_adi,gorev_ekleyen=:gorev_ekleyen,gorev_aciklama=:gorev_aciklama,gorev_durum=:gorev_durum");
        $insert=$gorev_ekle->execute(array(
            'gorev_adi'=>$gorev_adi,
            'gorev_ekleyen'=>$gorev_ekleyen,
            'gorev_aciklama'=>$gorev_aciklama,
            'gorev_durum'=>$gorev_durum
        ));
        
}
if(isset($_POST['gorev_yapıldı'])){
    $id=$_POST['gorev_id'];
    $guncelle=$db->prepare("UPDATE todolist set gorev_durum=:gorev_durum where gorev_id=$id");
    $update=$guncelle->execute(array(
        'gorev_durum'=>"tamamlandı"
    ));
    if($update){
        header("Location:production/yapilacaklar-listesi");
    }
    else{
        echo "bir hata oluştu";
    }
}
?>