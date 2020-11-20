<?php
session_start([]);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

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