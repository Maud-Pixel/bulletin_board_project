<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <link rel="stylesheet" type="text/css" href="board.css">
    <title>Board-Page</title>
</head>
<body style="background-color:#ecf0f1">
    <div class="container-fluid d-flex align-content-center flex-wrap" style="background-color:purple; height: 10rem;">
        TITRE DU FORUM DANS LA BANNIERE
    </div>
    
    <div class="container col-lg-10 col-md-10 col-ms-10 col-xs-10 d-flex align-content-center flex-wrap">
        <div class="row row-cols-lg-2 row-cols-md-1 row-cols-ms-1 row-cols-xs-1 shadow-sm p-3 mb-5 d-flex align-content-center flex-wrap" style="margin-bottom:0 !important; background-color:white">
            <div class="col-xl-9 col-lg-9 col-md-6 col-ms-12 col-xs-12 rounded d-flex align-content-center flex-wrap"> <!-- DEBUT MAIN -->
                <?php 
                    include "database.php";
                    global $db;

                    try {
                        $responses = $db->query('SELECT * FROM category');
                        $responses -> execute();
                        $cat_title = $responses->fetchAll();
                        foreach ($cat_title as $datass){
                    ?>
                        <br><p class="h2 big_title"> <?php echo $datass['category_name']; ?> <p>
                        
                            <!--  cat_id === $datas[category_id] -->
                        <div class="container rounded" style="background-color:#f9f9f9 ;padding: 0 !important;">
                        
                            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-ms-1 row-cols-xs-1 w-100 h-100 no-gutters d-flex justify-content-start align-items-center p-2 m-0" >
                            
                    <?php
                        try {
                            $cat_id = $datass['category_id'];
                            $response = $db->query('SELECT * FROM boards');
                            $response -> execute(['category_id' => $cat_id]);
                            while ($datas = $response->fetch()){
                                if ($cat_id === $datas['category_id']){

                    ?> <!-- Début HTML case sujet -->
                                <div class="col-lg-4 col-md-12 col-ms-12 col-xs-12 p-2">
                                    <div class="rounded h-100 w-100 " onclick="location.href='topics.php';" style="cursor: pointer; background-color:white;">
                                
                                        <div class="container border-light">
                                            <div class="container card-body ">
                                                <div class="container row row-cols-2 ">
                                                    <div class="col-3 d-flex justify-content-start align-items-center border border-right-0 border-top-0 border-left-0 border-primary pl-0 pb-5"> 
                                                        <img src="images/3.png" alt=""> 
                                                    </div>
                                                    <div class="col-9 mr-0 pr-0">
                                                        <p class="card-title title_card"> <?php echo $datas['name']; ?> </p>
                                                        <p class="card-text subtitle_card">  <?php echo $datas['description']; ?> </p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row row-cols-3 p-3" >
                                                    <div class="col-3 ">
                                                        <div> 
                                                        <?php 
                                                            try {
                                                                $board_id = $datas['id'];
                                                                $response_topics = $db->query('SELECT * FROM topics');
                                                                $response_topics -> execute(['board_id' => $board_id]);
                                                                while ($counted_topics = $response_topics->fetchAll()){
                                                                    if ($board_id === $counted_topics['board_id']){
                                                            ?>
                                                                <p class="grey_text m-0 p-0"> <?php echo count($counted_topics); ?> </p>
                                                            <?php
                                                                
                                                                    } //fin if
                                                                } //fin while
                                                            } //fin try
                                                            catch (PDOException $e) {
                                                                echo 'Connexion échouée : ' . $e->getMessage();
                                                            } 
                                                        ?>
                                                        </div>
                                                        <p class="middle_text m-0 p-0">Topics</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <div> 
                                                            XXX
                                                        </div>
                                                        <p>Posts</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div> 
                                                            XXX
                                                        </div>
                                                        <p>Last Post</p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
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
            </div> <!-- FIN MAIN -->
            <div class="container col-xl-3 col-lg-3 col-md-6 col-ms-12 col-xs-12 "> <!-- ASIDE -->
                <div class="rounded d-flex align-content-center flex-wrap h-100 d-inline-block w-100 p-3" style="background-color:orange; text-align:center;">
                    Je suis l'aside où Austin peut include ses last post :D 
                </div>
            </div> <!-- FIN ASIDE -->
        </div>
    </div>
    <div class="container-fluid d-flex align-content-center flex-wrap" style="background-color:purple; height: 10rem;">
    JE SUIS LE FOOTER QUI CONTIENDRA UN INCLUDE
    </div>
</body>
</html>