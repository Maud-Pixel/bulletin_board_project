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
    
    <div class="container" style="width:90%; margin:auto; padding:0;">
        <div class="row row-cols-2">
            <div class="main col-9">
                <?php 
                    include "database.php";
                    global $db;

                    try {
                        $responses = $db->query('SELECT * FROM category');
                        $responses -> execute();
                        $cat_title = $responses->fetchAll();
                        foreach ($cat_title as $datass){
                    ?>
                        <br><h2> <?php echo $datass['category_name']; ?> </h2>
                        
                            <!--  cat_id === $datas[category_id] -->
                        <div class="container-fluid" style="background-color:#f9f9f9">
                        
                            <div class="row row-cols-3">
                            
                    <?php
                        try {
                            $cat_id = $datass['category_id'];
                            $response = $db->query('SELECT * FROM boards');
                            $response -> execute(['category_id' => $cat_id]);
                            while ($datas = $response->fetch()){
                                if ($cat_id === $datas['category_id']){

                    ?> <!-- Début HTML case sujet -->
                                <div class="col-sm-4" style="margin:20px 0 20px 0;">
                                    <div onclick="location.href='topics.php';" style="cursor: pointer; height:8rem; background-color:white;">
                                        <div class="card-body">
                                            <p class="card-title"> <?php echo $datas['name']; ?> </p>
                                            <p class="card-text">  <?php echo $datas['description']; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                
                           
                    <?php 
                        } //fin if
                        } //fin while
                    ?>
                            </div>
                        </div> <!-- Fin HTML case sujet --> 
                    <?php 
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
            <div class="aside col-3">
                <div style="background-color:orange; height:100%; margin-top: 50px; text-align:center;">
                    Je suis l'aside où Austin peut include ses last post :D 
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
    </div>
</body>
</html>