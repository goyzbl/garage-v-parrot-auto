<?php 

if (isset($_POST['envoyer'])) 
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $db = new PDO('mysql:host=localhost;dbname=heroku_9aba8d51a6f7293', 'root', '');

    $sql = "SELECT * FROM user where email = 'email' ";
    $result = $db->prepare($sql);
    $result->execute();
    
    if($result-rowCount()->0)
    {

    }
    else
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$pass')";
        $req = $db->prepare($sql);
        $req->execute();
        echo "Enregistrement effectué"
    }
}

?>