<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

$host = "localhost"; 
$dbname = "forum"; 
$user = "root"; 
$pass = "root";
$nickname = $_POST["nickname"];
$signature = $_POST["signature"];
$avatar = $_POST["avatar"];
$email = $_POST["email"];
$password = $_POST["password"];
      
try{
    $dbco = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    
    //$sth appartient à la classe PDOStatement
    $sth = $dbco->prepare("
        INSERT INTO users(nickname,signature,avatar,email,password)
        VALUES (:nickname, :signature, :avatar, :email, :password)
    ");
    $sth->execute(array(
                        ':nickname' => $nickname,
                        ':signature' => $signature,
                        ':avatar' => $avatar,
                        ':email' => $email,
                        ':password' => $password
                        ));
    echo $nickname;
    echo $signature;
    echo $avatar;
    echo $email;
    echo $password;
    echo "Entrée ajoutée dans la table";
    header("Location:inscription.php");
}
      
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}



?>
</body>
</html>



