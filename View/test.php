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
    <title>Inscription</title>
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
                <li class="breadcrumb-item"><a href="inscription_post.php">Boards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
        <div class="row content row-content justify-content-center ">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <img class="card-img-top img-fluid card-profil " src="../images/avatar_autre.jpg" style="width: 150px;" alt="avatar_autre">
                </div>

                <div class="card-body">
                    <p class="h1">Profile</p>
                    <form method="post" action="inscription_post.php">
                        <div class="form-group">
                            <label for="nickname">Pseudo</label>
                                <div class="input-group-append">
                                <input type="text" class="form-control" id="nickname" name="nickname">
                                <span class="input-group-text" ><img class="img-edit"src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="signature">Signature</label>
                            <div class="input-group-append">
                                <input type="text" class="form-control" id="signature" name="signature">
                                <span class="input-group-text" ><img class="img-edit"src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group-append">
                                <input type="email" class="form-control" id="email" name="email">
                                <span class="input-group-text" ><img class="img-edit"src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" id="password" name="password">
                                <span class="input-group-text" ><img class="img-edit"src="../images/edit.png"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="femme" value="Femme">
                                <label class="form-check-label" for="femme">Femme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="homme" value="Homme">
                                <label class="form-check-label" for="homme">Homme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="autre" value="Autre" checked>
                                <label class="form-check-label" for="autre">Autre</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-md btn-outline-info mb-2 btn-block mx-auto">Envoyer</button>
                        <div>
                    </form>
                </div>

            </div>
        </div>
        
    </div>
    <div class="row-fluid footer">
    </div>
</body>
</html>
