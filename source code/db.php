<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=yonetim_paneli;charset=utf8","root","");
    //echo "bağlantı başarılı";
}
catch(PDOException $e){
    echo $e->getMessage();
}


?>