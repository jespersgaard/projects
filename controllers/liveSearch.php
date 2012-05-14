<?php
require_once '../settings.php';
$dbConnection = mysql_connect($database['host'], $database['username'], $database['password'])
        or die ('Verbindung zur Datenbank konnte nicht hergestellt werden: '.  mysql_error());

mysql_select_db($database['database']) 
        or die ('Datenbank nicht gefunden: '.  mysql_error());

$query = "SELECT * FROM ".$database['prefix']."projects WHERE `title` LIKE '%".mysql_real_escape_string($_GET['search'])."%' OR `description` LIKE '%".mysql_real_escape_string($_GET['search'])."%'";

$result = mysql_query($query)
    or die ('Datenbankabfrage fehlgeschlagen: '.  mysql_error());
$counter = 0;
echo '<tr><th>results:</th></tr>';
while ($row = mysql_fetch_array($result)) {
    echo '<tr><td><a href="#!/projects/view/'.$row['id'].'">'.$row['title'].'</a> - '.$row['description'].'</td></tr>';
    $counter++;
}
if ($counter == 0){
    echo '<tr><td>nothing found.</tr></td>';
}
?>
