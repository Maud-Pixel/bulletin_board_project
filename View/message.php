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
               <div class="row row-message">
                    <div class="col-2 col-content-message">
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src="../images/avatar_autre.jpg" style="width: 150px;" alt="avatar_autre">
                        <p class="message-position">Member</p>
                        <p class="message-identity" >My name</p>
                    </div>
                    <div class="col-10 col-content-message">
                        <p>message</p>
                        <p class="message-signature">signature</p>
                    </div>
                </div>
        </div>  
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
<?php 
 $host = "localhost"; 
 $dbname = "forum"; 
 $user = "root"; 
 $pass = "root";
 $content = $_GET["content"];

 try{
     $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sth = $dbco->prepare("
        INSERT INTO messages(content)
        VALUES (:content)
    ");
    $sth->execute(array(
                        ':content' => $content,
                        ));
    
    echo "Entrée ajoutée dans la table";
    header("Location: message.php");
}
      
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}


?>