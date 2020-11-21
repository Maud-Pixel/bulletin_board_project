<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style_test.css">
    <title>Document</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row header">
            <img class="img-fluid image-header" src="../images/rail_duotone.png" alt="image header rail train" style="width: 100%; height: 100%;">
        </div>
        <div class="row breadcrumb">
            <nav aria-label="breadcrumb container-fluid">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="inscription.php">Home</a></li>
                <li class="breadcrumb-item"><a href="inscription_post.php">Boards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
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
        <div class="row content row-content justify-content-center ">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <img class="card-img-top img-fluid card-profil " src=<?php echo $avatar ?> alt="avatar" style="width: 150px;">
                </div>
   
                <div class="card-body">
                    <p class="h1">Profile</p>
                    <form method="post" action="inscription_post.php">
                        <div class="form-group">
                            <label for="nickname">Pseudo</label>
                                <div class="input-group-append">
                                <input type="text" class="form-control" id="nickname" value="<?php echo $data['nickname'] ?>" name="nickname">
                                <span class="input-group-text" > <img src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="signature">Signature</label>
                            <div class="input-group-append">
                                <input type="text" class="form-control" id="signature" value="<?php echo $data['signature'] ?>" name="signature">
                                <span class="input-group-text" ><img class="img-edit"src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group-append">
                                <input type="email" class="form-control" id="email" value="<?php echo $data['email'] ?>" name="email">
                                <span class="input-group-text" ><img class="img-edit"src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" id="password" value="<?php echo $data['password'] ?>" name="password">
                                <span class="input-group-text" ><img class="img-edit"src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-md btn-outline-info mb-2 btn-block mx-auto">Envoyer</button>
                        <div>
                    </form>
                </div>

            </div>
        </div>
        
    </div>
    <?php 
        
            }                    
        }
            
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

        ?>

    <div class="row-fluid footer">
    </div>
        
 
       
    </body>
</html>