<?php
    session_start();
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
        <div class="row content row-content justify-content-center ">
            <div class="card">
                <div class="card-body">
                    <p class="h1">Login</p>
                    <form method="post" action="login_post.php">
                            <div class="form-group">
                                <label for="nickname">Pseudo</label>
                                    <div class="input-group-append">
                                    <input type="text" class="form-control" id="nickname" name="nickname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group-append">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="remember" id="remember" value="true">
                                    <label class="form-check-label" for="Remember">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="btn btn-md btn-outline-info mb-2 btn-block mx-auto">Envoyer</button>
                       
                    </form>
                </div>

            </div>
        </div>
        
    </div>
    <div class="row-fluid footer">
    </div>

    <section>

    <p>Login</p>

    <form method="GET">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required placeholder="username">
    <label for="username">Password:</label>
    <input type="password" id="password" name="password" required placeholder="password">
    <input type="checkbox" id='rememberMe' name="rememberMe">
    <label for="rememberMe">Remember me</label>

    <input type="submit" name='submit' id='submit' value='LOGIN' >
    </form>
    
    </section>

    <?php
    
    include '../database.php';
    global $db;

    if (isset($_GET['submit'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];

        $p = $db-> prepare ("SELECT * FROM users where nickname = :nickname and password = :password");
        $p->execute(array('nickname' => $username,
                          'password' => $password));
        while ($data = $p->fetch()) {
            echo $data['nickname'];
            echo $data['password'];
        }
    }
    else{
        echo 'not working';
    }
        
        
    ?>

    
</body>
</html>