<?php

require_once __DIR__ . "/vendor/autoload.php";

use Utilities\Site;

session_start();

$page = $_GET["page"] ?? "Mascotas";

try {
    Site::run($page);
} catch (Exception $ex) {
    echo "<h1>Error</h1>";
    echo "<p>" . $ex->getMessage() . "</p>";
}
