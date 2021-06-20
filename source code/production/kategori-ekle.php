<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kategori ekle</title>
    
</head>
<body>
    
    <div class="container col-md-6">
<div class="span">   
<div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>kategori ekle</h3>
				</div>
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							
						</thead>
                     
                            
                                <tbody>
                                    <form action="../process.php" method="POST">
                                    <tr>
                                        <td>kategori ismi giriniz</td>   
                                        <td><input class="form-control col-md-6" type="text" name="kategori_ekle_isim" required></td>                                  
                                    </tr>	
                                    
                                    	
                                    <button class="btn btn-success form-control" name="kategori_ekle" >kategori ekle</button>
                                    
                                    </form>			
                                </tbody>
                                
						</table>
					
				</div> 
			
			</div> 
            </div>
            </div>
</body>
</html>