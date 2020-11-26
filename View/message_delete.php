<?php 
 session_start();
 $_SESSION["id"] = 2;

$host = "localhost"; 
$dbname = "forum"; 
$user = "root"; 
$pass = "root";
$id = $_GET["id"];

try
{          
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query("DELETE FROM messages WHERE id = $id ");
   

    header("Location:message.php");
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


?>