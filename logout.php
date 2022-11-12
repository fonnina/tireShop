<?php
require 'funkcija.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: prijavljivanje.php");