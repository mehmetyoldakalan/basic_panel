<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: "montserrat",sans-serif;
            box-sizing: border-box;
             
        }
        body{
            
            min-height: 100vh;

        }
        .container{
            max-width: 800px;
            margin: auto;
            padding: 10px;

        }
        .txtb{
            width: 100%;
            border: none;
            border-bottom: 2px solid #000;
            background:none;
            padding: 10px;
            outline: none;
            font-size: 18px;
        }
        h3{
            margin: 10px 0;

        }
        .task{
            width: 100%;
            background:rgba(255, 255, 255, 0.5);
            padding: 18px;
            margin: 6px 0;
            overflow: hidden;

        }
        .task-complete{
            width: 100%;
            background:rgba(255, 255, 255, 0.5);
            padding: 18px;
            margin: 6px 0;
            overflow: hidden;
        }
        .task i{
            float: right;
            margin-left: 20px;
            cursor: pointer;

        }
        .comp .task{
            background:rgba(0, 0, 0, .5);
            color:#fff;

        }
    </style>
</head>
<body>
   
        <div class="container col-md-6">
            <form id="gorevForm">
            <input type="text" class="txtb" name="gorev_adi" placeholder="bir görev yazın">
            <input type="text" class="txtb" name="gorev_aciklama" placeholder="bir görev açıklaması yazınız">            
            </form>

            <button class="btn btn-success btn-sm form-control" id="ekle" disabled>görev ekle</button>
            <div class="notcomp">
                <h3>tamamlanmayanlar</h3>
                
                    
                        <div class="task">
                            <!--task-->
                            
                        </div>
                   
               
            </div>
            <div class="comp">
                <h3>tamamlananlar</h3> 
                <div class="task-complete">
                            <?php
                                $gorev_sor=$db->prepare("SELECT * FROM todolist where gorev_durum='tamamlandı'");
                                $gorev_sor->execute();
                                while($gorev_yaz=$gorev_sor->fetch(PDO::FETCH_ASSOC)){
                                    echo '<div>görev adı: '.$gorev_yaz['gorev_adi'].'</div>';
                                    echo '<div>görev açıklama: '.$gorev_yaz['gorev_aciklama'].'</div>';
                                    echo '<div>görev yazan: '.$gorev_yaz['gorev_ekleyen'].'</div>';
                                    echo '<div>görev tarihi: '.$gorev_yaz['gorev_tarih'].'</div>';
                                    echo '<div>görev durumu: '.$gorev_yaz['gorev_durum'].'</div>';
                                    echo "<br>";
                                }

                            ?>
                            
                </div>          
            </div>
        </div>
        <script>
            $(document).ready(function(){
                setInterval(() => {
                    $(".task").load("refresh.php");
                }, 1000);
                $(".txtb").on("keyup change",function(){
                    var karakter=$(".txtb").val().length;
                    if(karakter>=10){
                        $("#ekle").removeAttr("disabled");                
                    }
                    else{
                        $("#ekle").attr("disabled","disabled");
                    }
                
                });  
                $("#ekle").click(function(){
                    // var task=$("<div class='task'></div>").text($(".txtb").val());
                    // $(".notcomp").append(task);
                            $.ajax({
                                type:"POST",
                                url :"../process.php",
                                data:$("#gorevForm").serialize(),
                                success:function(donen_veri){
                                    $("#gorevForm").trigger("reset");
                                   // $(".task").append(donen_veri)
                                }
                            });
                        });

            });         
        </script>
</body>
</html>