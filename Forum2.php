<?php                                                                                   // Skript fängt mit php an
 $server = 'localhost';                                                                 // Es wird angeben dass der server, 'localhost' heißt
 $user = 'root';                                                                        // Es wird angeben dass der user, 'root' heißt
 $password = '';                                                                        // Es wird angeben dass das password, nicht vorhanden ist
 $database = 'forum';                                                                   // Es wird angeben dass die datenbank, 'forum' heißt

 $kommentar = $_POST['kommentar']; 
 date_default_timezone_set("Europe/Berlin");
 $timestamp = time();
 $datum = date("Y-m-d");

 // Create connection
$conn = new mysqli($server, $user, $password, $database);                               //Hier wird die connection zum Server erstellt, immer nachdem '$connection->close();' programmieren.
 // Check connection
if ($connection->connect_error) {                                                       //Es wird überprüft ob ein Verbindungsfehler aufgetreten ist
    die("Connection failed:" . $conn->connect_error);                                   //Wenn das der fall ist soll die Verbindung verfallen und den Grund dafür ausgeben
}else{
    $stmt = $conn->prepare("INSERT INTO discussion(kommentar,datum) values(?,?)");      //Der SQL-Befehl des ausgewählt wird wenn die connection steht
    $stmt->bind_param("ss",$kommentar,$datum);                                          //in die drei Strings die 3 sachen einfügen(nutzernamen, passwort, email)
    $stmt->execute();                                                                   //man soll das statement ausführen
    $stmt->close();                                                                     //Statement schließen
    $conn->close();                                                                     //Verbindung schließen
}

$connection->close();                                                                   //Schließt die Verbindung die am anfang des skripts auf Anfrage entstanden ist
?>