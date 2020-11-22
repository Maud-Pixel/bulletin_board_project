<?php
    session_start();

    $_SESSION["id"] = 2; //Supprimer le chiffre quand on aura la session via le login
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


      
try
{
    $dbco = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $success =null;
    $nickname = $_POST["nickname"];
    $signature = $_POST["signature"];  
    $email = $_POST["email"];
    $password = $_POST["password"];  
    $query = $dbco->prepare("SELECT * FROM users WHERE id= :id");
    $query->execute(array(':id' => $_SESSION['id']));
    while($datas = $query->fetch())
    {
        if ((isset($_POST['nickname'])) && ($_POST['nickname'] != $datas['nickname']))
        {
            $sth = $dbco->prepare("UPDATE users SET nickname = :nickname WHERE id = :id");
            $sth->execute(array(':nickname' => $nickname, ':id' => $_SESSION['id']));
            //TO DO: inscrire succes + validation
        }
        if ((isset($_POST['signature'])) && ($_POST['signature'] != $datas['signature']))
        {
             
            $sth = $dbco->prepare("UPDATE users SET signature = :signature WHERE id = :id");
            $sth->execute(array(':signature' => $signature, ':id' => $_SESSION['id']));
            //TO DO: inscrire succes + validation
        }
        if ((isset($_POST['email'])) && ($_POST['email'] != $datas['email']))
        {
               
            $sth = $dbco->prepare("UPDATE users SET email = :email WHERE id = :id");
            $sth->execute(array(':email' => $email, ':id' => $_SESSION['id']));
            //TO DO: inscrire succes + validation
        }
        if ((isset($_POST['password'])) && ($_POST['password'] != $datas['password']))
        {
             
            $sth = $dbco->prepare("UPDATE users SET password = :password WHERE id = :id");
            $sth->execute(array(':password' => $password, ':id' => $_SESSION['id']));
            //TO DO: inscrire succes + validation
        }
        //TO DO faire un onglet pour gender avec répartition correcte dans les checkbox;
    }

    header("Location:profil.php");
}
      
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}



?>
</body>
</html>