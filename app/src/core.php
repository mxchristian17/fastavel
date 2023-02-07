<?php
$_SESSION['_token'] = isset($_SESSION['_token']) ? $_SESSION['_token'] : bin2hex(random_bytes(16));
require_once("src/database.php");
require_once("src/models.php");
require_once("src/views.php");
require_once("src/controllers.php");
require_once("src/middlewares.php");
require_once("src/settings.php");
require_once("src/set.php");
require_once("src/routes/routes.php");