<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body{
            background:url(https://hdqwalls.com/download/material-design-4k-2048x1152.jpg) fixed;
        }
        .container{

            opacity: 0.9;
        }
        .modal-content{
            padding: 40px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top:200px">

<div class="col-md-12">
    <div class="modal-dialog">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="process" method="POST">                         
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus="" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Parola" name="parola" type="password" value="" required>
                                </div>
                                <button class="form-control btn btn-success" name="giris">giriş yap</button>                          
                       
                        </form>
                    </div>
                    
                </div>
    </div>
</div>


</div>

</body>
</html>