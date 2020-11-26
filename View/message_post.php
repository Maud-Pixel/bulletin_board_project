<?php
session_start();
$_SESSION["id"] = 2;

$host = "localhost"; 
$dbname = "forum"; 
$user = "root"; 
$pass = "root";
$session_id = $_SESSION["id"];
$content = $_POST["content"];
$title= $_POST["message_name"];

try
    {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    
    //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO messages(title, content, user_id )
        VALUES (:title, :content, :user_id)
    ");
    $sth->execute(array(
                        ':title' => $title,
                        ':content' => $content,
                        ':user_id' => $session_id
                        ));
   
    echo "Entrée ajoutée dans la table";
    header("Location:message.php");
            
    }
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
?>