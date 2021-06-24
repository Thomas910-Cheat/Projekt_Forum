 
<?php                                                          // Skript fängt mit php an
 $server = 'localhost';
 $user = 'root';                                                
 $password = '';
 $database = 'forum';

 $nutzername = $_POST['nutzername'];
 $passwort = $_POST['passwort'];
 $email = $_POST['email'];

 // Create connection
$conn = new mysqli($server, $user, $password, $database);       //Hier wird die connection zum Server erstellt, immer nachdem '$connection->close();' programmieren.
 // Check connection
if ($connection->connect_error) {                               //Es wird überprüft ob ein Verbindungsfehler aufgetreten ist
    die("Connection failed:" . $conn->connect_error);           //Wenn das der fall ist soll die Verbindung verfallen und den Grund dafür ausgeben
}else{
    $stmt = $conn->prepare("Insert into registration(nutzername, passwort, email) values(?, ?, ?)");
    $stmt->bind_param("sss",$nutzername, $passwort, $email);
    $stmt->execute();
    echo "Registration erfolgreich abgeschlossen!";
    $stmt->close();
    $conn->close();
}
}




$connection->close();   //Schließt die Verbindung die am anfang des skripts auf anfrage entstanden ist
?>

