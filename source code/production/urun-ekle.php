<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php
    @$durum=$_GET['durum'];
    if($durum=="eklendi"){
        ?>
        <script>
            swal({
				title: "Başarılı",
				text: "başarıyla ürün eklemesi yapıldı",
				icon: "success",
				button:"tamam"
				});
        </script>
        <?php
    }
    ?>
    <div class="container col-md-6">
<div class="span">   
<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>ürün ekle</h3>
				</div>
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							
						</thead>
                     
                            
                                <tbody>
                                    <form action="../process.php" method="POST">
                                    <tr>
                                        <td>Ürün ismi giriniz</td>   
                                        <td><input class="form-control col-md-6" type="text" name="urun_ekle_isim" required></td>                                  
                                    </tr>	
                                    <tr>
                                        <td>Ürün açıklaması giriniz</td>   
                                        <td><input class="form-control col-md-12" type="text" name="urun_ekle_aciklama" required></td>                                 
                                    </tr>
                                    <tr>
                                        <td>Ürün görseli için url giriniz</td>   
                                        <td><input class="form-control col-md-12" type="text" name="urun_ekle_gorsel" required></td>                                
                                    </tr>
                                    <tr>
                                        <td>Ürün fiyat bilgisi giriniz</td>   
                                        <td><input class="form-control col-md-6" type="text" name="urun_ekle_fiyat" required></td>                                
                                    </tr>
                                    <tr>
                                        <td>Ürün kategorisini seçiniz</td>   
                                        <td>
                                            <select name="urun_ekle_kategori" class="form-control col-md-6" required>
                                            <option value="">lütfen seçim yapınız</option>
                                            <option value="1">elektronik</option>
                                            <option value="2">moda</option>
                                            <option value="3">ev/yaşam</option>
                                            <option value="4">yapı market</option>
                                            <option value="5">oyuncak</option>
                                            <option value="6">spor</option>
                                            <option value="7">kozmetik</option>
                                            <option value="8">süpermarket</option>
                                            <option value="9">kitap/film</option>
                                        </select>
                                        </td>                                
                                    </tr>
                                    	
                                    <button class="btn btn-success form-control" name="urun_ekle" >ürün ekle</button>
                                    
                                    </form>			
                                </tbody>
                                
						</table>
					
				</div> 
			
			</div> 
            </div>
            </div>
</body>
</html>