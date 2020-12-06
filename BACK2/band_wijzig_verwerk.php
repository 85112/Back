<?php
require 'session.php';
if (isset($_POST['submit']))
{
    require 'config.php';


    $ID = $_POST['ID'];
    $Naam = $_POST['Naam'];
    $Ras = $_POST['Ras'];
    $Geboortedatum = $_POST['Geboortedatum'];
    $Geslacht = $_POST['Geslacht'];

    $opdracht = "SELECT Afbeelding FROM Back2_paarden WHERE ID = " . "ID";
    $resultaat = mysqli_query($mysqli, $opdracht);
    $outdatedPic = mysqli_fetch_array($resultaat);

    $Afbeelding = $_FILES['Afbeelding'];
    $tijdelijk = $Afbeelding['tmp_name'];
    $Afnaam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = "Fotos/";
    $toegestaan = array("image/jpeg", "image/gif", "image/png", "image/jpg");
    if (in_array($type, $toegestaan)) {

        echo "Verplaats " . $tijdelijk . " naar " . $map . $Afnaam . "...<br/>";

        if (move_uploaded_file($tijdelijk, $map . $Afnaam)) {
            unlink($map . $outdatedPic['Afbeelding']);
        } else {
            echo "Er is iets fout gegaan.<br/>";
        }
    } else {
        echo "Dit bestandtype ($type) is niet toegestaan!<br/>";
    }


    $query = "UPDATE Back2_paarden
    SET Naam ='$Naam', Ras ='$Ras', Geboortedatum = '$Geboortedatum',
             Geslacht ='$Geslacht', Afbeelding ='$Afnaam'
        WHERE ID = '$ID'";


    if(mysqli_query($mysqli, $query))
    {
        header("location: band_uitlees.php");
        exit();
    }
    else
    {
        echo "<p>FOUT bij aanpassen Band met ID $ID.</p>";
        echo mysqli_error($mysqli);
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";

}

echo "<p><a href='band_uitlees.php'>TERUG</a> naar overzicht</p>";




?>
