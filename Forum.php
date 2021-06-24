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
    $stmt = $conn->prepare("INSERT INTO registration(nutzername, passwort, email) values(?, ?, ?)");        //Der SQL-Befehl des ausgewählt wird wenn die connection steht
    $stmt->bind_param("sss",$nutzername, $passwort, $email);                                                //in die drei Strings die 3 sachen einfügen(nutzernamen, passwort, email)
    $stmt->execute();                                                                                       //man soll das statement ausführen
    echo "Registration erfolgreich abgeschlossen!";                                                         //Im Browser die Text Zeile "Registration erfolgreich abgeschlossen!" drucken
    $stmt->close();                                                                                         //Statement schließen
    $conn->close();                                                                                         //Verbindung schließen
}

$connection->close();                                           //Schließt die Verbindung die am anfang des skripts auf Anfrage entstanden ist
?>