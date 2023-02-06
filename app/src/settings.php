<?php
declare(strict_types=1);

use Models\User\User;

date_default_timezone_set("America/Argentina/Buenos_Aires");

$appName = "CEO";
$useUsers = true;
$debMode = true;

$darkMode = isset($_SESSION["darkMode"]) ? boolval($_SESSION["darkMode"]) : true;
$navBarColor = $darkMode ? "navbar-dark bg-dark" : "navbar-light bg-light";
$footerColor = $darkMode ? "bg-dark text-light" : "bg-light text-dark";