<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

if(!isset($_SESSION['Naam']))
{
    header("location:band_inlog.php");
}
else
{
    echo "<p>Welkom, " . $_SESSION['Naam'] . "</p>";

    if ($_SESSION['Level'] == 0)
    {
        echo "<center><h1 class='toevoeg'>U heeft geen rechten om deze pagina te bekijken.</h1></center>";
        echo "<br>";
        echo "<center><a href='band_uitlees.php'><button class='uitlees'><p>Ga terug</p></button></a></center>";
        exit();
    }
}

?>