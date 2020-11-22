<?php 
    session_start();
    $_SESSION["id"] = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style_test.css">
    <title>Topic</title>
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
                    <li class="breadcrumb-item"><a href="topic.php">Topic</a></li>
                    <li class="breadcrumb-item"><a href="message.php">Message</a></li>
                </ol>
            </nav>
        </div>
        <button type="button" class="btn  btn-outline-info   button-reply">Post reply</button>
        <div class="row content row-content justify-content-center ">
                <div class="row row-message">
                    <div class="col-2 col-content-message">
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src="../images/avatar_autre.jpg" style="width: 150px;" alt="avatar_autre">
                        <p class="message-position">Member</p>
                        <p class="message-identity" >My name</p>
                    </div>
                    <div class="col-10 col-content-message">
                        <p>Write your message</p>
                        <textarea></textarea>
                        <p class="message-signature">signature</p>
                        <button type="submit"class="btn btn-outline-info mb-2">envoyer</button>
                    </div>
                </div>
                <?php 
                $host = "localhost"; 
                $dbname = "forum"; 
                $user = "root"; 
                $pass = "root";

                try
                {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $response = $pdo->query("SELECT * FROM messages");
                
                while($data = $response->fetch())
                {
                    $user_id = $pdo->quote($data['user_id']);
                    $response2 = $pdo->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id);
                   
                    
                ?>
               <div class="row row-message">
                    <div class="col-2 col-content-message">
                        <?php while($datas = $response2->fetch())
                        { $avatar= "http://2.gravatar.com/avatar/".md5($datas['email'])."?s=100&"?>
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php echo $avatar ?> style="width: 150px;" alt="avatar_autre">
                        <p class="message-position"><?php echo $datas['position']?></p>
                        <p class="message-identity" ><?php echo $datas['nickname'];} ?></p>
                    </div>
                    <div class="col-10 col-content-message">
                        <p><?php echo $data['title'];?></p>
                        <p><?php echo $data['content'];?></p>
                        <?php 
                        $response3 = $pdo->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                        while($datas = $response3->fetch())
                        { ?>
                        <p class="message-signature"><?php echo $datas['signature'];}?></p>
                        <p><?php echo $data['creation_date'];?></p>
                    </div>
                </div>
             </div>  
             <?php 
             $response->closeCursor(); // Termine le traitement de la requête
                 }
                }
                catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }

             ?>
    </div>
    <div class="row-fluid footer ">
    </div>
</body>
</html>
<style>
    .button-reply 
{
    
    width: 10vw;
}
</style>
