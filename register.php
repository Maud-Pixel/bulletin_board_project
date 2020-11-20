<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="registercss.css">
    <title>Register</title>
</head>
<body>
    <!-- <?php include "header.php"; ?> -->
    
    <div class="container">

        <div class="d-flex justify-content-center "> 
            <form method="POST">
            <h2>Register</h2>
                <h3>Username: </h3>
                <input type="text" placeholder="Choose your username" name="username" required id="username" class="form-control">
                <h3>Email: </h3>
                <input type="text" placeholder="Enter your Email" name="email" required id="email"class="form-control">
                <h3>Password: </h3>
                <input type="password" placeholder="Choose a Password" name="password" required id="password"class="form-control">
                <h3>Confirm Password: </h3>
                <input type="password" placeholder="Confirm your password" name="confirmPassword" required id="confirmPassword"class="form-control"><br>
                <input type="submit" name='submit' id='submit' value='Register' class="btn btn-default">
            </form>
        </div>
        
        <script>
            document.querySelector('#submit').addEventListener('click',()=>{
            let password = document.querySelector('#password').value;
            let confirmPassword = document.querySelector('#confirmPassword').value;

            if (password != confirmPassword) { alert('Your password does not match!')}
            }) 
        </script>
    </div>


    <?php

        include 'database.php';
        global $db;

        if (isset($_POST["submit"])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];


            $q = $db->prepare("INSERT INTO users(nickname,email,password) VALUES(:username, :email, :password)");
            $q->execute([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT) 
            ]);
        }

    ?> 
    <!-- <?php include "footer.php"; ?> -->
    </body>
    </html>
