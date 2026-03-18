<?php
    $database = "database";
    $databaseUri = explode("include", __DIR__)[0] . $database . ".sqlite";
    $pdo = new PDO("sqlite://$databaseUri");

