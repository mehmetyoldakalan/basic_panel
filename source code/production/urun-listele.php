<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

#product {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  max-width: 200px;;
}

#product td, #product th {
  border: 1px solid #ddd;
  padding: 8px;
}

#product tr{background-color: #f2f2f2;}

#product tr:hover {background-color: #ddd;}

#product th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
    </style>
</head>
<body>
<div class="container col-md-6">
<table id="product">
<tr>
    <th>Ürün Id</th>
    <th>Ürün isim</th>
    <th>Ürün açıklama</th>
    <th>Ürün görseli url adresi</th>
    <th>Ürün fiyatı</th>
    <th>Ürün kategorisi</th>
    <th>Ürün statüsü</th>
  </tr>
  <?php
    $urun_sor=$db->prepare("SELECT * FROM product");
    $urun_sor->execute();
    while($urun_yaz=$urun_sor->fetch(PDO::FETCH_ASSOC)){?>
        <tr>
            <td><?php echo $urun_yaz['urun_id']?></td>
            <td><?php echo $urun_yaz['urun_isim']?></td>
            <td><?php echo $urun_yaz['urun_aciklama']?></td>
            <td><?php echo $urun_yaz['urun_gorsel_url']?></td>
            <td><?php echo $urun_yaz['urun_fiyat']?></td>
            <?php
            $kategori_sor=$db->prepare("SELECT category_isim FROM category where category_id=".$urun_yaz['urun_kategori_id']);
            $kategori_sor->execute();
            $kategori_yaz=$kategori_sor->fetch(PDO::FETCH_ASSOC);
            ?>
            <td><?php echo $kategori_yaz['category_isim']?></td>
            <td><?php echo $urun_yaz['urun_statu']=='1'?"aktif":"pasif"?></td>
        </tr>
   <?php }
  ?>
  
  
</div>
</table>
</body>
</html>