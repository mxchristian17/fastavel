<?php
    
    $global["darkMode"] = isset($_SESSION["darkMode"]) ? boolval($_SESSION['user']["DarkMode"]) : true;
    $global["navBarColor"] = $global["darkMode"] ? "navbar-dark bg-dark" : "navbar-light bg-light";
    $global["footerColor"] = $global["darkMode"] ? "bg-dark text-light" : "bg-light text-dark";