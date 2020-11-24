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
                        $responses -> execute();
                        $cat_title = $responses->fetchAll();
                        foreach ($cat_title as $datass){
                    ?>
                        <h2> <?php echo $datass['category_name']; ?> </h2>
                        <button> 
                            <?php echo $datass['category_id']; ?>
                        </button>
                            <!--  cat_id === $datas[category_id] -->
                    <?php
                        try {
                            $cat_id = $datass['category_id'];
                            $response = $db->query('SELECT * FROM boards');
                            $response -> execute(['category_id' => $cat_id]);
                            while ($datas = $response->fetch()){
                                if ($cat_id === $datas['category_id']){

                        ?>
                        <div class="container" style="background-color:#f9f9f9">
                            <div class="row row-cols-3" >
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-title">Subject : <?php echo $datas['name']; ?> </p>
                                        <p class="card-text">Description : <?php echo $datas['description']; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        } //fin if
                        } //fin while
                        }//fin try
                        catch (PDOException $e) {
                            echo 'Connexion échouée : ' . $e->getMessage();
                        } // fin du catch
                            } //fin foreach
                

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