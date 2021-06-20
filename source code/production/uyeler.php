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
					<h3>üyeler</h3>
				</div>
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>üye isim</th>
								<th>üye soyisim</th>
                                <th>üye mail</th>
								<th>işlem</th>
							</tr>
						</thead>
                        <?php
                            $uye_sor=$db->prepare("SELECT * FROM uyeler");
                            $uye_sor->execute(array());
                            while($uye_yaz=$uye_sor->fetch(PDO::FETCH_ASSOC)){?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $uye_yaz['uye_isim']?></td>
                                        <td><?php echo $uye_yaz['uye_soyisim']?></td>
                                        <td><?php echo $uye_yaz['uye_mail']?></td>
                                        <form action="../process.php" method="POST">
                                            <input type="hidden" name="uyeId" value="<?php echo $uye_yaz['uye_id'] ?>">
                                        <td><button class="btn btn-danger form-control btn-sm" name="uyeSil">sil</button></td>
                                        </form>
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