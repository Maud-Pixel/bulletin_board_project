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



<div>
    <div><p class='last_active_title'>Last Posts</p></div>
</div>
<?php
include '../database.php';
global $db;

        $i=0;

        $posts = $db->query('SELECT * FROM topics');
        $posts->execute();
        foreach($posts as $post){
            $i++;
            if($i<5){
            echo '<p>' . htmlentities($post['title']) . '</p>';
            echo '<p>' . htmlentities($post['content']) . '</p>';
            $dt = (time() - strtotime($post['creation_date']));
            echo '<p> Updated ' . (idate('H',$dt)) . ' hours ago</p>';


        $cat = $db->query('SELECT * FROM category WHERE category_id =' . $post['category_id']);
        $cat->execute();
        
        foreach($cat as $cats){
            echo '<p>' . htmlentities(($cats['category_name'])) . '</p>';
        }
        }
    }

        
?>