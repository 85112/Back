<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <link rel="stylesheet" href="band_inlog.css">
</head>
<body>
<?php
if (isset($_POST['inlog']))
{
    require 'config.php';

    $Naam = $_POST['Naam'];
    $Wachtwoord = sha1($_POST['Wachtwoord']);

    $opdracht = "SELECT * FROM `Back2_inlog` WHERE `Naam` = '$Naam' AND `Wachtwoord` = '$Wachtwoord'";

    $resultaat = mysqli_query($mysqli, $opdracht);

    if(mysqli_num_rows($resultaat) > 0)
    {
        $user = mysqli_fetch_array($resultaat);
        $_SESSION['Naam'] = $user['Naam'];
        $_SESSION['Level'] = $user['Level'];
        echo "<center><p><h1>Hallo $Naam, u bent ingelogd</h1></p></center>";
        echo "<center><a href='band_uitlees.php'><button style='button:hover{
    box-shadow: 0 12px 16px 0 rgba(168, 82, 42, 0.8),0 17px 50px 0 rgba(127, 57, 136, 0.8);
};'>Ga verder</button></a></center>";
    }
    else
    {
        echo "<center><p><h1>Naam en/of wachtwoord zijn onjuist</h1></p></center>";
        echo "<center><a href='band_inlog.php'><button class='btn'>Probeer opnieuw</button></a></center>";
    }
}
else{
    ?>
    <center>
    <form method="POST" action="">
        <fieldset>
            <div class="contactgrid">
                <legend><strong>Log In</strong></legend>
                <label for="gebruikersnaamVeld">Gebruikersnaam</label>
                <input type="text" id="NaamVeld" name="Naam">
                <label for="wachtwoordVeld">Wachtwoord</label>
                <input type="password" name="Wachtwoord" id="wachtwoordVeld" title="Gebruik 6 tekens" required>
                <input type="submit" name="inlog" value="LOG IN">
            </div>
        </fieldset>
    </form>
    </center>
    <?php
}
?>
</body>
</html>