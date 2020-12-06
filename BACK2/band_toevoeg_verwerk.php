<?php
require 'config.php';
require 'session.php';
 
$Naam = $_POST['Naam'];
$Ras = $_POST['Ras'];
$Geboortedatum = $_POST['Geboortedatum'];
$Geslacht = $_POST['Geslacht'];



$query = "INSERT INTO Back2_paarden
VALUES (NULL, '$Naam', '$Ras', '$Geboortedatum', '$Geslacht')";
 
if(mysqli_query($mysqli, $query))
{
 echo "<p>Paard $Naam is toegevoegd.</p>";
}
else{
 echo "<p>FOUT bij toevoegen.</p>";
 echo mysqli_error($mysqli);
}
 
echo "<p><a href='band_uitlees.php'>Terug</a></p>";
?>