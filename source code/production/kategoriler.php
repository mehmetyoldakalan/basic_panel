<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div class="container col-md-6">
<div class="span">   
<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>kategori listesi</h3>
                    <button onclick="window.location.href='kategori-ekle'" class="form-control btn btn-success">kategori ekle</button>
				</div>
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>kategori ismi</th>	
                                <th>işlem</th>							
							</tr>
						</thead>
                        <?php
                        if(isset($_POST['guncelle'])){?>
                            <h1><?php echo $_POST['kategoriId'];?></h1>
                       <?php }
                            $kategori_sor=$db->prepare("SELECT * FROM category");
                            $kategori_sor->execute(array());
                            while($kategori_yaz=$kategori_sor->fetch(PDO::FETCH_ASSOC)){?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $kategori_yaz['category_isim']?></td>  
                                        <td><form action="kategori-duzenle" method="POST"><input type="hidden" name="kategoriId" value="<?php echo $kategori_yaz['category_id']?>"><button name="guncelle" class="btn btn-success btn-sm form-control">güncelle</button></form>
                                        <form action="../process.php" method="POST"><input type="hidden" name="kategori_id" value="<?php echo $kategori_yaz['category_id']?>"><button name="kategori_sil" class="btn btn-danger btn-sm form-control">sil</button></form></td>                               
                                    </tr>						
                                </tbody>
                            <?php }
                           
                        ?>
                                
						</table>
					
				</div> 
			
			</div> 
            </div>
            </div>
</body>
</html>