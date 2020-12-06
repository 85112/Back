<head>
    <link rel="stylesheet" href="style.css">
</head>

<?php
require 'config.php';
require 'session.php';


$ID = $_GET['id'];

$query = "SELECT * FROM `Back2_paarden` WHERE ID = " . $ID;

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen paard gevonden met ID $ID.</p>";
}

//else
//{
//    $rij = mysqli_fetch_array($resultaat);
//
//    echo "<h2>Gegevens van paard met id " . $ID. ":</h2>";
//    echo "<table border='1' width='650px'>";
//    echo "<tr><td>Naam:</td>";
//    echo "<td>" . $rij['Naam'] . "<td/></tr>";
//    echo "<tr><td>Ras:</td>";
//    echo "<td>" . $rij['Ras'] . "<td/></tr>";
//    echo "<tr><td>Geboortedatum:</td>";
//    echo "<td>" . $rij['Geboortedatum'] . "<td/></tr>";
//    echo "<tr><td>Geslacht:</td>";
//    echo "<td>" . $rij['Geslacht'] . "<td/></tr>";
//    if (file_exists("Fotos/" . $rij[`Afbeelding`])){
//        echo "<td><img src='Fotos/" . $rij[`Afbeelding`] . " width='200px' /></td>";
//    }else{
//        echo "<td>Geen afbeelding</td>";
//    }
//    echo "</table>";

    if ($resultaat = mysqli_query($mysqli, $query)) {
        echo "<center>";
        echo "<table border=1 cellspacing='0' >";
        echo "<tr><th>Naam:</th><th>Ras:</th>";
        echo "<th>Geboortedatum:</th><th>Geslacht:</th><th>Afbeelding</th></tr>";

        while ($rij = mysqli_fetch_array($resultaat)) {
            echo "<tr><td>" . $rij['Naam'] . "</td>";
            echo "<td>" . $rij['Ras'] . "</td>";
            echo "<td>" . $rij['Geboortedatum'] . "</td>";
            echo "<td>" . $rij['Geslacht'] . "</td>";

            if (file_exists("Fotos/" . $rij['Afbeelding'])) {
                echo "<td><img src='Fotos/" . $rij['Afbeelding'] . "' width='120' /></td>";
            } else {
                echo "<td>Geen Afbeelding</td>";
            }
            echo "</table>";
            echo "<center>";
        }
    }
echo "<br>";
echo "<a href='band_uitlees.php'><button class='uitlees'><p>Terug naar het overzicht</p></button></a>"

?>
