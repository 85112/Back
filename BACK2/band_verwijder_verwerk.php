<?php
require 'session.php';
if (isset($_POST['submit']))
{
    require 'config.php';

    $ID = $_POST['ID'];
    $Naam = $_POST['Naam'];

    $query = "DELETE FROM Back2_paarden WHERE ID = $ID";


 

    if(mysqli_query($mysqli, $query))
    {
       header("location:band_uitlees.php");
    }
    else
    {
        echo "<p>FOUT bij verwijderen van $Naam.</p>";
        echo mysqli_error($mysqli);
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";

}

echo "<p><a href='band_uitlees.php'>TERUG</a> naar overzicht</p>";




?>