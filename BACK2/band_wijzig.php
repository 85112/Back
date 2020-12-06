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
    echo "<p>Er is geen paard met ID $ID.</p>";
} else {



    $rij = mysqli_fetch_array($resultaat);

    ?>
    <center>
        <form name="form1" action="band_wijzig_verwerk.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <table>
                    <input type="hidden" name="ID" value="<?php echo $rij['ID'] ?>"><br>
                    <label for="Naam"> Naam:</label>
                    <input type="text" id="Naam" name="Naam" value="<?php echo $rij['Naam'] ?>"><br>
                    <label for="Ras"> Ras:</label>
                    <input type="text" id="Ras" name="Ras" value="<?php echo $rij['Ras'] ?>"><br>
                    <label for="Geboortedatum">Geboortedatum:</label>
                    <input type="date" id="Geboortedatum" name="Geboortedatum" value="<?php echo $rij['Geboortedatum'] ?>"><br>
                    <label for="Geslacht">Geslacht:</label>
                    <select id="Geslacht" name="Geslacht" value="<?php echo $rij['Geslacht'] ?>">
                        <option value="M" <?php if ($rij['Geslacht'] == 'M'){
                            echo "selected";
                        } ?>>M</option>
                        <option value="F" <?php if ($rij['Geslacht'] == 'F'){
                            echo "selected";
                        } ?>>F</option>
                    </select><br><br>
                    <input type="file" name="Afbeelding" value="<?=$Afnaam?>"><br><br>
                    <input class="submit" type="submit" name="submit" value="Opslaan">
                </table>
            </fieldset>
        </form>
    <?php

}

?>
