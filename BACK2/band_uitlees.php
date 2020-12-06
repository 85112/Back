<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
require 'config.php';

$query = "SELECT * FROM Back2_paarden";

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
    echo "<center><h1 class='toevoeg'>er zijn geen paarden gevonden<h1/></center>";
    echo "<br>";
}
else {
    echo "<a href='uitlog.php'><button class='uitlog'>UITLOGGEN</button></a>";
    echo "<br>";
    echo "<h1>Alle paarden</h1>";
    echo "<center><table border='1'>";

    echo "<th>Paard</th>";
    echo "<th>Detail</th>";
    echo "<th>Wijzig</th>";
    echo "<th>Verwijder</th>";

    while ($rij = mysqli_fetch_array($resultaat)) {
        echo "<tr>";
        echo "<td>" . $rij['Naam'] . "</td>";
        echo "<td> <a href='band_detail.php?id=".$rij['ID']."'>Details</a> </td>";
        echo "<td> <a href='band_wijzig.php?id=".$rij['ID']."'>Wijzig</a> </td>";
        echo "<td> <a href='band_verwijder.php?id=".$rij['ID']."'>Verwijder</a> </td>";
        echo "</tr>";

    }
    echo "</table></center>";
    echo "<br>";
}
echo "<center><a href='band_toevoeg.php'><button class='toevoeg'>Voeg een paard toe</button></a></center>";

?>