<?php
session_start();

session_destroy();

header("location:band_inlog.php");
?>