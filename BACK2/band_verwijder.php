<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
require 'session.php';
require 'config.php';

$ID = $_GET[ 'id'];
$query = "SELECT * FROM Back2_paarden WHERE ID = '$ID'";
$resultaat = mysqli_query($mysqli, $query);
if (mysqli_num_rows($resultaat) == 0)

{
    echo "<p>Er is geen band met ID $ID.</p>";
} else

{

    $rij = mysqli_fetch_array($resultaat);

    ?>
    <center>
    <form name="form1" method="POST" action="band_verwijder_verwerk.php">
        <fieldset>
            <p>Weet je zeker dat je de onderstaande paard wilt verwijderen?</p>
            <table>
                <input type="hidden" name="ID" value="<?php echo $rij['ID'] ?>" >
                <label for="Naam"> Naam:</label>
                <input type="text" id="Naam" name="Naam" value="<?php echo $rij['Naam'] ?>"><br>
                <label for="Ras"> Ras:</label>
                <input type="text" id="Ras" name="Ras" value="<?php echo $rij['Ras'] ?>"><br>
                <input class="submit" type="submit" id="button" value="Verwijder" name="submit">
            </table>
        </fieldset>
    </form>
        <a href="band_uitlees.php"><button class="uitlees"><p>Terug naar overzicht.</p></button></a>
    </center>



    <?php

}

?>