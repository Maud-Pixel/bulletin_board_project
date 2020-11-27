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
                    <li class="breadcrumb-item"><a href="message.php">Search</a></li>
                </ol>
            </nav>
        </div>
    
    <p>
<?php 

$host = "localhost"; 
$dbname = "forum"; 
$user = "root"; 
$pass = "root";
$research = $_POST["search"];

try
{
                
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $req = $db->prepare("SELECT messages.content, messages.title, messages.creation_date, users.id, users.email, users.position, users.nickname, users.signature FROM messages 
                         INNER JOIN users ON messages.user_id=users.id
                         WHERE content LIKE '%".$research."%' OR title LIKE '%".$research."%' ");
    
    $req->execute(array());
    
        if($data = $req->fetch())
        {
            do{

?>
                <div class="row row-message">
                    <div class="col-2 col-content-message">
                    <?php 
                        $avatar= "http://2.gravatar.com/avatar/".md5($data['email'])."?s=100&"?>
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php echo $avatar ?> style="width: 150px;" alt="avatar_autre">
                        <p class="message-position"><?php echo $data['position']?></p>
                        <p class="message-identity"><?php echo $data['nickname']; ?></p>
                    </div>
                    <div class="col-10 col-content-message">
                        <p><?php echo $data['title'];?></p>
                        <p><?php echo $data['content'];?></p>
                        <p><?php echo $data['signature'];?></p>
                        <p><?php echo $data['creation_date'];?></p>
                    </div>
                    <?php if ($data['id'] == $_SESSION["id"]) 
                        {
                        ?>
                        <button id="delete" type="submit" name="message_deleted"  class="btn btn-outline-warning mb-2"><a href="message_delete.php?id=<?php echo $data['id']?>">Annuler</a></button>
                        <?php } ?>
                </div>
<?php


            }

            while ($data = $req -> fetch());
   
        }
        else
        {
            echo 'Désolé, aucune information trouvée';
        }
   
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>
</p>
</body>
</html>

