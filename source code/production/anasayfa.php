<?php
session_start();
ob_start();
include "../db.php";
include "../sessionControl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yönetim Paneli</title>
        <link rel="stylesheet" href="../style/anasayfa.CSS">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function(){
               $("#uyeler").click(function(){
                 $("#uye_yonetim").fadeToggle(300);
               })
               $("#kategori").click(function(){
                 $("#kategori_yonetim").fadeToggle(300);
               })
               $("#urunler").click(function(){
                 $("#urun_yonetim").fadeToggle(300);
               })
            });

        </script>        
</head>
<body> 

<div class="page-wrapper chiller-theme toggled">
 
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    
    <div class="sidebar-content">     
      <div class="sidebar-header">        
        <div class="user-info">
          <span class="user-name"><?php echo $_SESSION['uye_mail'];//DİNAMİK OLARAK üye maili yazdırılıyor?>
            <strong></strong>
          </span>
          <span class="user-role">Üye</span>         
        </div>
      </div> 
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span></span>
          </li>
          <li class="sidebar-dropdown">
            <a href="anasayfa">
              <i class="fa fa-home"></i>
              <span>Anasayfa</span>             
            </a>          
          </li> 
          <li class="sidebar-dropdown">
            <a href="yapilacaklar-listesi">
              <i class="fa fa-tasks"></i>
              <span>yapılacaklar listesi</span>             
            </a>          
          </li> 
        
        
            <li class="sidebar-dropdown" id="uyeler">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Üye Yönetim</span>
            </a>
            <div class="sidebar-submenu" id="uye_yonetim">
              <ul>
                <li>
                  <a href="uyeler">üyeler</a>
                </li>                
              </ul>             
            </div>
          </li>


          <li class="sidebar-dropdown" id="kategori">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>kategori yönetim</span>
            </a>
            <div class="sidebar-submenu" id="kategori_yonetim">
              <ul>
                <li>
                  <a href="kategoriler">kategori listesi</a>
                </li>                
              </ul>             
            </div>
          </li>
          <li class="sidebar-dropdown" id="urunler">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>ürün yönetim</span>
            </a>
            <div class="sidebar-submenu" id="urun_yonetim">
              <ul>
                <li>
                  <a href="urun-ekle">ürün ekle</a>
                </li>              
              </ul> 
              <ul>
                <li>
                  <a href="urun-listele">ürün listeleme</a>
                </li>              
              </ul>             
            </div>
          </li>

                 
          <li>
            <a href="../logout">
              <i class="fa fa-door-closed"></i>
              <span>Çıkış</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
        @$sayfa=$_GET['sayfa'];
            switch($sayfa){
              case "uyeler":
                  include "uyeler.php";
                break;
                case "kategoriler":
                  include "kategoriler.php";
                break;
                  case "urun-ekle":
                  include "urun-ekle.php";
                break;
                case "kategori-duzenle":
                  include "kategori-duzenle.php";
                  break;
                  case "kategori-ekle":
                    include "kategori-ekle.php";
                    break;
                  case "yapilacaklar-listesi":
                    include "yapilacaklar-listesi.php";
                    break;
                    case "urun-listele":
                      include "urun-listele.php";
                      break;
            }
         ?>
</body>
</html>