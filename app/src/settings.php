<?php
declare(strict_types=1);

use Models\User\User;

date_default_timezone_set("America/Argentina/Buenos_Aires");

$global["appName"] = "CEO";
$global['unTrackable'] = ['/changeLightMode'];
$useUsers = true;
$debMode = true;