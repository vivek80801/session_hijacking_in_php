<?php

$tables = [];

function prepare_create_table(
    string $name,
    array $args,
) {
    $result = "\n";
    $result .= "CREATE TABLE IF NOT EXISTS " . $name . "(\n";
    for($i = 0; $i < count($args); $i++)
    {
        if(count($args) - 1 !== $i)
        {
            $result .= "\t" . join(" ", $args[$i]) . ",\n";
        }else {
            $result .= "\t" . join(" ", $args[$i]) . "\n";
        }
    }
    $result .= ");\n";

    return $result;
}

function  create_table (array $tables)
{
    require_once __DIR__ . "/include/db.php";

    for($i = 0; $i < count($tables); $i++)
    {
        $create_table_statement = $pdo->prepare($tables[$i]);
        $create_table_statement->execute();
    }
}

$user_table = prepare_create_table(
    "users",
    [
        ["id", "integer", "primary", "key",  "autoincrement","not", "null"],
        ["name", "varchar(255)", "not", "null"],
        ["password", "varchar(255)", "not", "null"],
        ["email", "varchar(255)", "not", "null"],
    ]
);


array_push($tables, $user_table);

create_table($tables);

header("location: ./index.php");
