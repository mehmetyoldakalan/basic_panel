
<?php
include "../db.php";
$gorev_sor=$db->prepare("SELECT * FROM todolist where gorev_durum='tamamlanmadı'");
$gorev_sor->execute();
while($gorev_yaz=$gorev_sor->fetch(PDO::FETCH_ASSOC)){
    echo '<div>görev adı: '.$gorev_yaz['gorev_adi'].'</div>';
    echo '<div>görev açıklama: '.$gorev_yaz['gorev_aciklama'].'</div>';
    echo '<div>görev yazan: '.$gorev_yaz['gorev_ekleyen'].'</div>';
    echo '<div>görev tarihi: '.$gorev_yaz['gorev_tarih'].'</div>';
    echo '<div>görev durumu: '.$gorev_yaz['gorev_durum'].'</div>';
    ?>
    <form action="../process" method="POST">
    <input type="hidden" name="gorev_id" value="<?php echo $gorev_yaz['gorev_id']?>">
    <button name="gorev_yapıldı"class="btn btn-success btn-sm">yapıldı</button>
    </form>
    <hr>
    <?php
}
?>