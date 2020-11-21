<?php
    session_start();
?>
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
                        <li class="nav-item"><a class="nav-link" href="profil.php">Mon profil</a></li>
                        <li class="nav-item"><a class="nav-link">CONTACT US</a></li>
                    </ul>
                </div>
            </div>
            <div class="row space"></div>
        </div>
        <div class="container">
            <div class="row no-gutters d-flex">
                <div class="col"></div>
                <div class="col-4">
                    <form class="align-item-center" method="get" action="profil.php">
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
        <div class="container">
            <div class="row no-gutters d-flex">
                <div class="col"></div>
                <div class="col-4">
                    <h2>Profil membre </h2>
        
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
                    while($data = $req->fetch())
                    {
                        
                         $avatar= "http://2.gravatar.com/avatar/".md5($data['email'])."?s=100&"; //voir si changement photo possible + sexe à choisir pour avatar dont 'Autre'
                    
    ?>
                    <img src=<?php echo $avatar ?> alt="avatar">
                    <form class="align-item-center" method="post" action="inscription_post.php">
                        
                            <label for="nickname"> Pseudo</label>
                            <input type="text" class="form-control"  value="<?php echo $data['nickname'] ?>"name="nickname">

                            <label for="password">Mot de passe</label>
                            <input type="text" class="form-control"  value="<?php echo $data['password'] ?>" name="password">

                            <label for="email">Adresse email</label>
                            <input type="text" class="form-control"  value="<?php echo $data['email'] ?>" name="email">

                            <label for="signature">Signature</label>
                            <input type="text" class="form-control"  value="<?php echo $data['signature'] ?>"name="signature">
                       
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <?php 
        
                    }                    
                }
                    
                catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
            
    ?>
    <div class="container-fluid footer">
            <div class="row">
                
            </div>      
            
    </div>
        
    
</body>
</html>