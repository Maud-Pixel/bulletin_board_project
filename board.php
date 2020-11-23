<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                        
                        $response = $db->query('SELECT * FROM boards');
                        $datas = $response->fetch();
                        while ($datas = $response->fetch()){
                    ?>
                        <h2><?php echo $datas['category']; ?></h2>
                        <p>
                        Subject : <?php echo $datas['name']; ?> 
                        Description : <?php echo $datas['description']; ?>
                        </p>
                    <?php
                        }
                    
                    } catch (PDOException $e) {
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