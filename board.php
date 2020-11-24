<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board-Page</title>
</head>
<body>
    <div class="header">
    </div>
    
    <div class="container">
        <div class="category">
            <div class="sujet">
                <?php 
                    include "database.php";
                    global $db;

                    try {
                        $responses = $db->query('SELECT * FROM category');
                        $datass = $responses->fetch();
                    ?>
                        <h2><?php echo $datass['category_name']; ?></h2>
                        
                    <?php
                
                    
                    } catch (PDOException $e) {
                        echo 'Connexion échouée : ' . $e->getMessage();
                    }
                    try {
                    $response = $db->query('SELECT * FROM boards');
                        $datas = $response->fetch();
                        while ($datas = $response->fetch()){
                        
                    ?>
                    <div class="container" style="background-color:#f9f9f9">
                        <div class="row row-cols-3" >
                            <div class="card" style="background-color:green">
                                <div class="card-body" style="background-color:blue">
                                    <p class="card-title">Subject : <?php echo $datas['name']; ?> </p>
                                    <p class="card-text">Description : <?php echo $datas['description']; ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } //fin while
                    }//fin try
                    catch (PDOException $e) {
                        echo 'Connexion échouée : ' . $e->getMessage();
                    }
                    ?>
                    
            </div>
        </div>
        <div class="category">
        </div>
        <div class="category">
        </div>
    </div>
    
    <div class="footer">
    </div>
</body>
</html>