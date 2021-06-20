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
				</div>
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>kategori ismi</th>	
                                							
							</tr>
						</thead>
                        <?php
                        
                            $kategori_sor=$db->prepare("SELECT * FROM category where category_id=:id");
                            $kategori_sor->execute(array(
                                'id'=>$_POST['kategoriId']
                            ));
                           $kategori_yaz=$kategori_sor->fetch(PDO::FETCH_ASSOC)?>
                                <tbody>
                                    <tr>
                                        <td><form action="../process.php" method="POST"><input type="hidden" name="kategori_id" value="<?php echo $kategori_yaz['category_id']?>"><input type="text" required name="kategori_guncelle_isim" class="form-control" value="<?php echo $kategori_yaz['category_isim']?>"></td>  
                                        <button name="kategori_guncelle" class="btn btn-success btn-sm form-control">güncelle</button></form></td>                               
                                    </tr>						
                                </tbody>
                             
						</table>
					
				</div> 
			
			</div> 
            </div>
            </div>
</body>
</html>