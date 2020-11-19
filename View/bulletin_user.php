<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style_Maud.css">
    <title>Document</title>
</head>
<body>

<div class="container-fluid">

        <div class="container-fluid header">
            <div class="col navbar navbar-expand-lg justify-content-between">
                <a class="col-6 navbar-brand" href="index.html"><img src="images/coronavirus-logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id=" col-6 navbarContent" class="collapse navbar-collapse">
                    <ul class="row no-gutters ">
                        <li class="nav-item"><a class="nav-link" href="inscription.php">HOME</a></li>
                        <li class="nav-item"><a class="nav-link">boards</a></li>
                        <li class="nav-item"><a class="nav-link">topic</a></li>
                        <li class="nav-item"><a class="nav-link">message</a></li>
                        <li class="nav-item"><a class="nav-link" href="bulletin_user">Mon profil</a></li>
                        <li class="nav-item"><a class="nav-link">CONTACT US</a></li>
                    </ul>
                </div>
            </div>
            <div class="row space">
                
            </div>
        </div>

        <div class="container">
            <div class="row no-gutters d-flex">
                <div class="col"></div>
                <div class="col-4">
                    <form class="align-item-center" method="get" action="bulletin_user.php">
                        <div class="form-group">
                            <label for="nickname">Pseudo</label>
                            <input type="text" class="form-control" id="nickname" name="nickname">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <div class="container-fluid footer">
            <div class="row">
                
            </div>      
                </div>
        </div>
        
    </div>
<?php
            $host = "localhost"; 
            $dbname = "forum"; 
            $user = "root"; 
            $pass = "root";
            $nickname = $_GET["nickname"];

            try{
                $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $req = $db->prepare('SELECT * FROM users WHERE nickname = :nickname');
                $req->execute(array('nickname' => $nickname ));
                echo "<h1>Profil membre </h1>" ;
                while($data = $req->fetch())
                {
                    echo "<label>". $data['nickname'] . "</label></br>"; 
                    echo "<label>". $data['password'] . "</label></br>"; 
                    echo "<label>". $data['email'] . "</label></br>"; 
                    echo "<label>". $data['avatar'] . "</label></br>"; 
                    echo "<label>". $data['signature'] . "</label></br>";  
                }                    
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
         
?>
</body>
</html>