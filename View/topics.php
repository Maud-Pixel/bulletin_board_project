<?php 
    session_start();
    $_SESSION["id"] = 3;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="topicscss.css">
    <title>Topic</title>
</head>
<body>


<?php
include '../database.php';
global $db;
?>


<?php
    try {
        $query =$db ->query('SELECT * FROM topics WHERE id = id');
        $query->execute(['id' => $_GET['id']]);
        $topics = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        ?>
        <div class="alert alert-danger" role="alert">
         <?=$e?>
        </div>
        <?php
    }
?>
    <div class="container">
        <button class="btn btn-primary" name="btn" id="btn">Create a topic!</button>
    </div>

   

    <form action='' method='post' class="form_topics">
        <h4>Create your own topic!</h4>
        <div class='form-group'>
        <input type="text" class="form-control" name='Title' placeholder="Title" required>
        </div>
        <div class='form-group'>
        <input type="text" class="form-control" name='Content' placeholder="Content" required>
        </div>
        <div class='form-group'>
        <input type="text" class="form-control" name='BoardID' placeholder="BoardID" required>
        </div>
        <div class='form-group'>
        <input type="text" class="form-control" name='userID' placeholder="userID" required>
        </div>
        <input type="submit" name="formSend" id="formSend">
        <button type="button" id='cancel'>Cancel</button>
    </form>
 
   
   <?php $query = $db ->prepare('SELECT * FROM topics');
         $query->execute();
         $topics = $query->fetchAll();

         foreach($topics as $topic){
             echo '<h4><a href="message.php">'.htmlentities($topic['title']).'</a></h4><p>'.htmlentities($topic['content']).'</p> <br>';
         }
    ?>
    <?php
try {
    if (isset($_POST['formSend'])) {
        $query = $db->prepare('SELECT * FROM topics WHERE title=:title');
        $query->execute(['title' => $_POST['Title']]);
        $count = $query->rowCount();

        var_dump($_POST['Title']);
       if ($count == 0){
    $query = $db->prepare('INSERT INTO topics(title, content, category_id, user_id) VALUES (:title,:content,:BoardID,:userID);');
    $query->execute([
        'title' => $_POST['Title'],
        'content' => $_POST['Content'],
        'BoardID' => $_POST['BoardID'],
        'userID' => $_POST['userID']
        ])
?>      <div class="alert alert-success" role="alert">
         New Topic succefully created !!
        </div>
    <?php
        }
        else{
            ?> <div class="alert alert-danger" role="alert"><?=$_POST['Title']?> title already exist</div><?php
        };
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
}?>

    <script src="topics.js"></script>
</body>
</html>