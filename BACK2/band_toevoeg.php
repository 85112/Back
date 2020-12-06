<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
require 'session.php';
require 'config.php';

if (isset($_POST['submit'])) {

    $Afbeelding = $_FILES['Afbeelding'];
    $tijdelijk = $Afbeelding['tmp_name'];
    $Afnaam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = "Fotos/";

    $toegestaan = array("image/jpeg", "image/gif", "image/png");
    if (in_array($type, $toegestaan)) {

        echo "Verplaats " . $tijdelijk . " naar " . $map . $Afnaam . "...<br/>";

        if (move_uploaded_file($tijdelijk, $map . $Afnaam)) {

            echo "Het is gelukt!<br/>";
        } else {
            echo "Er is iets fout gegaan.<br/>";
        }
    } else {
        echo "Dit bestandtype ($type) is niet toegestaan!<br/>";
    }

    $naam = $_POST['Naam'];
    $ras = $_POST['Ras'];
    $geboortedatum = $_POST['Geboortedatum'];
    $geslacht = $_POST['Geslacht'];

    if (strlen($naam) > 0 &&
        strlen($ras) > 0 &&
        strlen($geboortedatum) > 0 &&
        strlen($geslacht) > 0) {
        $check1 = strtotime($geboortedatum);
        if (date('Y-m-d', $check1) == $geboortedatum) {
            $query = "INSERT INTO `Back2_paarden`(`Naam`, `Ras`, `Geboortedatum`, `Geslacht`, `Afbeelding`) VALUES('$naam', '$ras', '$geboortedatum', '$geslacht', '$Afnaam')";
            if (mysqli_query($mysqli, $query)) {
                header("Location: band_uitlees.php?success=Toegevoegd");
                exit();
            } else {
                echo "<p>FOUT bij toevoegen</p>";
                echo mysqli_error($mysqli);
            }
        }
        else {
            echo "Er klopt iets niet aan de datum";
        }
    }
    else {
        echo "Niet alle velden zijn ingevuld";
    }


}

?>

    <center><h2>Voeg een paard toe:</h2></center>
    <center>

    <form name="form1" method="post" enctype="multipart/form-data">
        <fieldset>
        <table>
            <label for="Naam"> Naam:</label>
            <input type="text" id="Naam" name="Naam" value=""><br>
            <label for="Ras"> Ras:</label>
            <input type="text" id="Ras" name="Ras" value=""><br>
            <label for="Geboortedatum">Geboortedatum:</label>
            <input type="date" id="Geboortedatum" name="Geboortedatum" value=""><br>
            <label for="Geslacht">Geslacht:</label>
            <select id="Geslacht" name="Geslacht">
                <option value="M" selected>M</option>
                <option value="F">F</option>
            </select><br><br>
            <input type="file" name="Afbeelding" value="<?=$Afnaam?>"><br><br>
            <input class="submit" type="submit" id="button" value="Verzend" name="submit">
        </table>
        </fieldset>
    </form>

    </center>
<?php
echo "<br>";
echo "<center><a href='band_uitlees.php'><button class='uitlees'><p>Lees uit</p></button></a></center>";
?>
