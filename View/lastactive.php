<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css">
    <title>Topic</title>
</head>
<body>

<?php
include '../database.php';
global $db;

?>

<div>
    <p class='last_active_title'>Last active users</p>

    <div>
        <?php
    try
                {
               
                $response = $db->query("SELECT * FROM messages");
                
                while($data = $response->fetch())
                {
                    $user_id = $db->quote($data['user_id']);
                    $response2 = $db->query("SELECT id, nickname,email,is_connected FROM users WHERE id=" . $user_id);
                    
                ?>
               <div class="row row-message">
                    <div class="col-2 col-content-message">
                        <?php while($datas = $response2->fetch())
                        { $avatar= "http://2.gravatar.com/avatar/".md5($datas['email'])."?s=100&"?>
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php echo $avatar ?> style="width: 50px;" alt="avatar_autre">
                       
        
                            <?php if($datas['is_connected'] == 1){ 
                                echo ' <div class="is_connected"> </div>';
                            }
                            else{echo ' <div class="is_not_connected"> </div>';}?>
                       
                        <p class="message-identity" ># <?php echo $datas['nickname'];} ?></p>
                    </div>
                        <?php 
                        $response3 = $db->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                        while($datas = $response3->fetch())
                        { ?>
                        <p class="message-signature"><?php echo $datas['signature'];}?></p>
                </div>
                <?php 
                };
                 $response->closeCursor(); // Termine le traitement de la requête
                }
                
                catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }

             ?>
    </div>
</div>

</body>
</html>