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
    
<?php
$host = "localhost"; 
$dbname = "forum"; 
$user = "root"; 
$pass = "root";
$nickname=$_POST["nickname"];
$password=$_POST["password"];
try
{          
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['nickname'])) 
    {
        $query = $db->prepare("SELECT nickname, id, password FROM users WHERE nickname = :nickname");
        $query->execute(array(":nickname" => $nickname));
        while($data = $query->fetch())
        {
            if($data["password"] == $_POST["password"])
            {
               header("Location:message.php");
            }
            else
            {
?>
        <div class="container-fluid">
                <div class="row header">
                    <img class="img-fluid image-header" src="../images/rail_duotone.png" alt="image header rail train" style="width: 100%; height: 100%;">
                </div>
                <div class="row content row-content justify-content-center ">
                    <div class="card">
                        <div class="card-body">
                            <p class="h1">Aie Aie Aie</p>
                            <p>Mauvais mot de passe !</p>
                            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
                        </div>
                    </div>
                </div>
                
<?php
            }
        }
    }


    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>